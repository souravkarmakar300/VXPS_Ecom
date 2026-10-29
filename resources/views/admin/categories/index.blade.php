@extends('layouts.admin')

@php
    $title = 'Categories';
    $header = 'Product Categories';
@endphp

@section('content')
<div class="space-y-6 max-w-5xl mx-auto">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div>
            <h2 class="text-xl font-bold text-white">Categories</h2>
            <p class="text-sm text-slate-400 mt-0.5">Add category name and image before creating products.</p>
        </div>
        <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-medium text-slate-300 bg-slate-800/80 border border-slate-700/70 hover:bg-slate-800 hover:text-white transition-colors">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Back to Products
        </a>
    </div>

    <div class="bg-slate-900/80 border border-slate-800/80 rounded-2xl p-5 sm:p-6">
        <h3 class="text-sm font-bold text-white mb-4">Add Category</h3>
        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 sm:grid-cols-2 gap-4 items-end">
            @csrf
            <div class="space-y-1.5">
                <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Category Name <span class="text-rose-400">*</span></label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                    class="block w-full rounded-xl border border-slate-700/80 bg-slate-900/90 text-sm text-white placeholder:text-slate-500 px-4 py-2.5 outline-none focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/20"
                    placeholder="e.g. Laptops" />
                @error('name')
                    <p class="text-xs text-rose-400">{{ $message }}</p>
                @enderror
            </div>
            <div class="space-y-1.5">
                <label for="image" class="block text-xs font-semibold uppercase tracking-wider text-slate-400">Category Image</label>
                <input type="file" name="image" id="image" accept="image/*"
                    class="block w-full text-sm text-slate-400 file:mr-3 file:py-2 file:px-3 file:rounded-lg file:border-0 file:bg-emerald-600 file:text-white file:text-xs file:font-semibold hover:file:bg-emerald-500" />
                @error('image')
                    <p class="text-xs text-rose-400">{{ $message }}</p>
                @enderror
            </div>
            <div class="sm:col-span-2">
                <x-admin.button type="submit">Save Category</x-admin.button>
            </div>
        </form>
    </div>

    <div class="bg-slate-900/80 border border-slate-800/80 rounded-2xl overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-800 flex items-center justify-between">
            <h3 class="text-sm font-bold text-white">All Categories</h3>
            <span class="text-xs text-slate-400 font-mono">{{ $categories->total() }} total</span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-300">
                <thead class="text-[11px] uppercase tracking-wider text-slate-400 bg-slate-800/40 border-b border-slate-800">
                    <tr>
                        <th class="px-4 py-3">Image</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Products</th>
                        <th class="px-4 py-3">Created</th>
                        <th class="px-4 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @forelse ($categories as $category)
                        <tr class="hover:bg-slate-800/30 transition-colors">
                            <td class="px-4 py-3">
                                @if ($category->image)
                                    <img src="{{ asset('storage/'.$category->image) }}" alt="{{ $category->name }}" class="w-10 h-10 rounded-lg object-cover border border-slate-700">
                                @else
                                    <div class="w-10 h-10 rounded-lg bg-slate-800 border border-slate-700 flex items-center justify-center text-slate-500 text-[10px]">N/A</div>
                                @endif
                            </td>
                            <td class="px-4 py-3 font-semibold text-white">{{ $category->name }}</td>
                            <td class="px-4 py-3 font-mono">{{ $category->products_count }}</td>
                            <td class="px-4 py-3 text-slate-400">{{ $category->created_at->format('M d, Y') }}</td>
                            <td class="px-4 py-3 text-right">
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('Delete this category?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-400 hover:text-rose-300 text-xs font-semibold cursor-pointer">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-8 text-center text-slate-500">No categories yet. Add one above.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($categories->hasPages())
            <div class="px-4 py-3 border-t border-slate-800">
                {{ $categories->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
