<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'StokRapi · Inventory Management')</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet">
    <script>
        document.documentElement.dataset.theme = localStorage.getItem('stokrapi-theme') || 'light';
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-stone-50 font-sans text-stone-900 antialiased">
    <header class="border-b border-stone-200 bg-white">
        <div
            class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-x-8 gap-y-4 px-4 py-4 sm:px-6 lg:px-8">
            <a href="{{ Auth::check() ? '/dashboard' : route('login') }}" class="flex shrink-0 items-center gap-3"
                aria-label="StokRapi, dashboard">
                <span
                    class="grid size-10 place-items-center rounded-lg bg-emerald-700 text-sm font-bold text-white">SR</span>
                <span>
                    <span class="block text-base font-semibold leading-tight">StokRapi</span>
                    <span class="mt-1 block text-xs text-stone-500">Inventory management</span>
                </span>
            </a>

            @auth
                <nav aria-label="Main navigation" class="order-3 flex w-full flex-wrap gap-1 sm:order-2 sm:w-auto">
                    <a href="/dashboard" @class([
                        'rounded-md px-3 py-2 text-sm font-medium transition',
                        'bg-emerald-50 text-emerald-800' => request()->is('dashboard'),
                        'text-stone-600 hover:bg-stone-100 hover:text-stone-900' => !request()->is(
                            'dashboard'),
                    ])>Overview</a>
                    <a href="/products" @class([
                        'rounded-md px-3 py-2 text-sm font-medium transition',
                        'bg-emerald-50 text-emerald-800' => request()->is('products*'),
                        'text-stone-600 hover:bg-stone-100 hover:text-stone-900' => !request()->is(
                            'products*'),
                    ])>Products</a>
                    <a href="/categories" @class([
                        'rounded-md px-3 py-2 text-sm font-medium transition',
                        'bg-emerald-50 text-emerald-800' => request()->is('categories*'),
                        'text-stone-600 hover:bg-stone-100 hover:text-stone-900' => !request()->is(
                            'categories*'),
                    ])>Categories</a>
                    <a href="/suppliers" @class([
                        'rounded-md px-3 py-2 text-sm font-medium transition',
                        'bg-emerald-50 text-emerald-800' => request()->is('suppliers*'),
                        'text-stone-600 hover:bg-stone-100 hover:text-stone-900' => !request()->is(
                            'suppliers*'),
                    ])>Suppliers</a>
                    <a href="/stock-movements" @class([
                        'rounded-md px-3 py-2 text-sm font-medium transition',
                        'bg-emerald-50 text-emerald-800' => request()->is('stock-movements*'),
                        'text-stone-600 hover:bg-stone-100 hover:text-stone-900' => !request()->is(
                            'stock-movements*'),
                    ])>Stock movements</a>
                </nav>
            @endauth

            <div class="order-2 flex items-center gap-3 sm:order-3">
                <div class="inline-flex rounded-md border border-stone-300 bg-stone-50 p-1" role="group"
                    aria-label="Color theme">
                    <button type="button" data-theme-choice="light" aria-pressed="true"
                        class="theme-choice rounded px-2.5 py-1.5 text-xs font-semibold transition sm:px-3">Light</button>
                    <button type="button" data-theme-choice="dark" aria-pressed="false"
                        class="theme-choice rounded px-2.5 py-1.5 text-xs font-semibold transition sm:px-3">Dark</button>
                </div>
                @auth
                    <div class="hidden text-right sm:block">
                        <p class="text-sm font-medium">{{ Auth::user()->name }}</p>
                        <p class="text-xs capitalize text-stone-500">{{ Auth::user()->role }}</p>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="rounded-md border border-stone-300 px-3 py-2 text-sm font-medium text-stone-700 transition hover:border-rose-300 hover:bg-rose-50 hover:text-rose-700">Log
                            out</button>
                    </form>
                </div>
            @endauth
        </div>
    </header>

    <main class="mx-auto w-full max-w-7xl px-4 py-8 sm:px-6 sm:py-10 lg:px-8">
        @yield('content')
    </main>
</body>

</html>
