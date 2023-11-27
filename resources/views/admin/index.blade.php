<x-admin.admin-layout>

    <header class="flex">
        <h1 class="p-4 text-3xl font-bold text-center w-full">Books</h1>
    </header>

    <div class="flex">
        <div class="flex flex-col w-full shadow">
            @foreach ($books as $book)
                <div class="flex col-span-4 justify-around py-4">
                    <div class="flex flex-1 px-4 border-b border-blue-300">
                        <a href="/book/{{ $book->slug }}"
                            class="font-semibold text-lg hover:text-blue-300 transition-all">{{ $book->title }}</a>
                    </div>
                    <div class="flex flex-1 border-b border-blue-300">
                        <p>{{ $book->year }}</p>
                    </div>
                    <div class="flex flex-1 border-b border-blue-300">
                        <a href="/admin/book/{{ $book->slug }}/edit"
                            class="text-blue-500 hover:text-blue-700 transition-all">Edit</a>
                    </div>
                    <form action="/admin/books/{{ $book->id }}" method="POST" name="delete"
                        class="flex border-b border-blue-300 px-6 text-gray-400 hover:text-red-600 transition-all">
                        @csrf
                        @method('DELETE')
                        <button onclick="confirmation()">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-admin.admin-layout>
