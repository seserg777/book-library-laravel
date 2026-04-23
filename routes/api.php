<?php

use App\Http\Controllers\Api\BookController;
use Illuminate\Support\Facades\Route;

Route::resource('books', BookController::class)
    ->names([
        'index' => 'api.books.index',
        'create' => 'api.books.create',
        'store' => 'api.books.store',
        'show' => 'api.books.show',
        'edit' => 'api.books.edit',
        'update' => 'api.books.update',
        'destroy' => 'api.books.destroy',
    ]);
