@extends('layouts.app')

@section('title', 'Edit Stock Movement · StokRapi')

@section('content')
    <div class="mx-auto max-w-2xl space-y-6">
        <div>
            <a href="/stock-movements" class="text-sm font-medium text-emerald-800 hover:text-emerald-950">← Back to stock
                movements</a>
            <p class="mt-6 text-sm font-semibold text-emerald-700">STOCK ACTIVITY</p>
            <h1 class="mt-2 text-3xl font-semibold">Edit stock movement</h1>
            <p class="mt-2 text-sm text-stone-600">Update the selected stock movement record.</p>
        </div>
        <form action="/stock-movements/{{ $movement->id_stock_movement }}" method="POST"
            class="space-y-6 rounded-lg border border-stone-200 bg-white p-5 sm:p-7">
            @csrf
            @method('PUT')
            <div class="space-y-5">
                <div>
                    <label for="id_product" class="mb-2 block text-sm font-medium text-stone-800">Product</label>
                    <select id="id_product" name="id_product" required
                        class="w-full rounded-md border border-stone-300 bg-white px-3 py-2.5 text-sm focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-100">
                        @foreach ($products as $product)
                            <option value="{{ $product->id_product }}" @selected(old('id_product', $movement->id_product) == $product->id_product)>
                                {{ $product->product_name }}</option>
                        @endforeach
                    </select>
                    @error('id_product')
                        <p class="mt-2 text-sm text-rose-700">{{ $message }}</p>
                    @enderror
                </div>
                <div class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <label for="movement_type" class="mb-2 block text-sm font-medium text-stone-800">Movement
                            type</label>
                        <select id="movement_type" name="movement_type" required
                            class="w-full rounded-md border border-stone-300 bg-white px-3 py-2.5 text-sm focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-100">
                            <option value="in" @selected(old('movement_type', $movement->movement_type) == 'in')>Stock received</option>
                            <option value="out" @selected(old('movement_type', $movement->movement_type) == 'out')>Stock issued</option>
                        </select>
                        @error('movement_type')
                            <p class="mt-2 text-sm text-rose-700">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="stock_amount" class="mb-2 block text-sm font-medium text-stone-800">Quantity</label>
                        <input id="stock_amount" type="number" min="1" name="stock_amount"
                            value="{{ old('stock_amount', $movement->stock_amount) }}" required
                            class="w-full rounded-md border border-stone-300 px-3 py-2.5 text-sm focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-100">
                        @error('stock_amount')
                            <p class="mt-2 text-sm text-rose-700">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex flex-col-reverse gap-3 border-t border-stone-200 pt-5 sm:flex-row sm:justify-end">
                <a href="/stock-movements"
                    class="rounded-md border border-stone-300 px-4 py-2.5 text-center text-sm font-semibold text-stone-700 hover:bg-stone-100">Cancel</a>
                <button type="submit"
                    class="rounded-md bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-emerald-800">Save
                    changes</button>
            </div>
        </form>
    </div>
@endsection
