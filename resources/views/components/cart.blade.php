<div x-data="{ open: false }" @click.away="open=false" class="p-4">
    <svg @click="open=!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
        stroke="currentColor" class="w-10 h-10 cursor-pointer text-gray-300 hover:text-blue-400 transition-all">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
    </svg>
    <div x-show="open" class="absolute w-80 bg-white p-4 border border-blue-400 shadow rounded-xl mt-4 z-10">
        <h1 class="text-lg font-semibold flex border-b">Cart</h1>
        @if (count($cart) > 0)
            <ul>
                @foreach ($cart as $productID => $cartItem)
                    <li class="flex space-x-4 shadow px-4 my-4 ">
                        <img src={{ asset('storage/' . $cartItem['product']->thumbnail) }} width="50px"
                            class="p-2 border-b" />
                        <p>{{ $cartItem['product']->title }}</p>
                        <p>${{ $cartItem['product']->price }}</p>
                    </li>
                @endforeach
            </ul>
            <a href="/cart/index" class="flex justify-end">
                <x-primary-button>Checkout</x-primary-button>
            </a>
        @else
            <p>Your shopping cart is empty.</p>
        @endif
    </div>
</div>
