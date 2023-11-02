@props(['active' => false])

@php

    $class = 'border-b border-blue-800 px-4 py-2';

    $class = ($active ?? false) ? 'border-b border-blue-800 px-4 py-2 text-blue-800' : 'border-b border-blue-800 px-4 py-2';

@endphp

<a {{ $attributes(['class' => $class]) }}>{{ $slot }}</a>
