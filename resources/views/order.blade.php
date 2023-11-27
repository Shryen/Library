<x-layout>
    <x-title class="mt-5">Order</x-title>
    <x-section class="flex max-w-4xl">
        <div class="flex-col border rounded w-full px-4">
            <h1>Order ID: {{ $order->id }}</h1>
            <h1 class="font-semibold text-3xl py-2">Products</h1>
            @foreach ($address as $item)
                <h1>Country: {{ $item->country }}</h1>
                <h1>City: {{ $item->city }}</h1>
                <h1>Address: {{ $item->line1 }}</h1>
                @if ($item->line2 != null)
                    <h1>Line 2 {{ $item->line2 }}</h1>
                @endif
            @endforeach
            <div class="flex">
                @foreach ($order->books as $book)
                    <div class="w-full">
                        <img src={{ asset('storage/' . $book->thumbnail) }} alt="{{ $book->title }} picture"
                            width="100px">
                        <a href="/book/{{ $book->slug }}">
                            <p class="text-lg font-semibold">{{ $book->title }}</p>
                        </a>
                        <p>€{{ $book->price }}</p>
                    </div>
                @endforeach
            </div>
            <p class="mt-5 py-4 font-bold">Total: €{{ $order->price }}</p>
        </div>
    </x-section>
</x-layout>
