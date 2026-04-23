@extends('layouts.books')

@section('title', 'All books')

@section('tailadmin_heading', 'All books')

@section('content')
    <div class="mb-5 flex flex-wrap items-center justify-end gap-3">
        <a
            href="{{ route('books.create') }}"
            class="shadow-theme-xs inline-flex items-center gap-2 rounded-lg bg-brand-500 px-4 py-3 text-sm font-medium text-white transition hover:bg-brand-600"
        >
            Add book
        </a>
    </div>

    <div
        class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]"
    >
        <div class="px-5 py-4 sm:px-6 sm:py-5">
            <h3 class="text-base font-medium text-gray-800 dark:text-white/90">Books</h3>
        </div>
        <div class="border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
            @if ($books->isEmpty())
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    No books yet.
                    <a href="{{ route('books.create') }}" class="font-medium text-brand-500 hover:text-brand-600">Add one</a>.
                </p>
            @else
                <div
                    class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]"
                >
                    <div class="max-w-full overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr class="border-b border-gray-100 dark:border-gray-800">
                                    <th class="px-5 py-3 sm:px-6">
                                        <p class="text-theme-xs font-medium text-gray-500 dark:text-gray-400">Title</p>
                                    </th>
                                    <th class="px-5 py-3 sm:px-6">
                                        <p class="text-theme-xs font-medium text-gray-500 dark:text-gray-400">Author</p>
                                    </th>
                                    <th class="px-5 py-3 sm:px-6">
                                        <p class="text-theme-xs font-medium text-gray-500 dark:text-gray-400">Genre</p>
                                    </th>
                                    <th class="px-5 py-3 sm:px-6">
                                        <p class="text-theme-xs font-medium text-gray-500 dark:text-gray-400">Published</p>
                                    </th>
                                    <th class="px-5 py-3 sm:px-6">
                                        <p class="text-theme-xs font-medium text-gray-500 dark:text-gray-400">Price</p>
                                    </th>
                                    <th class="px-5 py-3 sm:px-6">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                                @foreach ($books as $book)
                                    <tr>
                                        <td class="px-5 py-4 sm:px-6">
                                            <a
                                                href="{{ route('books.show', $book) }}"
                                                class="text-theme-sm font-medium text-gray-800 hover:text-brand-600 dark:text-white/90"
                                            >
                                                {{ $book->title }}
                                            </a>
                                        </td>
                                        <td class="px-5 py-4 sm:px-6">
                                            <p class="text-theme-sm text-gray-500 dark:text-gray-400">{{ $book->author }}</p>
                                        </td>
                                        <td class="px-5 py-4 sm:px-6">
                                            <p class="text-theme-sm text-gray-500 dark:text-gray-400">{{ $book->genre }}</p>
                                        </td>
                                        <td class="px-5 py-4 sm:px-6">
                                            <p class="text-theme-sm text-gray-500 dark:text-gray-400">
                                                {{ $book->publication_date?->format('Y-m-d') }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-4 sm:px-6">
                                            <p class="text-theme-sm text-gray-500 dark:text-gray-400">{{ $book->price_usd }}</p>
                                        </td>
                                        <td class="px-5 py-4 sm:px-6">
                                            <a
                                                href="{{ route('books.edit', $book) }}"
                                                class="text-theme-sm inline-flex items-center gap-1.5 font-normal text-brand-500 hover:text-brand-600"
                                                aria-label="Edit book {{ $book->title }}"
                                            >
                                                <svg
                                                    class="h-3.5 w-3.5 shrink-0"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    aria-hidden="true"
                                                >
                                                    <path
                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                                                        stroke="currentColor"
                                                        stroke-width="1.5"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    />
                                                </svg>
                                                <span>Edit</span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-5">{{ $books->links() }}</div>
            @endif
        </div>
    </div>
@endsection
