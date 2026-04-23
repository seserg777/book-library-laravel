@php
    $b = $book;
@endphp
<div>
    <label for="title" class="block text-sm text-gray-700 mb-1">Title</label>
    <input type="text" name="title" id="title" value="{{ old('title', $b?->title) }}" required
        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm" />
</div>
<div>
    <label for="publisher" class="block text-sm text-gray-700 mb-1">Publisher</label>
    <input type="text" name="publisher" id="publisher" value="{{ old('publisher', $b?->publisher) }}" required
        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm" />
</div>
<div>
    <label for="author" class="block text-sm text-gray-700 mb-1">Author</label>
    <input type="text" name="author" id="author" value="{{ old('author', $b?->author) }}" required
        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm" />
</div>
<div>
    <label for="genre" class="block text-sm text-gray-700 mb-1">Genre</label>
    <input type="text" name="genre" id="genre" value="{{ old('genre', $b?->genre) }}" required
        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm" />
</div>
<div>
    <label for="publication_date" class="block text-sm text-gray-700 mb-1">Publication date</label>
    <input type="date" name="publication_date" id="publication_date" value="{{ old('publication_date', $b?->publication_date?->format('Y-m-d')) }}" required
        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm" />
</div>
<div>
    <label for="word_count" class="block text-sm text-gray-700 mb-1">Word count</label>
    <input type="number" name="word_count" id="word_count" value="{{ old('word_count', $b?->word_count) }}" min="0" required
        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm" />
</div>
<div>
    <label for="price_usd" class="block text-sm text-gray-700 mb-1">Price (USD)</label>
    <input type="text" inputmode="decimal" name="price_usd" id="price_usd" value="{{ old('price_usd', $b?->price_usd) }}" required
        class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm" />
</div>
<div>
    <button type="submit" class="px-4 py-2 rounded-md bg-gray-900 text-white text-sm hover:bg-gray-800">{{ $button }}</button>
</div>
