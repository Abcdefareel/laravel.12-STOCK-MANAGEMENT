@extends('layouts.app')

@section('title', 'Suppliers · StokRapi')

@section('content')
    <div class="space-y-6">
        @if (session('error'))
            <div role="alert" class="rounded-md border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-800">
                {{ session('error') }}</div>
        @endif
        <header class="flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
            <div>
                <p class="text-sm font-semibold text-emerald-700">INVENTORY</p>
                <h1 class="mt-2 text-3xl font-semibold">Suppliers</h1>
                <p class="mt-2 text-sm text-stone-600">Manage the businesses that supply your products.</p>
            </div>
            <a href="/suppliers/create"
                class="inline-flex items-center justify-center gap-2 rounded-md bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-emerald-800"><span
                    aria-hidden="true" class="text-lg leading-none">+</span> Add supplier</a>
        </header>
        <section class="rounded-lg border border-stone-200 bg-white">
            <div class="flex flex-col gap-4 border-b border-stone-200 p-4 sm:flex-row sm:items-center sm:justify-between">
                <form action="/suppliers" method="GET" class="flex w-full gap-2 sm:max-w-md">
                    <label for="supplier-search" class="sr-only">Search suppliers</label>
                    <input id="supplier-search" type="search" name="search" value="{{ request('search') }}"
                        placeholder="Search suppliers..."
                        class="min-w-0 flex-1 rounded-md border border-stone-300 px-3 py-2 text-sm placeholder:text-stone-400 focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-100">
                    <button type="submit"
                        class="rounded-md border border-stone-300 px-4 py-2 text-sm font-medium text-stone-700 transition hover:bg-stone-100">Search</button>
                </form>
                <p class="text-sm text-stone-500">{{ $suppliers->total() }} suppliers</p>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-stone-200 text-left text-sm">
                    <thead class="bg-stone-50 text-xs font-semibold uppercase text-stone-500">
                        <tr>
                            <th scope="col" class="px-5 py-3">Supplier name</th>
                            <th scope="col" class="px-5 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-100">
                        @forelse ($suppliers as $supplier)
                            <tr class="hover:bg-stone-50/70">
                                <td class="whitespace-nowrap px-5 py-4 font-medium text-stone-900">
                                    {{ $supplier->name_supplier }}</td>
                                <td class="px-5 py-4">
                                    <div class="flex items-center justify-end gap-3">
                                        <a href="/suppliers/{{ $supplier->id_supplier }}/edit"
                                            class="font-medium text-emerald-800 hover:text-emerald-950">Edit</a>
                                        @if (Auth::user()->role == 'admin')
                                            <form action="/suppliers/{{ $supplier->id_supplier }}" method="POST"
                                                onsubmit="return confirm('Delete this supplier?')">@csrf
                                                @method('DELETE')<button type="submit"
                                                    class="font-medium text-rose-700 hover:text-rose-900">Delete</button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="px-5 py-12 text-center">
                                    <p class="font-medium text-stone-700">No suppliers found</p>
                                    <p class="mt-1 text-sm text-stone-500">Try a different search or add a new supplier.
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($suppliers->hasPages())
                <div class="border-t border-stone-200 px-5 py-4">{{ $suppliers->links('pagination::simple-default') }}</div>
            @endif
        </section>
    </div>
@endsection
