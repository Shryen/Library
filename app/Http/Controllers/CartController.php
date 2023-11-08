<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function store(Request $request)
    {
        $productID = $request->input('book_id');
        $product = Book::find($productID);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found!');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$productID])) {
            $cart[$productID]['quantity']++;
        } else {
            $cart[$productID] = [
                'product' => $product,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect('/books/index')->with('success', 'Added to cart');
    }

    public function checkout()
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $cart = session()->get('cart', []);
        $items = [];
        foreach ($cart as $productID => $product) {
            $items[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $product['product']->title,
                        'images' => [$product['product']->thumbnail],
                    ],
                    'unit_amount' => $product['product']->price * 100,
                    // Convert to the smallest currency unit (e.g., cents)
                ],
                'quantity' => $product['quantity'],
            ];
        }
        $checkout_session = $stripe->checkout->sessions->create([
            'line_items' => $items,
            'payment_method_types' => ['card'],
            'mode' => 'payment',
            'success_url' => route('success'),
            'cancel_url' => route('cancel'),
        ]);
        return redirect($checkout_session->url);
    }

    public function success()
    {
        return view('checkout/success');
    }

    public function cancel()
    {
        return view('checkout/cancel');
    }
}
