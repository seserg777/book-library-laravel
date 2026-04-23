@extends('layouts.books')

@section('title', $book->title)

@section('content')
    <article>
        <h1 class="text-2xl font-semibold mb-2">{{ $book->title }}</h1>
        <dl class="text-sm space-y-1 text-gray-800">
            <div><dt class="inline text-gray-600">Author</dt> <dd class="inline">{{ $book->author }}</dd></div>
            <div><dt class="inline text-gray-600">Publisher</dt> <dd class="inline">{{ $book->publisher }}</dd></div>
            <div><dt class="inline text-gray-600">Genre</dt> <dd class="inline">{{ $book->genre }}</dd></div>
            <div><dt class="inline text-gray-600">Publication</dt> <dd class="inline">{{ $book->publication_date?->format('Y-m-d') }}</dd></div>
            <div><dt class="inline text-gray-600">Words</dt> <dd class="inline">{{ $book->word_count }}</dd></div>
            <div><dt class="inline text-gray-600">Price (USD)</dt> <dd class="inline">{{ $book->price_usd }}</dd></div>
        </dl>
        <p class="mt-6">
            <a href="{{ route('books.edit', $book) }}" class="text-blue-800 underline">Edit</a>
            <span class="text-gray-400 mx-2">|</span>
            <a href="{{ route('home') }}" class="text-gray-600 hover:underline">Back to list</a>
        </p>
    </article>
@endsection
