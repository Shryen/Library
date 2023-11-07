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
}
