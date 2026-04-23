@php
    $b = $book;
    $inputClass =
        'shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30';
@endphp
<div>
    <label for="title" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Title</label>
    <input
        type="text"
        name="title"
        id="title"
        value="{{ old('title', $b?->title) }}"
        required
        @class([
            $inputClass,
            'border-gray-300' => !$errors->has('title'),
            'border-error-500 ring-3 ring-error-500/10' => $errors->has('title'),
        ])
    />
</div>
<div>
    <label for="publisher" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Publisher</label>
    <input
        type="text"
        name="publisher"
        id="publisher"
        value="{{ old('publisher', $b?->publisher) }}"
        required
        @class([
            $inputClass,
            'border-gray-300' => !$errors->has('publisher'),
            'border-error-500 ring-3 ring-error-500/10' => $errors->has('publisher'),
        ])
    />
</div>
<div>
    <label for="author" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Author</label>
    <input
        type="text"
        name="author"
        id="author"
        value="{{ old('author', $b?->author) }}"
        required
        @class([
            $inputClass,
            'border-gray-300' => !$errors->has('author'),
            'border-error-500 ring-3 ring-error-500/10' => $errors->has('author'),
        ])
    />
</div>
<div>
    <label for="genre" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Genre</label>
    <input
        type="text"
        name="genre"
        id="genre"
        value="{{ old('genre', $b?->genre) }}"
        required
        @class([
            $inputClass,
            'border-gray-300' => !$errors->has('genre'),
            'border-error-500 ring-3 ring-error-500/10' => $errors->has('genre'),
        ])
    />
</div>
<div>
    <label for="publication_date" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Publication date</label>
    <input
        type="date"
        name="publication_date"
        id="publication_date"
        value="{{ old('publication_date', $b?->publication_date?->format('Y-m-d')) }}"
        required
        @class([
            $inputClass,
            'border-gray-300' => !$errors->has('publication_date'),
            'border-error-500 ring-3 ring-error-500/10' => $errors->has('publication_date'),
        ])
    />
</div>
<div>
    <label for="word_count" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Word count</label>
    <input
        type="number"
        name="word_count"
        id="word_count"
        value="{{ old('word_count', $b?->word_count) }}"
        min="0"
        required
        @class([
            $inputClass,
            'border-gray-300' => !$errors->has('word_count'),
            'border-error-500 ring-3 ring-error-500/10' => $errors->has('word_count'),
        ])
    />
</div>
<div>
    <label for="price_usd" class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Price (USD)</label>
    <input
        type="text"
        inputmode="decimal"
        name="price_usd"
        id="price_usd"
        value="{{ old('price_usd', $b?->price_usd) }}"
        required
        @class([
            $inputClass,
            'border-gray-300' => !$errors->has('price_usd'),
            'border-error-500 ring-3 ring-error-500/10' => $errors->has('price_usd'),
        ])
    />
</div>
<div>
    <button
        type="submit"
        class="shadow-theme-xs inline-flex items-center gap-2 rounded-lg bg-brand-500 px-5 py-3.5 text-sm font-medium text-white transition hover:bg-brand-600"
    >
        {{ $button }}
    </button>
</div>
