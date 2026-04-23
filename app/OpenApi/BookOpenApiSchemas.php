<?php

declare(strict_types=1);

namespace App\OpenApi;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'Book',
    type: 'object',
    required: ['id', 'title', 'publisher', 'author', 'genre', 'publication_date', 'word_count', 'price_usd', 'created_at', 'updated_at'],
    properties: [
        new OA\Property(property: 'id', type: 'integer', example: 1),
        new OA\Property(property: 'title', type: 'string'),
        new OA\Property(property: 'publisher', type: 'string'),
        new OA\Property(property: 'author', type: 'string'),
        new OA\Property(property: 'genre', type: 'string'),
        new OA\Property(property: 'publication_date', type: 'string', format: 'date', example: '2020-01-15'),
        new OA\Property(property: 'word_count', type: 'integer', example: 1000),
        new OA\Property(property: 'price_usd', type: 'string', example: '19.99'),
        new OA\Property(property: 'created_at', type: 'string', format: 'date-time', nullable: true),
        new OA\Property(property: 'updated_at', type: 'string', format: 'date-time', nullable: true),
    ],
)]
final class BookSchema {}

#[OA\Schema(
    schema: 'EmptyBookData',
    type: 'object',
    properties: [
        new OA\Property(property: 'id', type: 'integer', nullable: true, example: null),
        new OA\Property(property: 'title', type: 'string', nullable: true),
        new OA\Property(property: 'publisher', type: 'string', nullable: true),
        new OA\Property(property: 'author', type: 'string', nullable: true),
        new OA\Property(property: 'genre', type: 'string', nullable: true),
        new OA\Property(property: 'publication_date', type: 'string', format: 'date', nullable: true),
        new OA\Property(property: 'word_count', type: 'integer', nullable: true),
        new OA\Property(property: 'price_usd', type: 'string', nullable: true),
        new OA\Property(property: 'created_at', type: 'string', format: 'date-time', nullable: true),
        new OA\Property(property: 'updated_at', type: 'string', format: 'date-time', nullable: true),
    ],
)]
final class EmptyBookDataSchema {}

#[OA\Schema(
    schema: 'SingleBookResponse',
    type: 'object',
    required: ['data'],
    properties: [
        new OA\Property(property: 'data', ref: '#/components/schemas/Book'),
    ],
)]
final class SingleBookResponseSchema {}

#[OA\Schema(
    schema: 'NewBookFormResponse',
    type: 'object',
    required: ['data'],
    properties: [
        new OA\Property(property: 'data', ref: '#/components/schemas/EmptyBookData'),
    ],
)]
final class NewBookFormResponseSchema {}

#[OA\Schema(
    schema: 'BookCreateRequest',
    type: 'object',
    required: ['title', 'publisher', 'author', 'genre', 'publication_date', 'word_count', 'price_usd'],
    properties: [
        new OA\Property(property: 'title', type: 'string', maxLength: 255),
        new OA\Property(property: 'publisher', type: 'string', maxLength: 255),
        new OA\Property(property: 'author', type: 'string', maxLength: 255),
        new OA\Property(property: 'genre', type: 'string', maxLength: 255),
        new OA\Property(property: 'publication_date', type: 'string', format: 'date', example: '2020-01-15'),
        new OA\Property(property: 'word_count', type: 'integer', minimum: 0),
        new OA\Property(property: 'price_usd', type: 'string', example: '19.99', description: 'Non-negative number as string'),
    ],
)]
final class BookCreateRequestSchema {}

#[OA\Schema(
    schema: 'BookUpdateRequest',
    type: 'object',
    properties: [
        new OA\Property(property: 'title', type: 'string', maxLength: 255),
        new OA\Property(property: 'publisher', type: 'string', maxLength: 255),
        new OA\Property(property: 'author', type: 'string', maxLength: 255),
        new OA\Property(property: 'genre', type: 'string', maxLength: 255),
        new OA\Property(property: 'publication_date', type: 'string', format: 'date'),
        new OA\Property(property: 'word_count', type: 'integer', minimum: 0),
        new OA\Property(property: 'price_usd', type: 'string'),
    ],
)]
final class BookUpdateRequestSchema {}

#[OA\Schema(
    schema: 'PaginationLinks',
    type: 'object',
    properties: [
        new OA\Property(property: 'first', type: 'string', nullable: true),
        new OA\Property(property: 'last', type: 'string', nullable: true),
        new OA\Property(property: 'prev', type: 'string', nullable: true),
        new OA\Property(property: 'next', type: 'string', nullable: true),
    ],
)]
final class PaginationLinksSchema {}

#[OA\Schema(
    schema: 'PaginationMeta',
    type: 'object',
    properties: [
        new OA\Property(property: 'current_page', type: 'integer'),
        new OA\Property(property: 'from', type: 'integer', nullable: true),
        new OA\Property(property: 'last_page', type: 'integer'),
        new OA\Property(property: 'path', type: 'string'),
        new OA\Property(property: 'per_page', type: 'integer'),
        new OA\Property(property: 'to', type: 'integer', nullable: true),
        new OA\Property(property: 'total', type: 'integer'),
    ],
)]
final class PaginationMetaSchema {}

#[OA\Schema(
    schema: 'PaginatedBookCollection',
    type: 'object',
    required: ['data', 'links', 'meta'],
    properties: [
        new OA\Property(
            property: 'data',
            type: 'array',
            items: new OA\Items(ref: '#/components/schemas/Book'),
        ),
        new OA\Property(property: 'links', ref: '#/components/schemas/PaginationLinks'),
        new OA\Property(property: 'meta', ref: '#/components/schemas/PaginationMeta'),
    ],
)]
final class PaginatedBookCollectionSchema {}
