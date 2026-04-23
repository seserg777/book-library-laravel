<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    // No authorization yet.
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    // Required fields for new books.
    public function rules(): array
    {
        return self::bookRules();
    }

    /**
     * @return array<string, mixed>
     */
    // Shared field rules (create and patch).
    public static function bookRules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'publisher' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'genre' => ['required', 'string', 'max:255'],
            'publication_date' => ['required', 'date'],
            'word_count' => ['required', 'integer', 'min:0'],
            'price_usd' => ['required', 'numeric', 'min:0'],
        ];
    }
}
