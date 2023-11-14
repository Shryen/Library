<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index(){
        $orders = Order::orderBy("created_at","desc")->paginate(10);
        return view('auth.orders',[
            'orders' => $orders
        ]);
    }

    public function show(Order $order){

    }
}
