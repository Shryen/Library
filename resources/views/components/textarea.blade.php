<textarea {!! $attributes->merge([
    'class' =>
        'py-2 px-2 border border-gray-300 outline-none focus:border-gray-500 focus:border-gray-500 rounded-md shadow-sm w-full resize-none',
]) !!} cols="30" rows="10">{{$slot}}</textarea>
