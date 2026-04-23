<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(Request $request): JsonResponse|View
    {
        $books = Book::query()
            ->orderByDesc('id')
            ->paginate(15);

        if ($this->wantsApiResponse($request)) {
            return BookResource::collection($books)->response();
        }

        return view('books.index', ['books' => $books]);
    }

    public function create(): View
    {
        return view('books.create');
    }

    public function store(StoreBookRequest $request): JsonResponse|RedirectResponse
    {
        $book = Book::query()->create($request->validated());

        if ($this->wantsApiResponse($request)) {
            return (new BookResource($book))
                ->response()
                ->setStatusCode(201);
        }

        return redirect()
            ->route('home')
            ->with('status', 'Book created');
    }

    public function show(Request $request, Book $book): JsonResponse|View
    {
        if ($this->wantsApiResponse($request)) {
            return (new BookResource($book))->response();
        }

        return view('books.show', ['book' => $book]);
    }

    public function edit(Book $book): View
    {
        return view('books.edit', ['book' => $book]);
    }

    public function update(UpdateBookRequest $request, Book $book): JsonResponse|RedirectResponse
    {
        $book->update($request->validated());

        if ($this->wantsApiResponse($request)) {
            return (new BookResource($book->fresh()))->response();
        }

        return redirect()
            ->route('books.show', $book)
            ->with('status', 'Book updated');
    }

    public function destroy(Request $request, Book $book): JsonResponse|RedirectResponse|Response
    {
        $book->delete();

        if ($this->wantsApiResponse($request)) {
            return response()->noContent();
        }

        return redirect()
            ->route('home')
            ->with('status', 'Book deleted');
    }

    private function wantsApiResponse(Request $request): bool
    {
        return $request->expectsJson() || $request->is('api/*');
    }
}
