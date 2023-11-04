<x-admin.admin-layout>
    <div class="grid grid-cols-4">
        @foreach ($books as $book)
            <div class="flex col-span-4 justify-around py-4">
                <div class="flex flex-1 px-4 border-b border-blue-300">
                    
                    <a href="/book/{{ $book->slug }}" class="font-semibold text-lg">{{ $book->title }}</a>
                </div>
                <div class="flex flex-1 border-b border-blue-300">
                    <p>{{ $book->year }}</p>
                </div>
                <div class="flex flex-1 border-b border-blue-300">
                    <a href="/admin/book/{{ $book->slug }}/edit" class="text-blue-500">Edit</a>
                </div>
                <form action="/admin/books/{{ $book->id }}" method="POST" name="delete" class="flex border-b border-blue-300 px-6 text-gray-400">
                    @csrf
                    @method('DELETE')
                    <button onclick="confirmation()">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
</x-admin.admin-layout>
