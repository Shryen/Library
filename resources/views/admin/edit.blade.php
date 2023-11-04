<x-admin.admin-layout>
    <x-section>
        <form action="/admin/books/{{ $book->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="w-full">
                <x-input-label for="title"> Title </x-input-label>
                <x-text-input type="text" name="title" :value="old('title', $book->title)" autofocus autocomplete="title" class="w-full"/>
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="description"> Description </x-input-label>
                <x-text-input type="text" name="description" :value="old('description', $book->description)" autofocus autocomplete="description" class="w-full"/>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="body"> Body </x-input-label>
                <x-textarea type="text" name="body" :value="old('body')" autofocus autocomplete="body" class="w-full"> {{$book->body}} </x-textarea>
                <x-input-error :messages="$errors->get('body')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="price"> Price </x-input-label>
                <x-text-input type="text" name="price" :value="old('price', $book->price)" autofocus autocomplete="price" class="w-full"/>
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="thumbnail" :value="__('thumbnail')" />
                <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" :value="old('thumbnail', $book->thumbnail)"
                    required class="w-full"/>
                <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
            </div>
            <x-primary-button class="mt-5">Edit</x-primary-button>
        </form>
    </x-section>
</x-admin.admin-layout>
