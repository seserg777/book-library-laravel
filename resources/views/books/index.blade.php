@extends('layouts.books')

@section('title', 'All books')

@section('content')
    <div class="flex flex-wrap items-center justify-between gap-4 mb-4">
        <h1 class="text-2xl font-semibold">All books</h1>
        <a href="{{ route('books.create') }}" class="inline-block px-4 py-2 rounded-md bg-gray-900 text-white text-sm hover:bg-gray-800">Create book</a>
    </div>
    <ul class="space-y-2">
        @forelse ($books as $book)
            <li class="border border-gray-200 rounded-md p-3 flex flex-wrap items-center justify-between gap-2">
                <a href="{{ route('books.show', $book) }}" class="text-blue-800 hover:underline font-medium">{{ $book->title }}</a>
                <span class="text-sm text-gray-600">{{ $book->author }}</span>
            </li>
        @empty
            <li class="text-gray-500">No books yet. <a href="{{ route('books.create') }}" class="text-blue-800 underline">Add one</a>.</li>
        @endforelse
    </ul>
    <div class="mt-4">{{ $books->links() }}</div>
@endsection
