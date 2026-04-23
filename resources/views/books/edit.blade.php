@extends('layouts.books')

@section('title', 'Edit ' . $book->title)

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Edit book</h1>
    <form method="post" action="{{ route('books.update', $book) }}" class="space-y-4 max-w-md">
        @csrf
        @method('PATCH')
        @include('books._form', ['book' => $book, 'button' => 'Update'])
    </form>
    <form method="post" action="{{ route('books.destroy', $book) }}" class="mt-6" onsubmit="return confirm('Delete this book?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-sm text-red-700 hover:underline">Delete book</button>
    </form>
@endsection
