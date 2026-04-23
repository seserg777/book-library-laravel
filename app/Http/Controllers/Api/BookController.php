<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use OpenApi\Attributes as OA;

#[OA\Tag(name: 'Books')]
class BookController extends Controller
{
    #[OA\Get(
        path: '/books',
        operationId: 'apiBooksIndex',
        summary: 'List books',
        tags: ['Books'],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Paginated list',
                content: new OA\JsonContent(ref: '#/components/schemas/PaginatedBookCollection'),
            ),
        ],
    )]
    public function index(): JsonResponse
    {
        $books = Book::query()
            ->orderByDesc('id')
            ->paginate(15);

        return BookResource::collection($books)->response();
    }

    #[OA\Get(
        path: '/books/create',
        operationId: 'apiBooksCreateForm',
        summary: 'Get empty book payload (create form)',
        tags: ['Books'],
        responses: [
            new OA\Response(
                response: 200,
                description: 'Empty book data',
                content: new OA\JsonContent(ref: '#/components/schemas/NewBookFormResponse'),
            ),
        ],
    )]
    public function create(): JsonResponse
    {
        return (new BookResource(new Book))->response();
    }

    #[OA\Post(
        path: '/books',
        operationId: 'apiBooksStore',
        summary: 'Create a book',
        tags: ['Books'],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(ref: '#/components/schemas/BookCreateRequest'),
        ),
        responses: [
            new OA\Response(
                response: 201,
                description: 'Created',
                content: new OA\JsonContent(ref: '#/components/schemas/SingleBookResponse'),
            ),
            new OA\Response(
                response: 422,
                description: 'Validation error (Laravel message + errors object)',
            ),
        ],
    )]
    public function store(StoreBookRequest $request): JsonResponse
    {
        $book = Book::query()->create($request->validated());

        return (new BookResource($book))
            ->response()
            ->setStatusCode(201);
    }

    #[OA\Get(
        path: '/books/{book}',
        operationId: 'apiBooksShow',
        summary: 'Get a book',
        tags: ['Books'],
        parameters: [
            new OA\Parameter(
                name: 'book',
                in: 'path',
                required: true,
                schema: new OA\Schema(type: 'integer'),
            ),
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'OK',
                content: new OA\JsonContent(ref: '#/components/schemas/SingleBookResponse'),
            ),
            new OA\Response(
                response: 404,
                description: 'Not found',
            ),
        ],
    )]
    public function show(Book $book): JsonResponse
    {
        return (new BookResource($book))->response();
    }

    #[OA\Get(
        path: '/books/{book}/edit',
        operationId: 'apiBooksEditForm',
        summary: 'Get book for edit (same shape as show)',
        tags: ['Books'],
        parameters: [
            new OA\Parameter(
                name: 'book',
                in: 'path',
                required: true,
                schema: new OA\Schema(type: 'integer'),
            ),
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: 'OK',
                content: new OA\JsonContent(ref: '#/components/schemas/SingleBookResponse'),
            ),
            new OA\Response(
                response: 404,
                description: 'Not found',
            ),
        ],
    )]
    public function edit(Book $book): JsonResponse
    {
        return (new BookResource($book))->response();
    }

    #[OA\Put(
        path: '/books/{book}',
        operationId: 'apiBooksUpdatePut',
        summary: 'Update a book (full)',
        tags: ['Books'],
        parameters: [
            new OA\Parameter(
                name: 'book',
                in: 'path',
                required: true,
                schema: new OA\Schema(type: 'integer'),
            ),
        ],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(ref: '#/components/schemas/BookUpdateRequest'),
        ),
        responses: [
            new OA\Response(
                response: 200,
                description: 'OK',
                content: new OA\JsonContent(ref: '#/components/schemas/SingleBookResponse'),
            ),
            new OA\Response(
                response: 404,
                description: 'Not found',
            ),
            new OA\Response(
                response: 422,
                description: 'Validation error (Laravel message + errors object)',
            ),
        ],
    )]
    #[OA\Patch(
        path: '/books/{book}',
        operationId: 'apiBooksUpdatePatch',
        summary: 'Update a book (partial)',
        tags: ['Books'],
        parameters: [
            new OA\Parameter(
                name: 'book',
                in: 'path',
                required: true,
                schema: new OA\Schema(type: 'integer'),
            ),
        ],
        requestBody: new OA\RequestBody(
            content: new OA\JsonContent(ref: '#/components/schemas/BookUpdateRequest'),
        ),
        responses: [
            new OA\Response(
                response: 200,
                description: 'OK',
                content: new OA\JsonContent(ref: '#/components/schemas/SingleBookResponse'),
            ),
            new OA\Response(
                response: 404,
                description: 'Not found',
            ),
            new OA\Response(
                response: 422,
                description: 'Validation error (Laravel message + errors object)',
            ),
        ],
    )]
    public function update(UpdateBookRequest $request, Book $book): JsonResponse
    {
        $book->update($request->validated());

        return (new BookResource($book->fresh()))->response();
    }

    #[OA\Delete(
        path: '/books/{book}',
        operationId: 'apiBooksDestroy',
        summary: 'Delete a book',
        tags: ['Books'],
        parameters: [
            new OA\Parameter(
                name: 'book',
                in: 'path',
                required: true,
                schema: new OA\Schema(type: 'integer'),
            ),
        ],
        responses: [
            new OA\Response(
                response: 204,
                description: 'No content',
            ),
            new OA\Response(
                response: 404,
                description: 'Not found',
            ),
        ],
    )]
    public function destroy(Book $book): Response
    {
        $book->delete();

        return response()->noContent();
    }
}
