<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Books') — Book Library</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    @stack('head')
</head>
<body>
    @php
        $booksIndexActive = request()->routeIs('home', 'books.show', 'books.edit');
        $booksCreateActive = request()->routeIs('books.create');
    @endphp
    <div class="flex h-screen overflow-hidden">
        @include('layouts.partials.tailadmin-sidebar')

        <div class="relative flex flex-1 flex-col overflow-x-hidden overflow-y-auto">
            <header
                class="sticky top-0 z-99999 flex w-full border-b border-gray-200 bg-white lg:hidden"
            >
                <div class="flex w-full items-center px-3 py-3">
                    <nav
                        aria-label="Primary"
                        class="flex min-w-0 flex-1 flex-wrap items-center gap-x-4 gap-y-1 text-sm"
                    >
                        <a
                            href="{{ route('home') }}"
                            class="{{ $booksIndexActive ? 'font-semibold text-gray-900' : 'text-gray-600 hover:text-gray-900' }}"
                        >
                            All books
                        </a>
                        <a
                            href="{{ route('books.create') }}"
                            class="{{ $booksCreateActive ? 'font-semibold text-gray-900' : 'text-gray-600 hover:text-gray-900' }}"
                        >
                            Add book
                        </a>
                    </nav>
                </div>
            </header>

            <main>
                <div class="mx-auto max-w-(--breakpoint-2xl) p-4 md:p-6">
                    @hasSection('tailadmin_heading')
                        <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
                            <h2 class="text-xl font-semibold text-gray-800">
                                @yield('tailadmin_heading')
                            </h2>
                        </div>
                    @endif

                    @if (session('status'))
                        <div
                            class="mb-5 rounded-xl border border-success-500 bg-success-50 p-4"
                            role="status"
                        >
                            <div class="flex items-start gap-3">
                                <div class="-mt-0.5 text-success-500">
                                    <svg
                                        class="fill-current"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M3.70186 12.0001C3.70186 7.41711 7.41711 3.70186 12.0001 3.70186C16.5831 3.70186 20.2984 7.41711 20.2984 12.0001C20.2984 16.5831 16.5831 20.2984 12.0001 20.2984C7.41711 20.2984 3.70186 16.5831 3.70186 12.0001ZM12.0001 1.90186C6.423 1.90186 1.90186 6.423 1.90186 12.0001C1.90186 17.5772 6.423 22.0984 12.0001 22.0984C17.5772 22.0984 22.0984 17.5772 22.0984 12.0001C22.0984 6.423 17.5772 1.90186 12.0001 1.90186ZM15.6197 10.7395C15.9712 10.388 15.9712 9.81819 15.6197 9.46672C15.2683 9.11525 14.6984 9.11525 14.347 9.46672L11.1894 12.6243L9.6533 11.0883C9.30183 10.7368 8.73198 10.7368 8.38051 11.0883C8.02904 11.4397 8.02904 12.0096 8.38051 12.3611L10.553 14.5335C10.7217 14.7023 10.9507 14.7971 11.1894 14.7971C11.428 14.7971 11.657 14.7023 11.8257 14.5335L15.6197 10.7395Z"
                                            fill=""
                                        />
                                    </svg>
                                </div>
                                <p class="text-sm text-gray-700">{{ session('status') }}</p>
                            </div>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div
                            class="mb-5 rounded-xl border border-error-300 bg-error-50 p-4"
                            role="alert"
                        >
                            <ul class="list-inside list-disc space-y-1 text-sm text-error-700">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>
</html>
