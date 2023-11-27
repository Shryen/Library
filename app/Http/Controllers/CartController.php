<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use App\Models\Address;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\Customer;
use Stripe\PaymentIntent;
use Stripe\Stripe;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
                'id' => $productID,
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
        $totalPrice = 0;
        $items = [];
        foreach ($cart as $productID => $product) {
            $totalPrice += $product['product']->price;
            $items[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $product['product']->title,
                        'images' => [asset('storage/' . $product['product']->thumbnail)],
                    ],
                    'unit_amount' => $product['product']->price * 100,
                    // Convert to the smallest currency unit (e.g., cents)
                ],
                'quantity' => $product['quantity'],
            ];
        }

        $customer = $stripe->customers->create([
            'email' => auth()->user()->email,
        ]);

        $order = new Order();
        $order->status = 'pending';
        $order->price = $totalPrice;
        $order->user_id = auth()->user()?->id;
        $order->save();

        $checkout_session = $stripe->checkout->sessions->create([
            'line_items' => $items,
            'shipping_address_collection' => ['allowed_countries' => ['AT']],
            'customer_creation' => 'always',
            'payment_method_types' => ['card'],
            'mode' => 'payment',
            'success_url' => route('success', ['order' => $order->id]) . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('cancel'),
        ]);

        $order->session_id = $checkout_session->id;
        $order->save();
        foreach ($cart as $productID => $product) {
            $book = $product['id'];
            $order->books()->attach($book);
        }
        $order->save();

        return redirect($checkout_session->url);
    }

    public function success(Order $order, Address $address)
    {
        $order->update(['status' => 'accepted']);
        $address = new Address();
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        try {
            $session = $stripe->checkout->sessions->retrieve($_GET['session_id']);
            $customer = $stripe->customers->retrieve($session->customer);
            $address->create([
                'user_id' => auth()->user()?->id,
                'city' => $customer->address->city,
                'postal' => $customer->address->postal_code,
                'line1' => $customer->address->line1,
                'line2' => $customer->address->line2,
                'country' => $customer->address->country
            ]);
        } catch (Error $e) {
            \Log::error('Stripe API Error: ' . $e->getMessage());
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
        session()->forget('cart');
        $orders = Order::find($order);
        $orders->load('books');
        return view('checkout.success', [
            'session' => $session,
            'customer' => $customer,
            'order' => $orders
        ]);
    }

    public function cancel(Order $order)
    {
        $order->update(['status' => 'canceled']);
        return view('checkout/cancel');
    }

    public function delete()
    {
        session()->flush();
        return redirect('/books/index');
    }
}
