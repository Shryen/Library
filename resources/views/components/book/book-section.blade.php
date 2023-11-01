@props(['books'])
<div class="p-4 rounded flex">
    <div>
        <img src={{ asset('storage/' . $books->thumbnail) }} width="200px" alt="{{ $books->title }}">
    </div>
    <div class="px-4 space-y-2">
        <a href="/book/{{ $books->slug }}" class="text-3xl font-semibold">
            <h1>{{ $books->title }}</h1>
        </a>
        <p>{{ $books->year }}</p>
        <p>{{ $books->description }}</p>
    </div>
</div>
