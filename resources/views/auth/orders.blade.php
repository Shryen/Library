<x-layout>
    <x-section class="max-w-4xl">
        <x-title>Orders</x-title>
        <div class="space-y-4">
            @foreach ($orders as $order)
                @if (auth()->user()->id == $order->user_id)
                    <div class="shadow rounded-xl border border-gray-100">
                        <div class="bg-gray-100 grid grid-cols-12 p-2">
                            <div class="lg:col-span-3 col-span-12">
                                <div class="flex flex-col">
                                    <span class="text-sm text-gray-700 uppercase">Ordered at</span>
                                    <p>{{ $order->created_at->format('d F Y') }}</p>
                                </div>
                            </div>
                            <div class="lg:col-span-3 col-span-12">
                                <div class="flex flex-col">
                                    <span class="text-sm text-gray-700 uppercase">Total</span>
                                    {{ $order->price }}€
                                </div>
                            </div>
                            <div class="lg:col-span-3 col-span-12">
                                <span class="text-sm text-gray-700 uppercase">Status</span>
                                @if ($order->status === 'accepted')
                                    <h1 class="text-green-500">{{ ucwords($order->status) }}</h1>
                                @else
                                    <h1 class="text-red-500">{{ ucwords($order->status) }}</h1>
                                @endif
                            </div>
                            <div class="lg:col-span-3 col-span-12 flex justify-end">
                                <span class="text-sm text-gray-700 uppercase">Order ID #{{ $order->id }}</span>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 ml-2">

                            @foreach ($order->books as $book)
                                <div class="py-4 lg:col-span-3 col-span-12">
                                    <img src={{ asset('storage/' . $book->thumbnail) }}
                                        alt="{{ $book->title }} picture" width="100px">
                                    <strong>{{ $book->title }}</strong>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </x-section>
</x-layout>
