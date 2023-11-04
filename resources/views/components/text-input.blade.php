@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'py-2 px-2 border border-gray-300 outline-none focus:border-gray-500 focus:border-gray-500 rounded-md shadow-sm',
]) !!}>
