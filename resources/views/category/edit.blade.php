@extends('layouts.app')

@section('title', 'Edit Category · StokRapi')

@section('content')
    <div class="mx-auto max-w-2xl space-y-6">
        <div>
            <a href="/categories" class="text-sm font-medium text-emerald-800 hover:text-emerald-950">← Back to categories</a>
            <p class="mt-6 text-sm font-semibold text-emerald-700">INVENTORY</p>
            <h1 class="mt-2 text-3xl font-semibold">Edit category</h1>
            <p class="mt-2 text-sm text-stone-600">Update the selected category name.</p>
        </div>
        <form action="/categories/{{ $categories->id_category }}" method="POST"
            class="space-y-6 rounded-lg border border-stone-200 bg-white p-5 sm:p-7">
            @csrf
            @method('PUT')
            <div>
                <label for="type" class="mb-2 block text-sm font-medium text-stone-800">Category name</label>
                <input id="type" type="text" name="type" value="{{ old('type', $categories->type) }}" required
                    class="w-full rounded-md border border-stone-300 px-3 py-2.5 text-sm focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-100">
                @error('type')
                    <p class="mt-2 text-sm text-rose-700">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col-reverse gap-3 border-t border-stone-200 pt-5 sm:flex-row sm:justify-end">
                <a href="/categories"
                    class="rounded-md border border-stone-300 px-4 py-2.5 text-center text-sm font-semibold text-stone-700 hover:bg-stone-100">Cancel</a>
                <button type="submit"
                    class="rounded-md bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-emerald-800">Save
                    changes</button>
            </div>
        </form>
    </div>
@endsection
