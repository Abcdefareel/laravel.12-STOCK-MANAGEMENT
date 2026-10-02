@extends('layouts.app')

@section('title', 'Edit Product · StokRapi')

@section('content')
    <div class="mx-auto max-w-2xl space-y-6">
        <div>
            <a href="/products" class="text-sm font-medium text-emerald-800 hover:text-emerald-950">← Back to products</a>
            <p class="mt-6 text-sm font-semibold text-emerald-700">INVENTORY</p>
            <h1 class="mt-2 text-3xl font-semibold">Edit product</h1>
            <p class="mt-2 text-sm text-stone-600">Update the selected product information.</p>
        </div>
        <form action="/products/{{ $product->id_product }}" method="POST"
            class="space-y-6 rounded-lg border border-stone-200 bg-white p-5 sm:p-7">
            @csrf
            @method('PUT')
            <div class="space-y-5">
                <div>
                    <label for="product_name" class="mb-2 block text-sm font-medium text-stone-800">Product name</label>
                    <input id="product_name" type="text" name="product_name"
                        value="{{ old('product_name', $product->product_name) }}" required
                        class="w-full rounded-md border border-stone-300 px-3 py-2.5 text-sm focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-100">
                    @error('product_name')
                        <p class="mt-2 text-sm text-rose-700">{{ $message }}</p>
                    @enderror
                </div>
                <div class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <label for="id_category" class="mb-2 block text-sm font-medium text-stone-800">Category ID</label>
                        <input id="id_category" type="number" min="1" name="id_category"
                            value="{{ old('id_category', $product->id_category) }}" required
                            class="w-full rounded-md border border-stone-300 px-3 py-2.5 text-sm focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-100">
                        @error('id_category')
                            <p class="mt-2 text-sm text-rose-700">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="id_supplier" class="mb-2 block text-sm font-medium text-stone-800">Supplier ID</label>
                        <input id="id_supplier" type="number" min="1" name="id_supplier"
                            value="{{ old('id_supplier', $product->id_supplier) }}" required
                            class="w-full rounded-md border border-stone-300 px-3 py-2.5 text-sm focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-100">
                        @error('id_supplier')
                            <p class="mt-2 text-sm text-rose-700">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex flex-col-reverse gap-3 border-t border-stone-200 pt-5 sm:flex-row sm:justify-end">
                <a href="/products"
                    class="rounded-md border border-stone-300 px-4 py-2.5 text-center text-sm font-semibold text-stone-700 hover:bg-stone-100">Cancel</a>
                <button type="submit"
                    class="rounded-md bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-emerald-800">Save
                    changes</button>
            </div>
        </form>
    </div>
@endsection
