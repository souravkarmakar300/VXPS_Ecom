@extends('layouts.admin')

@php
    $title = 'Edit Product';
    $header = 'Edit Product';
@endphp

@section('content')
<div class="space-y-6 max-w-4xl mx-auto">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div>
            <h2 class="text-xl font-bold text-white">Edit Product</h2>
            <p class="text-sm text-slate-400 mt-0.5">{{ $product->name }}</p>
        </div>
        <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-sm font-medium text-slate-300 bg-slate-800/80 border border-slate-700/70 hover:bg-slate-800 hover:text-white transition-colors">
            Back to list
        </a>
    </div>

    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="bg-slate-900/80 border border-slate-800/80 rounded-2xl p-5 sm:p-6 space-y-6">
        @csrf
        @method('PUT')
        @include('admin.products._form')
        <div class="pt-2 flex items-center gap-3">
            <x-admin.button type="submit">Update Product</x-admin.button>
            <a href="{{ route('admin.products.index') }}" class="text-sm text-slate-400 hover:text-white">Cancel</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
    @include('admin.products._ckeditor')
@endpush
