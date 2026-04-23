@extends('layouts.books')

@section('title', $book->title)

@section('tailadmin_heading', $book->title)

@section('content')
    <div
        class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]"
    >
        <div class="flex flex-wrap items-start justify-between gap-4 px-5 py-4 sm:px-6 sm:py-5">
            <div>
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">{{ $book->title }}</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $book->author }}</p>
            </div>
            <a
                href="{{ route('books.edit', $book) }}"
                class="shadow-theme-xs inline-flex items-center gap-2 rounded-lg border border-gray-200 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:hover:bg-white/5"
            >
                Edit
            </a>
        </div>
        <div class="border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
            <dl class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <div class="rounded-xl border border-gray-100 bg-gray-50 px-4 py-3 dark:border-gray-800 dark:bg-white/[0.03]">
                    <dt class="text-theme-xs font-medium text-gray-500 uppercase dark:text-gray-400">Publisher</dt>
                    <dd class="mt-1 text-sm text-gray-800 dark:text-white/90">{{ $book->publisher }}</dd>
                </div>
                <div class="rounded-xl border border-gray-100 bg-gray-50 px-4 py-3 dark:border-gray-800 dark:bg-white/[0.03]">
                    <dt class="text-theme-xs font-medium text-gray-500 uppercase dark:text-gray-400">Genre</dt>
                    <dd class="mt-1 text-sm text-gray-800 dark:text-white/90">{{ $book->genre }}</dd>
                </div>
                <div class="rounded-xl border border-gray-100 bg-gray-50 px-4 py-3 dark:border-gray-800 dark:bg-white/[0.03]">
                    <dt class="text-theme-xs font-medium text-gray-500 uppercase dark:text-gray-400">Publication</dt>
                    <dd class="mt-1 text-sm text-gray-800 dark:text-white/90">{{ $book->publication_date?->format('Y-m-d') }}</dd>
                </div>
                <div class="rounded-xl border border-gray-100 bg-gray-50 px-4 py-3 dark:border-gray-800 dark:bg-white/[0.03]">
                    <dt class="text-theme-xs font-medium text-gray-500 uppercase dark:text-gray-400">Word count</dt>
                    <dd class="mt-1 text-sm text-gray-800 dark:text-white/90">{{ $book->word_count }}</dd>
                </div>
                <div class="rounded-xl border border-gray-100 bg-gray-50 px-4 py-3 dark:border-gray-800 dark:bg-white/[0.03] sm:col-span-2">
                    <dt class="text-theme-xs font-medium text-gray-500 uppercase dark:text-gray-400">Price (USD)</dt>
                    <dd class="mt-1 text-sm text-gray-800 dark:text-white/90">{{ $book->price_usd }}</dd>
                </div>
            </dl>
            <p class="mt-6">
                <a href="{{ route('home') }}" class="text-sm font-medium text-brand-500 hover:text-brand-600">
                    Back to list
                </a>
            </p>
        </div>
    </div>
@endsection
