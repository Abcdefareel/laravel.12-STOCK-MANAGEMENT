@extends('layouts.app')

@section('title', 'Overview · StokRapi')

@section('content')
    <div class="space-y-8">
        <div>
            <p class="text-sm font-semibold text-emerald-700">INVENTORY OVERVIEW</p>
            <h1 class="mt-2 text-3xl font-semibold tracking-normal text-stone-900">Welcome, {{ Auth::user()->name }}
            </h1>
            <p class="mt-2 text-sm text-stone-600">Monitor your inventory levels and stock activity.</p>
        </div>

        <section aria-label="Inventory statistics" class="grid gap-4 sm:grid-cols-2 xl:grid-cols-5">
            <article class="rounded-lg border border-stone-200 border-t-4 border-t-emerald-700 bg-white p-5">
                <p class="text-sm font-medium text-stone-600">Total products</p>
                <p class="mt-3 text-3xl font-semibold tabular-nums">{{ number_format($products) }}</p>
                <a href="/products"
                    class="mt-4 inline-block text-sm font-medium text-emerald-800 hover:text-emerald-950">View products
                    <span aria-hidden="true">→</span></a>
            </article>
            <article class="rounded-lg border border-stone-200 border-t-4 border-t-sky-600 bg-white p-5">
                <p class="text-sm font-medium text-stone-600">Total suppliers</p>
                <p class="mt-3 text-3xl font-semibold tabular-nums">{{ number_format($suppliers) }}</p>
                <a href="/suppliers"
                    class="mt-4 inline-block text-sm font-medium text-emerald-800 hover:text-emerald-950">View suppliers
                    <span aria-hidden="true">→</span></a>
            </article>
            <article class="rounded-lg border border-stone-200 border-t-4 border-t-emerald-500 bg-white p-5">
                <p class="text-sm font-medium text-stone-600">Stock received</p>
                <p class="mt-3 text-3xl font-semibold tabular-nums">{{ number_format($stockIn) }}</p>
                <p class="mt-4 text-sm text-stone-500">Units received</p>
            </article>
            <article class="rounded-lg border border-stone-200 border-t-4 border-t-rose-500 bg-white p-5">
                <p class="text-sm font-medium text-stone-600">Stock issued</p>
                <p class="mt-3 text-3xl font-semibold tabular-nums">{{ number_format($stockOut) }}</p>
                <p class="mt-4 text-sm text-stone-500">Units issued</p>
            </article>
            <article
                class="rounded-lg border border-stone-200 border-t-4 border-t-amber-500 bg-white p-5 sm:col-span-2 xl:col-span-1">
                <p class="text-sm font-medium text-stone-600">Estimated stock</p>
                <p class="mt-3 text-3xl font-semibold tabular-nums">{{ number_format($totalStock) }}</p>
                <p class="mt-4 text-sm text-stone-500">Received minus issued</p>
            </article>
        </section>

        <section class="border-t border-stone-200 pt-6">
            <h2 class="text-base font-semibold">Quick actions</h2>
            <div class="mt-4 flex flex-wrap gap-3">
                <a href="/products/create"
                    class="rounded-md bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-emerald-800">+
                    Add product</a>
                <a href="/stock-movements/create"
                    class="rounded-md border border-stone-300 bg-white px-4 py-2.5 text-sm font-semibold text-stone-700 transition hover:bg-stone-100">Record
                    stock movement</a>
            </div>
        </section>
    </div>
@endsection
