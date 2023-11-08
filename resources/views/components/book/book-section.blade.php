@props(['books'])
<div
    class="p-4 rounded flex flex-col lg:flex-row relative shadow border border-blue-400 hover:bg-slate-400 transition-all w-full">
    <div>
        <img src={{ asset('storage/' . $books->thumbnail) }} width="200px" alt="{{ $books->title }}">
    </div>
    <div class="w-full lg:px-4 space-y-2">
        <a href="/book/{{ $books->slug }}" class="text-3xl font-semibold">
            <h1>{{ $books->title }}</h1>
        </a>
        <p class="text-sm">Author: <a href="/books/index?author={{ $books->author }}"
                class="text-sm text-blue-800">{{ $books->author }}</a></p>
        <p class="text-sm">Release: {{ $books->year }}</p>
        <hr />
        <p class="">{{ $books->description }}</p>
    </div>

</div>
