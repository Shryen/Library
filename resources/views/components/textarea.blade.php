<div>
    <div class="border-t border-gray-300 border-b rounded-t border-l border-r">
        <button id="addTagButton" class="p-2 bg-gray-800 text-white text-sm">&lt;p&gt;</button>
        <button id="addBoldButton" class="p-2 bg-gray-800 text-white text-sm">&lt;b&gt;</button>
    </div>
    <textarea {!! $attributes->merge([
        'class' =>
            'py-2 px-2 border-b border-l border-r border-gray-300 outline-none  rounded-b shadow-sm w-full resize-none',
    ]) !!} cols="30" rows="10">{{ $slot }}</textarea>
</div>
