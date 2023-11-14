<x-layout>
    <x-section class="max-w-4xl">
        <div>
            <h1 class="font-semibold">Thanks for your order!</h1>
            <p>
                We appreciate your business!
                If you have any questions, please email
                <a href="mailto:orders@example.com">orders@example.com</a>.
            </p>
        </div>
        <div class="p-4 shadow mt-2">
            <p class="text-sm flex justify-end">Order ID: {{ $session->id }}</p>
            <h1 class="font-semibold text-2xl mb-4">Order details</h1>
            <p><strong>Amount: </strong>{{ number_format($session->amount_total / 100, 2) }}€ </p>
            @if (isset($customer->address))
                <p><strong>Country:</strong> {{ $customer->address->country }}</p>
                <p><strong>City:</strong> {{ $customer->address->city }}</p>
                <p><strong>Postal code:</strong> {{ $customer->address->postal_code }}</p>
                <p><strong>Address:</strong> {{ $customer->address->line1 }}</p>
                @if (isset($customer->address->line2))
                    <p>{{ $customer->address->line2 }}</p>
                @endif
            @else
                <p>No billing address information available.</p>
            @endif
            <hr>
            <h1 class="font-semibold text-lg mt-4">Products information</h1>
            @foreach ($order as $order)
                @foreach ($order->books as $book)
                    <div class="py-4 border-b">
                        <img width="200px" class="mb-2" src={{ asset('storage/' . $book->thumbnail) }}
                            alt="{{ $book->title }} picture">
                        <h1><strong>Title: </strong>{{ $book->title }}</h1>
                        <h1><strong>Price: </strong>{{ $book->price }}€</h1>
                    </div>
                @endforeach
            @endforeach
        </div>
    </x-section>
</x-layout>
