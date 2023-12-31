<x-layout>
    <div class="flex w-8/12 mx-auto mt-10">
        <h1 class="ml-4 font-semibold text-4xl">Legújabb könyveink</h1>
    </div>
    <x-section class="grid grid-cols-3 w-8/12 gap-4">
        @if ($books->count())
            @foreach ($books as $book)
                <x-book.book-section :books="$book" />
            @endforeach
        @else
            <p>No books yet. Check back later</p>
        @endif
    </x-section>
</x-layout>
