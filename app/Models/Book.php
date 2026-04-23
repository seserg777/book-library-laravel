<?php

namespace App\Models;

use Database\Factories\BookFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property Carbon|null $publication_date
 * @property int $id
 * @property string $title
 * @property string $publisher
 * @property string $author
 * @property string $genre
 * @property int $word_count
 * @property numeric $price_usd
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static \Database\Factories\BookFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereGenre($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book wherePriceUsd($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book wherePublicationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book wherePublisher($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Book whereWordCount($value)
 * @mixin \Eloquent
 */
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
    /**
     * @use HasFactory<BookFactory>
     */
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
