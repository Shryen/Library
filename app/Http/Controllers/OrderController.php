<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Address;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::orderBy("created_at", "desc")->paginate(10);
        return view('auth.orders', [
            'orders' => $orders
        ]);
    }

    public function show(Order $order)
    {
        $user = User::find(request()->user()->id);
        $address = Address::where('user_id', $user->id)->get();
        return view('order', [
            'order' => $order,
            'address' => $address
        ]);
    }

    public function all()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.orders', [
            'orders' => $orders
        ]);
    }
}
