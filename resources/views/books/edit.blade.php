@extends('layouts.books')

@section('title', 'Edit ' . $book->title)

@section('tailadmin_heading', 'Edit book')

@section('content')
    <div
        class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]"
    >
        <div class="px-5 py-4 sm:px-6 sm:py-5">
            <h3 class="text-base font-medium text-gray-800 dark:text-white/90">{{ $book->title }}</h3>
        </div>
        <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
            <form method="post" action="{{ route('books.update', $book) }}" class="max-w-xl space-y-6">
                @csrf
                @method('PATCH')
                @include('books._form', ['book' => $book, 'button' => 'Update'])
            </form>
            <form
                method="post"
                action="{{ route('books.destroy', $book) }}"
                class="border-t border-gray-100 pt-6 dark:border-gray-800"
                onsubmit="return confirm('Delete this book?');"
            >
                @csrf
                @method('DELETE')
                <button
                    type="submit"
                    class="text-theme-sm font-medium text-error-600 hover:text-error-700 dark:text-error-500 dark:hover:text-error-400"
                >
                    Delete book
                </button>
            </form>
        </div>
    </div>
@endsection
