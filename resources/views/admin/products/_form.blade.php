@php
    $isEdit = isset($product);
@endphp

<div class="space-y-6">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
        <div class="space-y-1.5">
            <label for="category_id" class="block text-xs font-semibold uppercase tracking-wider text-slate-400">
                Category <span class="text-rose-400">*</span>
            </label>
            <select name="category_id" id="category_id" required
                class="block w-full rounded-xl border border-slate-700/80 bg-slate-900/90 text-sm text-white px-4 py-2.5 outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/20">
                <option value="">Select category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id ?? '') == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-xs text-rose-400">{{ $message }}</p>
            @enderror
            @if ($categories->isEmpty())
                <p class="text-xs text-amber-400">No categories yet. <a href="{{ route('admin.categories.index') }}" class="underline font-semibold">Add a category</a> first.</p>
            @endif
        </div>

        <div class="space-y-1.5">
            <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-slate-400">
                Product Name <span class="text-rose-400">*</span>
            </label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name ?? '') }}" required
                class="block w-full rounded-xl border border-slate-700/80 bg-slate-900/90 text-sm text-white placeholder:text-slate-500 px-4 py-2.5 outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/20"
                placeholder="Enter product name" />
            @error('name')
                <p class="text-xs text-rose-400">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
        <div class="space-y-1.5">
            <label for="price" class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Price</label>
            <input type="number" step="0.01" min="0" name="price" id="price" value="{{ old('price', $product->price ?? '0') }}"
                class="block w-full rounded-xl border border-slate-700/80 bg-slate-900/90 text-sm text-white px-4 py-2.5 outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/20" />
            @error('price')
                <p class="text-xs text-rose-400">{{ $message }}</p>
            @enderror
        </div>
        <div class="space-y-1.5">
            <label for="special_offer_price" class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Special Offer Price</label>
            <input type="number" step="0.01" min="0" name="special_offer_price" id="special_offer_price" value="{{ old('special_offer_price', $product->special_offer_price ?? '') }}"
                class="block w-full rounded-xl border border-slate-700/80 bg-slate-900/90 text-sm text-white px-4 py-2.5 outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/20"
                placeholder="Optional" />
            @error('special_offer_price')
                <p class="text-xs text-rose-400">{{ $message }}</p>
            @enderror
        </div>
        <div class="space-y-1.5">
            <label for="status" class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Status</label>
            <select name="status" id="status"
                class="block w-full rounded-xl border border-slate-700/80 bg-slate-900/90 text-sm text-white px-4 py-2.5 outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/20">
                <option value="active" @selected(old('status', $product->status ?? 'active') === 'active')>Active</option>
                <option value="inactive" @selected(old('status', $product->status ?? '') === 'inactive')>Inactive</option>
            </select>
        </div>
    </div>

    <div class="space-y-1.5">
        <label for="images" class="block text-xs font-semibold uppercase tracking-wider text-slate-400">
            Product Images <span class="text-slate-500 font-normal normal-case">(multiple)</span>
        </label>
        <input type="file" name="images[]" id="images" accept="image/*" multiple
            class="block w-full text-sm text-slate-400 file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:bg-emerald-600 file:text-white file:text-xs file:font-semibold hover:file:bg-emerald-500" />
        @error('images')
            <p class="text-xs text-rose-400">{{ $message }}</p>
        @enderror
        @error('images.*')
            <p class="text-xs text-rose-400">{{ $message }}</p>
        @enderror

        @if ($isEdit && !empty($product->images))
            <div class="mt-3 flex flex-wrap gap-3">
                @foreach ($product->images as $img)
                    <img src="{{ asset('storage/'.$img) }}" alt="" class="w-16 h-16 rounded-lg object-cover border border-slate-700">
                @endforeach
            </div>
            <label class="mt-2 inline-flex items-center gap-2 text-xs text-slate-400 cursor-pointer">
                <input type="checkbox" name="remove_all_images" value="1" class="rounded border-slate-600 bg-slate-900 text-emerald-600 focus:ring-emerald-500/30">
                Remove all existing images
            </label>
        @endif
    </div>

    @foreach ([
        'description' => 'Product Description',
        'features' => 'Features',
        'specification' => 'Specification',
        'whats_include' => "What's Include",
        'compatibility' => 'Compatibility',
        'faq' => 'FAQ',
    ] as $field => $label)
        <div class="space-y-1.5">
            <label for="{{ $field }}" class="block text-xs font-semibold uppercase tracking-wider text-slate-400">{{ $label }}</label>
            <textarea name="{{ $field }}" id="{{ $field }}" class="ckeditor-field" rows="6">{{ old($field, $product->$field ?? '') }}</textarea>
            @error($field)
                <p class="text-xs text-rose-400">{{ $message }}</p>
            @enderror
        </div>
    @endforeach
</div>
