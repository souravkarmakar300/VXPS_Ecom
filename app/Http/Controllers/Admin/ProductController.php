<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::with('category')
            ->latest()
            ->paginate(20);

        return view('admin.products.index', compact('products'));
    }

    public function create(): View
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validateProduct($request);

        $imagePaths = $this->storeImages($request);
        $slug = $this->uniqueSlug($validated['name']);

        Product::create([
            'category_id' => $validated['category_id'],
            'name' => $validated['name'],
            'slug' => $slug,
            'description' => $validated['description'] ?? null,
            'features' => $validated['features'] ?? null,
            'specification' => $validated['specification'] ?? null,
            'whats_include' => $validated['whats_include'] ?? null,
            'compatibility' => $validated['compatibility'] ?? null,
            'faq' => $validated['faq'] ?? null,
            'price' => $validated['price'] ?? 0,
            'special_offer_price' => $validated['special_offer_price'] ?? null,
            'status' => $validated['status'] ?? 'active',
            'images' => $imagePaths,
            'image' => $imagePaths[0] ?? null,
        ]);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function edit(Product $product): View
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $this->validateProduct($request, updating: true);

        $imagePaths = $product->images ?? [];
        if (! is_array($imagePaths)) {
            $imagePaths = [];
        }

        if ($request->boolean('remove_all_images')) {
            $this->deleteImages($imagePaths);
            $imagePaths = [];
        }

        $newPaths = $this->storeImages($request);
        if (! empty($newPaths)) {
            $imagePaths = array_values(array_merge($imagePaths, $newPaths));
        }

        $product->update([
            'category_id' => $validated['category_id'],
            'name' => $validated['name'],
            'slug' => $this->uniqueSlug($validated['name'], $product->id),
            'description' => $validated['description'] ?? null,
            'features' => $validated['features'] ?? null,
            'specification' => $validated['specification'] ?? null,
            'whats_include' => $validated['whats_include'] ?? null,
            'compatibility' => $validated['compatibility'] ?? null,
            'faq' => $validated['faq'] ?? null,
            'price' => $validated['price'] ?? $product->price,
            'special_offer_price' => $validated['special_offer_price'] ?? null,
            'status' => $validated['status'] ?? $product->status,
            'images' => $imagePaths,
            'image' => $imagePaths[0] ?? null,
        ]);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $this->deleteImages($product->images ?? []);
        if ($product->image && (! is_array($product->images) || ! in_array($product->image, $product->images, true))) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }

    private function validateProduct(Request $request, bool $updating = false): array
    {
        $imageRule = $updating
            ? ['nullable', 'image', 'mimes:jpeg,jpg,png,webp,gif', 'max:4096']
            : ['nullable', 'image', 'mimes:jpeg,jpg,png,webp,gif', 'max:4096'];

        return $request->validate([
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'features' => ['nullable', 'string'],
            'specification' => ['nullable', 'string'],
            'whats_include' => ['nullable', 'string'],
            'compatibility' => ['nullable', 'string'],
            'faq' => ['nullable', 'string'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'special_offer_price' => ['nullable', 'numeric', 'min:0'],
            'status' => ['nullable', 'in:active,inactive'],
            'images' => ['nullable', 'array'],
            'images.*' => $imageRule,
            'remove_all_images' => ['nullable', 'boolean'],
        ]);
    }

    /**
     * @return list<string>
     */
    private function storeImages(Request $request): array
    {
        $paths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                if ($file && $file->isValid()) {
                    $paths[] = $file->store('products', 'public');
                }
            }
        }

        return $paths;
    }

    /**
     * @param  array<int, string>|null  $paths
     */
    private function deleteImages(?array $paths): void
    {
        if (empty($paths)) {
            return;
        }

        foreach ($paths as $path) {
            if ($path) {
                Storage::disk('public')->delete($path);
            }
        }
    }

    private function uniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $base = Str::slug($name) ?: 'product';
        $slug = $base;
        $i = 1;

        while (
            Product::where('slug', $slug)
                ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $base.'-'.$i++;
        }

        return $slug;
    }
}
