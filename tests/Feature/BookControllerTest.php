<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return array<string, mixed>
     */
    private function validBookAttributes(): array
    {
        return [
            'title' => 'Test Book',
            'publisher' => 'Test Publisher',
            'author' => 'Test Author',
            'genre' => 'Fiction',
            'publication_date' => '2020-01-15',
            'word_count' => 1000,
            'price_usd' => '19.99',
        ];
    }

    public function test_web_index_returns_ok(): void
    {
        $this->get(route('books.index'))->assertOk();
    }

    public function test_api_index_returns_json_collection(): void
    {
        Book::query()->create($this->validBookAttributes());

        $response = $this->getJson('/api/books');

        $response->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'title',
                        'publisher',
                        'author',
                        'genre',
                        'publication_date',
                        'word_count',
                        'price_usd',
                    ],
                ],
                'links',
                'meta',
            ]);
    }

    public function test_api_store_validation_error(): void
    {
        $this->postJson('/api/books', [])
            ->assertUnprocessable();
    }

    public function test_api_store_creates_book(): void
    {
        $response = $this->postJson('/api/books', $this->validBookAttributes());

        $response->assertCreated()
            ->assertJsonPath('data.title', 'Test Book');

        $this->assertDatabaseCount('books', 1);
    }

    public function test_api_destroy_returns_no_content(): void
    {
        $book = Book::query()->create($this->validBookAttributes());

        $this->deleteJson('/api/books/'.$book->id)
            ->assertNoContent();

        $this->assertDatabaseCount('books', 0);
    }
}
