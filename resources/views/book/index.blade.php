<x-layout>
    <x-section>
        @if ($books->count())
            @foreach ($books as $book)
                <x-book.book-section :books="$book" />
            @endforeach
        @else
            <p>No books yet. Check back later</p>
        @endif
    </x-section>
</x-layout>
