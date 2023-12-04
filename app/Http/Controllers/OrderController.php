<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    public function index(){

        $products = Order::with(['product','users'])->get();
        // return $products;
        return view('admin.orders')->with('products',$products);
    }
}
