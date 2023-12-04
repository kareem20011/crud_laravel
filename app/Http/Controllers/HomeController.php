<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sales_order;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function __construct() {
        $this->middleware('auth');
    }

    public function index(){
        $products = Product::all();
        return view('welcome')->with('products',$products);
    }

    public function store(Request $request){

        $check = Cart::where('product_id',$request->product_id)->get();
        if (count($check)>0) {

            return 'product alrady added before';
        }else{
            Cart::create([
                'user_id'=>$request->user_id,
                'product_id'=>$request->product_id,
            ]);
            return 'product added successfully';
        }

    }


    public function show_cart(){
        $products = Cart::with('get_product')->get();
        // return response($products);die();
        return view('cart')->with('products',$products);

    }


    public function destroy($id){
        Cart::where('id',$id)->delete();
        return redirect()->back();
    }

    public function check_out(Request $request){
        for ($i=0; $i < count($request->quantity); $i++) {
            Order::create([
                'user_id'=>Auth::user()->id,
                'product_id'=>$request->id[$i],
                'quantity'=>$request->quantity[$i],
            ]);
        }
        Cart::where('user_id',Auth::user()->id)->delete();

        return redirect()->back();
    }
}
