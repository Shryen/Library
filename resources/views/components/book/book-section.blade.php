@props(['books'])
<a>
    <div class="border border-gray-400 p-4 rounded">
        <img src="{{ $books->thumbnail }}" alt="{{ $books->title }}">
        <a href="/book/{{ $books->slug }}">{{ $books->title }}</h1>
            <p>{{ $books->year }}</p>
            <p>{{ $books->description }}</p>
    </div>
</a>
