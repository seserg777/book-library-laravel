<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Book>
 */
class BookFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => rtrim(fake()->realText(50), '.'),
            'publisher' => fake()->company(),
            'author' => fake()->name(),
            'genre' => fake()->randomElement([
                'Fiction', 'Science Fiction', 'Fantasy', 'Mystery', 'Biography',
                'History', 'Romance', 'Horror', 'Non-fiction', 'Poetry',
            ]),
            'publication_date' => fake()->dateTimeBetween('-50 years', 'now'),
            'word_count' => fake()->numberBetween(5_000, 250_000),
            'price_usd' => fake()->randomFloat(2, 0.99, 99.99),
        ];
    }
}
