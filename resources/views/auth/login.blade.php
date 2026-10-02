@extends('layouts.app')

@section('title', 'Log In · StokRapi')

@section('content')
    <div class="mx-auto max-w-md py-6 sm:py-12">
        <div class="mb-7 text-center">
            <span
                class="mx-auto grid size-12 place-items-center rounded-lg bg-emerald-700 text-sm font-bold text-white">SR</span>
            <p class="mt-4 text-sm font-semibold text-emerald-700">STOKRAPI</p>
            <h1 class="mt-2 text-3xl font-semibold">Welcome back</h1>
            <p class="mt-2 text-sm text-stone-600">Log in to manage your inventory.</p>
        </div>
        <form action="/login" method="POST"
            class="space-y-5 rounded-lg border border-stone-200 bg-white p-5 shadow-sm sm:p-7">
            @csrf
            @if (session('error'))
                <div role="alert" class="rounded-md border border-rose-200 bg-rose-50 px-3 py-2.5 text-sm text-rose-800">
                    {{ session('error') }}</div>
            @endif
            <div>
                <label for="email" class="mb-2 block text-sm font-medium text-stone-800">Email address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="email"
                    placeholder="you@example.com" required autofocus
                    class="w-full rounded-md border border-stone-300 px-3 py-2.5 text-sm placeholder:text-stone-400 focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-100">
                @error('email')
                    <p class="mt-2 text-sm text-rose-700">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password" class="mb-2 block text-sm font-medium text-stone-800">Password</label>
                <input id="password" type="password" name="password" autocomplete="current-password"
                    placeholder="Enter your password" required
                    class="w-full rounded-md border border-stone-300 px-3 py-2.5 text-sm placeholder:text-stone-400 focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-100">
                @error('password')
                    <p class="mt-2 text-sm text-rose-700">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit"
                class="w-full rounded-md bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-emerald-800">Log
                in</button>
            <p class="text-center text-sm text-stone-600">Don't have an account? <a href="{{ route('register') }}"
                    class="font-semibold text-emerald-800 hover:text-emerald-950">Sign up</a></p>
        </form>
    </div>
@endsection
