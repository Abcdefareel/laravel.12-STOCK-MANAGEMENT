@extends('layouts.app')

@section('title', 'Stock Movements · StokRapi')

@section('content')
    <div class="space-y-6">
        @if (session('error'))
            <div role="alert" class="rounded-md border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-800">
                {{ session('error') }}</div>
        @endif
        <header class="flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
            <div>
                <p class="text-sm font-semibold text-emerald-700">STOCK ACTIVITY</p>
                <h1 class="mt-2 text-3xl font-semibold">Stock movements</h1>
                <p class="mt-2 text-sm text-stone-600">Track inventory receipts and issues.</p>
            </div>
            <a href="/stock-movements/create"
                class="inline-flex items-center justify-center gap-2 rounded-md bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-emerald-800"><span
                    aria-hidden="true" class="text-lg leading-none">+</span> Record movement</a>
        </header>
        <section class="rounded-lg border border-stone-200 bg-white">
            <div class="flex flex-col gap-4 border-b border-stone-200 p-4 sm:flex-row sm:items-center sm:justify-between">
                <form action="/stock-movements" method="GET" class="flex w-full gap-2 sm:max-w-md">
                    <label for="movement-search" class="sr-only">Search products</label>
                    <input id="movement-search" type="search" name="search" value="{{ request('search') }}"
                        placeholder="Search product name..."
                        class="min-w-0 flex-1 rounded-md border border-stone-300 px-3 py-2 text-sm placeholder:text-stone-400 focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-100">
                    <button type="submit"
                        class="rounded-md border border-stone-300 px-4 py-2 text-sm font-medium text-stone-700 transition hover:bg-stone-100">Search</button>
                </form>
                <p class="text-sm text-stone-500">{{ $stockMovements->total() }} records</p>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-stone-200 text-left text-sm">
                    <thead class="bg-stone-50 text-xs font-semibold uppercase text-stone-500">
                        <tr>
                            <th scope="col" class="px-5 py-3">Product</th>
                            <th scope="col" class="px-5 py-3">Type</th>
                            <th scope="col" class="px-5 py-3 text-right">Quantity</th>
                            <th scope="col" class="px-5 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-100">
                        @forelse ($stockMovements as $movement)
                            <tr class="hover:bg-stone-50/70">
                                <td class="whitespace-nowrap px-5 py-4 font-medium text-stone-900">
                                    {{ $movement->product->product_name }}</td>
                                <td class="whitespace-nowrap px-5 py-4"><span
                                        @class([
                                            'inline-flex rounded px-2.5 py-1 text-xs font-semibold',
                                            'bg-emerald-50 text-emerald-800' => $movement->movement_type == 'in',
                                            'bg-rose-50 text-rose-800' => $movement->movement_type == 'out',
                                        ])>{{ $movement->movement_type == 'in' ? 'In' : 'Out' }}</span>
                                </td>
                                <td class="whitespace-nowrap px-5 py-4 text-right font-medium tabular-nums">
                                    {{ number_format($movement->stock_amount) }}</td>
                                <td class="px-5 py-4">
                                    <div class="flex items-center justify-end gap-3">
                                        <a href="/stock-movements/{{ $movement->id_stock_movement }}/edit"
                                            class="font-medium text-emerald-800 hover:text-emerald-950">Edit</a>
                                        @if (Auth::user()->role == 'admin')
                                            <form action="/stock-movements/{{ $movement->id_stock_movement }}"
                                                method="POST" onsubmit="return confirm('Delete this movement?')">@csrf
                                                @method('DELETE')<button type="submit"
                                                    class="font-medium text-rose-700 hover:text-rose-900">Delete</button>
                                            </form>
                                            <form action="/stock-movements/{{ $movement->id_product }}/reset" method="POST"
                                                onsubmit="return confirm('Reset this product stock?')">@csrf<button
                                                    type="submit"
                                                    class="font-medium text-stone-600 hover:text-stone-900">Reset
                                                    stock</button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-5 py-12 text-center">
                                    <p class="font-medium text-stone-700">No stock movements yet</p>
                                    <p class="mt-1 text-sm text-stone-500">Incoming and outgoing stock records will appear
                                        here.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($stockMovements->hasPages())
                <div class="border-t border-stone-200 px-5 py-4">{{ $stockMovements->links('pagination::simple-default') }}
                </div>
            @endif
        </section>
    </div>
@endsection
