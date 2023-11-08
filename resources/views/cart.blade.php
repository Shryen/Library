<x-layout>
    <x-section class="max-w-xl">
        <h1 class="text-xl font-semibold"> Shopping Cart </h1>
        <div class="py-4 mt-4">
            @if (count($cart) > 0)
                <ul class="grid-cols-4 space-y-4">
                    @foreach ($cart as $productID => $cartItem)
                        <li class="flex cols-span-2 border border-gray-200 rounded-xl shadow p-2">
                            <div class="flex cols-span-2 w-full">
                                <img src={{ asset('storage/' . $cartItem['product']->thumbnail) }} width="100px"
                                    class="p-2" />
                                <p class="text-lg px-2 font-semibold">{{ $cartItem['product']->title }}</p>
                            </div>
                            <div class="flex flex-col cols-span-2 items-end w-full">
                                <p><strong>{{ $cartItem['quantity'] }} </strong>Quantity</p>
                                <p><strong>${{ $cartItem['product']->price * $cartItem['quantity'] }}</strong></p>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="w-full flex justify-end mt-5">
                    <form action="/checkout" method="POST">
                        @csrf
                        <x-primary-button> Proceed to checkout </x-primary-button>
                    </form>
                </div>
            @else
                <p>Your shopping cart is empty.</p>
            @endif
        </div>
    </x-section>
</x-layout>
