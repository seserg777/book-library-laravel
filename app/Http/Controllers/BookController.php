<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BookController extends Controller
{
    // Paginate books, render list view.
    public function index(): View
    {
        $books = Book::query()
            ->orderByDesc('id')
            ->paginate(15);

        return view('books.index', ['books' => $books]);
    }

    // Show empty create form.
    public function create(): View
    {
        return view('books.create');
    }

    // Persist new book, redirect home with flash.
    public function store(StoreBookRequest $request): RedirectResponse
    {
        Book::query()->create($request->validated());

        return redirect()
            ->route('home')
            ->with('status', 'Book created');
    }

    // Render book detail view.
    public function show(Book $book): View
    {
        return view('books.show', ['book' => $book]);
    }

    // Show edit form for one book.
    public function edit(Book $book): View
    {
        return view('books.edit', ['book' => $book]);
    }

    // Update book, redirect to show with flash.
    public function update(UpdateBookRequest $request, Book $book): RedirectResponse
    {
        $book->update($request->validated());

        return redirect()
            ->route('books.show', $book)
            ->with('status', 'Book updated');
    }

    // Delete book, redirect home with flash.
    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();

        return redirect()
            ->route('home')
            ->with('status', 'Book deleted');
    }
}
