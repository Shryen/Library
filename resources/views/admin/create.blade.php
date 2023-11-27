<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#addTagButton').click(function() {
        var textarea = document.getElementById('textArea');
        var tag = '<p>'; 
        var closingTag = '</p>'; 
        var selectedText = textarea.value.substring(textarea.selectionStart, textarea.selectionEnd);
        var originalText = textarea.value;

        // Check if text is selected
        if (selectedText.length > 0) {
            var modifiedText = originalText.substring(0, textarea.selectionStart) +
                tag + selectedText + closingTag +
                originalText.substring(textarea.selectionEnd);

            textarea.value = modifiedText;
        }
    });
});
$(document).ready(function() {
    $('#addBoldButton').click(function() {
        var textarea = document.getElementById('textArea');
        var tag = '<b>'; 
        var closingTag = '</b>'; 
        var selectedText = textarea.value.substring(textarea.selectionStart, textarea.selectionEnd);
        var originalText = textarea.value;

        // Check if text is selected
        if (selectedText.length > 0) {
            var modifiedText = originalText.substring(0, textarea.selectionStart) +
                tag + selectedText + closingTag +
                originalText.substring(textarea.selectionEnd);

            textarea.value = modifiedText;
        }
    });
});
</script>

<x-admin.admin-layout>
    <x-section>
        <x-title>Add book</x-title>
        <form action="/admin/add" method="POST" class="space-y-4" enctype="multipart/form-data">
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
                <x-input-label for="author" :value="__('author')" />
                <x-text-input class="block mt-1 w-full" type="text" name="author" :value="old('author')" required
                    autofocus autocomplete="author" />
                <x-input-error :messages="$errors->get('author')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="year" :value="__('year')" />
                <x-text-input class="block mt-1 w-full" type="text" name="year" :value="old('year')" required
                    autofocus autocomplete="year" />
                <x-input-error :messages="$errors->get('year')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="price" :value="__('price')" />
                <x-text-input class="block mt-1 w-full" type="number" name="price" :value="old('price')" required
                    autofocus autocomplete="year" />
            </div>
            <div>
                <x-input-label for="thumbnail" :value="__('thumbnail')" />
                <x-text-input class="block mt-1 w-full bg-white" type="file" name="thumbnail" autofocus />
                <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="body" :value="__('body')" />
                <x-textarea name="body" id="textArea" />
            </div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
            <x-primary-button>Add Book</x-primary-button>
        </form>
    </x-section>
</x-admin.admin-layout>
