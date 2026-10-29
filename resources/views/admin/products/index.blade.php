@extends('layouts.admin')

@php
    $title = 'Products';
    $header = 'Products Catalog';
@endphp

@section('content')
<div class="space-y-6 max-w-7xl mx-auto">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div>
            <h2 class="text-xl font-bold text-slate-900 dark:text-white">All Products</h2>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-0.5">Manage catalog items. {{ $products->total() }} product(s) total.</p>
        </div>
        <div class="flex flex-wrap items-center gap-2">
            <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-medium text-slate-700 dark:text-slate-300 bg-white dark:bg-slate-800/80 border border-gray-300 dark:border-slate-700/70 hover:bg-gray-100 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-white transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                </svg>
                Categories
            </a>
            <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-500 shadow-sm shadow-emerald-600/30 transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Add Product
            </a>
        </div>
    </div>

    <div class="bg-white dark:bg-slate-900/80 border border-gray-200 dark:border-slate-800/80 rounded-2xl overflow-hidden shadow-xs">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-700 dark:text-slate-300">
                <thead class="text-[11px] uppercase tracking-wider text-slate-500 dark:text-slate-400 bg-gray-50 dark:bg-slate-800/40 border-b border-gray-200 dark:border-slate-800">
                    <tr>
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Image</th>
                        <th class="px-4 py-3">Product</th>
                        <th class="px-4 py-3">Category</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Created</th>
                        <th class="px-4 py-3 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-slate-800/60">
                    @forelse ($products as $product)
                        <tr class="hover:bg-gray-50 dark:hover:bg-slate-800/30 transition-colors">
                            <td class="px-4 py-3.5 font-mono text-slate-400 dark:text-slate-500">{{ $products->firstItem() + $loop->index }}</td>
                            <td class="px-4 py-3.5">
                                @php $img = $product->primary_image; @endphp
                                @if ($img)
                                    <img src="{{ asset('storage/'.$img) }}" alt="{{ $product->name }}" class="w-11 h-11 rounded-lg object-cover border border-gray-200 dark:border-slate-700">
                                @else
                                    <div class="w-11 h-11 rounded-lg bg-gray-100 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 flex items-center justify-center text-slate-400 text-[10px]">N/A</div>
                                @endif
                            </td>
                            <td class="px-4 py-3.5">
                                <div class="font-semibold text-slate-900 dark:text-white">{{ $product->name }}</div>
                                <div class="text-[11px] text-slate-500 font-mono">{{ Str::limit($product->slug, 32) }}</div>
                            </td>
                            <td class="px-4 py-3.5">
                                @if ($product->category)
                                    <span class="inline-flex px-2 py-0.5 rounded-full bg-gray-100 dark:bg-slate-800 border border-gray-200 dark:border-slate-700 text-slate-700 dark:text-slate-300">{{ $product->category->name }}</span>
                                @else
                                    <span class="text-slate-400 dark:text-slate-500">—</span>
                                @endif
                            </td>
                            <td class="px-4 py-3.5">
                                @if ($product->status === 'active')
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-semibold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Active
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-[10px] font-semibold bg-gray-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 border border-gray-200 dark:border-slate-700/60">
                                        Inactive
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3.5 text-slate-500 dark:text-slate-400">{{ $product->created_at->format('M d, Y') }}</td>
                            <td class="px-4 py-3.5 text-right whitespace-nowrap">
                                <a href="{{ route('admin.products.edit', $product) }}" class="text-emerald-600 dark:text-emerald-400 hover:text-emerald-500 dark:hover:text-emerald-300 font-semibold mr-3">Edit</a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Delete this product?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-600 dark:text-rose-400 hover:text-rose-500 dark:hover:text-rose-300 font-semibold cursor-pointer">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-10 text-center text-slate-500">
                                <p class="mb-3">No products yet.</p>
                                <a href="{{ route('admin.products.create') }}" class="text-emerald-600 dark:text-emerald-400 font-semibold hover:text-emerald-500 dark:hover:text-emerald-300">Add your first product →</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($products->hasPages())
            <div class="px-4 py-4 border-t border-gray-200 dark:border-slate-800 flex justify-center">
                {{ $products->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
