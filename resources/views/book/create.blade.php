<x-layout>
    <x-section>
        <x-title>Add book</x-title>
        <form action="/add" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="slug" />
            <div>
                <x-input-label for="title" :value="__('title')" />
                <x-text-input class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus
                    autocomplete="title" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="description" :value="__('description')" />
                <x-text-input class="block mt-1 w-full" type="text" name="description" :value="old('description')" required
                    autofocus autocomplete="description" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="year" :value="__('year')" />
                <x-text-input class="block mt-1 w-full" type="text" name="year" :value="old('year')" required
                    autofocus autocomplete="year" />
                <x-input-error :messages="$errors->get('year')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="thumbnail" :value="__('thumbnail')" />
                <x-text-input class="block mt-1 w-full bg-white" type="file" name="thumbnail" :value="old('thumbnail')"
                    autofocus autocomplete="thumbnail" />
                <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
            </div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
            <x-primary-button>Add Book</x-primary-button>
        </form>
    </x-section>
</x-layout>
