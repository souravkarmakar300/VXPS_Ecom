<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class ShopController extends Controller
{
    public function index(Request $request): View
    {
        $categories = Schema::hasTable('categories')
            ? Category::withCount(['products' => fn ($q) => $q->where('status', 'active')])
                ->orderBy('name')
                ->get()
            : collect();

        $query = Product::with('category')->where('status', 'active');

        // Filter by category slug
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->string('category'));
            });
        }

        // Filter: special offer only
        if ($request->string('offer') === 'special') {
            $query->whereNotNull('special_offer_price')
                ->where('special_offer_price', '>', 0);
        }

        // Filter by price range (uses effective selling price)
        $minPrice = $request->filled('min_price') ? (float) $request->input('min_price') : null;
        $maxPrice = $request->filled('max_price') ? (float) $request->input('max_price') : null;

        if ($minPrice !== null || $maxPrice !== null) {
            $query->where(function ($q) use ($minPrice, $maxPrice) {
                $effective = 'COALESCE(NULLIF(special_offer_price, 0), price)';

                if ($minPrice !== null) {
                    $q->whereRaw("{$effective} >= ?", [$minPrice]);
                }
                if ($maxPrice !== null) {
                    $q->whereRaw("{$effective} <= ?", [$maxPrice]);
                }
            });
        }

        // Sort
        $sort = $request->string('sort')->toString() ?: 'featured';

        match ($sort) {
            'best-selling', 'featured' => $query->latest(),
            'title-asc' => $query->orderBy('name'),
            'title-desc' => $query->orderByDesc('name'),
            'price-asc' => $query->orderByRaw('COALESCE(NULLIF(special_offer_price, 0), price) ASC'),
            'price-desc' => $query->orderByRaw('COALESCE(NULLIF(special_offer_price, 0), price) DESC'),
            'date-asc' => $query->orderBy('created_at'),
            'date-desc' => $query->orderByDesc('created_at'),
            default => $query->latest(),
        };

        $products = $query->paginate(20)->withQueryString();

        $products->getCollection()->transform(function (Product $product) {
            $product->card_type = ($product->special_offer_price !== null && (float) $product->special_offer_price > 0)
                ? 'special'
                : 'regular';

            return $product;
        });

        $activeCategory = $request->filled('category')
            ? $categories->firstWhere('slug', $request->string('category')->toString())
            : null;

        $filters = [
            'category' => $request->input('category'),
            'offer' => $request->input('offer'),
            'min_price' => $request->input('min_price'),
            'max_price' => $request->input('max_price'),
            'sort' => $sort,
        ];

        $maxProductPrice = (float) (Product::where('status', 'active')->max('price') ?: 500);
        $priceSliderMax = max(350, (int) (ceil($maxProductPrice / 50) * 50));

        return view('shop', compact('products', 'categories', 'filters', 'activeCategory', 'priceSliderMax'));
    }

    public function show(string $slug): View
    {
        $product = Product::with('category')
            ->where('status', 'active')
            ->where(function ($query) use ($slug) {
                $query->where('slug', $slug)
                    ->orWhere('id', $slug);
            })
            ->firstOrFail();

        $product->card_type = ($product->special_offer_price !== null && (float) $product->special_offer_price > 0)
            ? 'special'
            : 'regular';

        // Related / recommended products
        $relatedProducts = Product::with('category')
            ->where('status', 'active')
            ->where('id', '!=', $product->id)
            ->where(function ($q) use ($product) {
                if ($product->category_id) {
                    $q->where('category_id', $product->category_id);
                }
            })
            ->latest()
            ->take(4)
            ->get();

        if ($relatedProducts->count() < 4) {
            $filler = Product::with('category')
                ->where('status', 'active')
                ->where('id', '!=', $product->id)
                ->whereNotIn('id', $relatedProducts->pluck('id'))
                ->latest()
                ->take(4 - $relatedProducts->count())
                ->get();
            $relatedProducts = $relatedProducts->concat($filler);
        }

        $relatedProducts->transform(function (Product $p) {
            $p->card_type = ($p->special_offer_price !== null && (float) $p->special_offer_price > 0)
                ? 'special'
                : 'regular';

            return $p;
        });

        return view('product-detail', compact('product', 'relatedProducts'));
    }
}
