<x-admin.admin-layout>
    <div class="flex border-b border-gray-800 px-4 py-2 font-bold text-lg">
        <p class="w-full">ID</p>
        <p class="w-full text-center">Price</p>
        <p class="w-full text-center">Customer</p>
        <p class="w-full text-right">Status</p>
    </div>
    @foreach ($orders as $order)
        <div class="flex border-b px-4 py-2">
            <a href="/order/{{ $order->id }}"
                class="w-full hover:text-blue-400 focus:text-blue-400 transition-all">#{{ $order->id }}</a>
            <p class="w-full text-center">€{{ $order->price }}</p>
            <p class="w-full text-center">{{ $order->user->name }}</p>
            <p class="w-full text-right">{{ $order->status }}</p>
        </div>
    @endforeach
</x-admin.admin-layout>
