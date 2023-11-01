<x-layout>
    <x-section class="max-w-4xl">
        <a
            href="/books/index"class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-800">
            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                <g fill="none" fill-rule="evenodd">
                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                    </path>
                    <path class="fill-current"
                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                    </path>
                </g>
            </svg>
            Back to books
        </a>
        <div class="flex">
            <div class="border-r">
                <img src={{ asset('storage/' . $book->thumbnail) }} width="400px" class="p-2"
                    alt="{{ $book->title }}">
            </div>
            <div class="space-y-2 p-2 text-justify leading-6">
                <h1 class="text-3xl font-semibold">{{ $book->title }}</h1>
                {!! $book->body !!}
            </div>
        </div>

    </x-section>
</x-layout>
