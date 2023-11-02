@props(['active' => true])

@php

    $class = 'border-b border-blue-800 px-4 py-2';

    if ($active) {
        $class .= 'text-blue-800';
    }

@endphp

<a {{ $attributes(['class' => $class]) }}>{{ $slot }}</a>
