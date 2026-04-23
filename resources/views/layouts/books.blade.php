<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Books')</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-[#FDFDFC] text-[#1b1b18] min-h-screen p-6">
    <div class="max-w-3xl mx-auto">
        <header class="mb-8 flex items-center justify-between flex-wrap gap-2">
            <a href="{{ route('home') }}" class="text-lg font-semibold text-gray-800">Books</a>
            <nav class="flex gap-4 text-sm">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-900">List</a>
                <a href="{{ route('books.create') }}" class="text-gray-600 hover:text-gray-900">New</a>
            </nav>
        </header>

        @if (session('status'))
            <p class="mb-4 p-3 rounded-md bg-gray-100 text-sm text-gray-800 border border-gray-200" role="status">{{ session('status') }}</p>
        @endif

        @if ($errors->any())
            <ul class="mb-4 p-3 rounded-md bg-red-50 text-sm text-red-800 border border-red-200" role="alert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
