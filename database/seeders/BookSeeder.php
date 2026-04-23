<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    private const int COUNT = 25;

    public function run(): void
    {
        Book::factory()->count(self::COUNT)->create();
    }
}
