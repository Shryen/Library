@props(['trigger', 'book' => ""])
<div x-data="{ open: false }" @click.away="open = false">
    <div @click="open=!open">
        {{ $trigger }}
    </div>
    <div x-show="open" class="fixed w-3/12 h-screen right-0 top-0 bg-gray-200 transition-all bg-opacity-90">
        {{ $slot }}
        <div>
            {{$book}}
        </div>
    </div>
</div>
