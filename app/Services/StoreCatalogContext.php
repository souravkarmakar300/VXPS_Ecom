<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Throwable;

/**
 * Reads a small, public-only set of active products for chatbot context/cards.
 * Product cards are always built from database records, never from AI-generated fields.
 */
class StoreCatalogContext
{
    /**
     * @return array<int, array<string, mixed>>
     */
    public function findProducts(string $userMessage, int $limit = 12): array
    {
        try {
            if (! Schema::hasTable('products')) {
                return [];
            }

            $productColumns = Schema::getColumnListing('products');
            $nameColumn = $this->firstExisting($productColumns, ['name', 'title', 'product_name']);

            if (! $nameColumn) {
                return [];
            }

            $columns = [
                'slug' => $this->firstExisting($productColumns, ['slug']),
                'price' => $this->firstExisting($productColumns, ['price', 'regular_price', 'sale_price']),
                'special_price' => $this->firstExisting($productColumns, ['special_offer_price', 'discount_price', 'offer_price']),
                'description' => $this->firstExisting($productColumns, ['short_description', 'description', 'product_description']),
                'sku' => $this->firstExisting($productColumns, ['sku', 'product_sku']),
                'image' => $this->firstExisting($productColumns, [
                    'image', 'image_url', 'thumbnail', 'thumbnail_image', 'featured_image',
                    'main_image', 'product_image', 'product_image_path', 'primary_image',
                    'images', 'product_images', 'gallery',
                ]),
                'status' => $this->firstExisting($productColumns, ['status']),
                'category_id' => $this->firstExisting($productColumns, ['category_id']),
                'created_at' => $this->firstExisting($productColumns, ['created_at']),
            ];

            $query = DB::table('products as p');
            $select = ['p.id', "p.{$nameColumn} as product_name"];

            foreach (['slug', 'price', 'special_price', 'description', 'sku', 'image'] as $alias) {
                if ($columns[$alias]) {
                    $select[] = "p.{$columns[$alias]} as {$alias}";
                }
            }

            $categoryNameColumn = null;
            if ($columns['category_id'] && Schema::hasTable('categories')) {
                $categoryColumns = Schema::getColumnListing('categories');
                $categoryNameColumn = $this->firstExisting($categoryColumns, ['name', 'title', 'category_name']);

                if (in_array('id', $categoryColumns, true) && $categoryNameColumn) {
                    $query->leftJoin('categories as c', "p.{$columns['category_id']}", '=', 'c.id');
                    $select[] = "c.{$categoryNameColumn} as category_name";
                }
            }

            $query->select($select);

            if ($columns['status']) {
                $query->where("p.{$columns['status']}", 'active');
            }

            $searchColumns = array_values(array_filter([
                "p.{$nameColumn}",
                $columns['description'] ? "p.{$columns['description']}" : null,
                $columns['sku'] ? "p.{$columns['sku']}" : null,
                ($categoryNameColumn && $columns['category_id']) ? "c.{$categoryNameColumn}" : null,
            ]));

            $terms = $this->searchTerms($userMessage);
            if ($terms && $searchColumns) {
                $query->where(function ($where) use ($terms, $searchColumns) {
                    foreach ($terms as $term) {
                        foreach ($searchColumns as $column) {
                            $where->orWhere($column, 'like', '%' . addcslashes($term, '%_\\') . '%');
                        }
                    }
                });
            }

            if ($columns['created_at']) {
                $query->orderBy("p.{$columns['created_at']}", 'desc');
            } else {
                $query->orderBy('p.id', 'desc');
            }

            $products = $query->limit(max(1, min($limit, 20)))->get();

            // If a keyword search finds nothing, supply a small active catalogue sample.
            if ($products->isEmpty() && $terms) {
                $fallback = DB::table('products as p')->select($select);

                if ($columns['category_id'] && $categoryNameColumn && Schema::hasTable('categories')) {
                    $fallback->leftJoin('categories as c', "p.{$columns['category_id']}", '=', 'c.id');
                }

                if ($columns['status']) {
                    $fallback->where("p.{$columns['status']}", 'active');
                }

                if ($columns['created_at']) {
                    $fallback->orderBy("p.{$columns['created_at']}", 'desc');
                } else {
                    $fallback->orderBy('p.id', 'desc');
                }

                $products = $fallback->limit(min($limit, 8))->get();
            }

            $currency = trim((string) config('services.openrouter.store_currency', ''));

            return $products->map(function ($product) use ($currency): array {
                $basePrice = isset($product->price) && is_numeric($product->price)
                    ? (float) $product->price
                    : null;

                $specialPrice = isset($product->special_price) && is_numeric($product->special_price) && (float) $product->special_price > 0
                    ? (float) $product->special_price
                    : null;

                $effectivePrice = $specialPrice ?? $basePrice;
                $comparePrice = ($specialPrice !== null && $basePrice !== null && $basePrice > $specialPrice)
                    ? $basePrice
                    : null;

                $slug = isset($product->slug) ? trim((string) $product->slug) : '';
                $description = isset($product->description)
                    ? Str::limit(trim(strip_tags((string) $product->description)), 190)
                    : '';

                return [
                    'id' => (int) $product->id,
                    'name' => trim((string) $product->product_name),
                    'description' => $description,
                    'category' => isset($product->category_name) ? trim((string) $product->category_name) : '',
                    'sku' => isset($product->sku) ? trim((string) $product->sku) : '',
                    'image' => $this->imageUrl($product->image ?? null),
                    'price' => $effectivePrice !== null ? $this->formatPrice($effectivePrice, $currency) : '',
                    'compare_at_price' => $comparePrice !== null ? $this->formatPrice($comparePrice, $currency) : '',
                    'currency' => $currency,
                    'url' => $slug !== '' ? route('product.show', ['slug' => $slug], false) : route('shop', [], false),
                ];
            })->values()->all();
        } catch (Throwable $exception) {
            report($exception);

            return [];
        }
    }

    /**
     * Convert actual database products into an AI-readable catalogue list.
     *
     * @param array<int, array<string, mixed>> $products
     */
    public function toPromptContext(array $products): string
    {
        if ($products === []) {
            return 'No active products were found or the product catalogue is currently unavailable. Do not invent product names, prices, images, or specifications.';
        }

        $lines = [];
        foreach ($products as $product) {
            $parts = [
                'ID: ' . $product['id'],
                'Product: ' . $product['name'],
            ];

            if ($product['category'] !== '') {
                $parts[] = 'Category: ' . $product['category'];
            }
            if ($product['price'] !== '') {
                $parts[] = 'Current price: ' . $product['price'];
            }
            if ($product['compare_at_price'] !== '') {
                $parts[] = 'Previous price: ' . $product['compare_at_price'];
            }
            if ($product['sku'] !== '') {
                $parts[] = 'SKU: ' . $product['sku'];
            }
            if ($product['description'] !== '') {
                $parts[] = 'Description: ' . $product['description'];
            }
            if ($product['url'] !== '') {
                $parts[] = 'Product URL: ' . $product['url'];
            }

            $lines[] = '- ' . implode(' | ', $parts);
        }

        return implode("\n", $lines);
    }

    private function firstExisting(array $columns, array $candidates): ?string
    {
        foreach ($candidates as $candidate) {
            if (in_array($candidate, $columns, true)) {
                return $candidate;
            }
        }

        return null;
    }

    private function searchTerms(string $message): array
    {
        $ignored = [
            'the', 'and', 'for', 'with', 'from', 'that', 'this', 'what', 'which', 'when',
            'where', 'have', 'has', 'show', 'find', 'want', 'need', 'price', 'cost', 'does',
            'your', 'you', 'are', 'can', 'please', 'tell', 'about', 'product', 'products',
            'available', 'looking', 'recommend', 'recommendation', 'hello', 'hi', 'hey',
        ];

        return collect(preg_split('/[^\pL\pN]+/u', Str::lower($message)) ?: [])
            ->filter(fn ($term) => mb_strlen($term) >= 3 && ! in_array($term, $ignored, true))
            ->unique()
            ->take(5)
            ->values()
            ->all();
    }

    
private function imageUrl(mixed $value): ?string
{
    if (is_array($value)) {
        $value = $value[0] ?? null;

        if (is_array($value)) {
            $value = $value['url']
                ?? $value['path']
                ?? $value['src']
                ?? null;
        }
    }

    if (!is_string($value) || trim($value) === '') {
        return null;
    }

    $value = trim($value);

    // Handle JSON image arrays
    if (str_starts_with($value, '[') || str_starts_with($value, '{')) {
        $decoded = json_decode($value, true);

        if (is_array($decoded)) {
            $first = array_is_list($decoded)
                ? ($decoded[0] ?? null)
                : ($decoded['url'] ?? $decoded['path'] ?? $decoded['src'] ?? null);

            if (is_array($first)) {
                $first = $first['url']
                    ?? $first['path']
                    ?? $first['src']
                    ?? null;
            }

            $value = is_string($first) ? trim($first) : '';
        }
    }

    if ($value === '') {
        return null;
    }

    // Handle absolute URLs
    if (filter_var($value, FILTER_VALIDATE_URL)) {
        $parts = parse_url($value);

        if (!$parts || !in_array(
            strtolower($parts['scheme'] ?? ''),
            ['http', 'https'],
            true
        )) {
            return null;
        }

        $host = strtolower($parts['host'] ?? '');

        $appHost = strtolower(
            parse_url(config('app.url'), PHP_URL_HOST) ?? ''
        );

        // Convert localhost and current application URLs
        // into relative URLs for desktop, mobile and tunnels.
        if (
            in_array($host, ['localhost', '127.0.0.1', '::1'], true)
            || ($appHost !== '' && $host === $appHost)
        ) {
            return ($parts['path'] ?? '/')
                . (isset($parts['query']) ? '?' . $parts['query'] : '');
        }

        // Keep genuine external image URLs
        return $value;
    }

    // Protocol-relative URLs
    if (str_starts_with($value, '//')) {
        return 'https:' . $value;
    }

    // Already a relative URL
    if (str_starts_with($value, '/')) {
        return $value;
    }

    // Public storage paths
    if (str_starts_with($value, 'storage/')) {
        return '/' . $value;
    }

    // Public image and upload folders
    if (
        str_starts_with($value, 'images/')
        || str_starts_with($value, 'uploads/')
    ) {
        return '/' . $value;
    }

    // Default Laravel public storage path
    return '/storage/' . ltrim($value, '/');
}


    private function formatPrice(float $price, string $currency): string
    {
        $formatted = number_format($price, 2);

        return $currency !== '' ? $formatted . ' ' . $currency : $formatted;
    }
}
