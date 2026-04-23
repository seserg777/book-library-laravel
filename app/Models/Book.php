<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'title',
    'publisher',
    'author',
    'genre',
    'publication_date',
    'word_count',
    'price_usd',
])]
class Book extends Model
{
    use HasFactory;

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'publication_date' => 'date',
            'word_count' => 'integer',
            'price_usd' => 'decimal:2',
        ];
    }
}
