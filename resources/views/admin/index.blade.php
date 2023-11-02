<x-admin.admin-layout>
    <div class="grid grid-cols-4">
        <div class="col-span-2 space-y-2 flex flex-col pb-2">
            <h1 class="text-center w-full text-lg font-semibold border-b border-blue-800">Title</h1>
            @foreach ($books as $book)
                <a href="/book/{{$book->slug}}" class="px-4">{{ $book->title }}</a>
            @endforeach
        </div>
        <div class="col-span-2 col-span-2 space-y-2 flex flex-col pb-2">
            <h1 class="text-center w-full text-lg font-semibold border-b border-blue-800">Year</h1>
            @foreach ($books as $book)
                <p>{{ $book->year }}</p>
            @endforeach
        </div>
    </div>
</x-admin.admin-layout>
