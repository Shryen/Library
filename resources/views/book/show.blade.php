<x-layout>
    <x-section>
        <div class="flex">
            <div class="border-r">
                <img src="{{ asset('$book->thumbnail') }}" alt="{{ $book->title }}">
            </div>
            <div>
                {{ $book->title }}
            </div>
            <div>
                {{ $book->body }}
            </div>
        </div>
    </x-section>
</x-layout>
