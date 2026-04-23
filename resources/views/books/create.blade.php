@extends('layouts.books')

@section('title', 'Add book')

@section('content')
    <h1 class="text-2xl font-semibold mb-4">Add book</h1>
    <form method="post" action="{{ route('books.store') }}" class="space-y-4 max-w-md">
        @csrf
        @include('books._form', ['book' => null, 'button' => 'Create'])
    </form>
@endsection
