<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Orders;
use Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function store(Request $request)
    {
        $order = new Orders;
        $order->user_id = Auth::user()->id;
        $order->product = $request->product;
        $order->country = $request->country;
        $order->county = $request->county;
        $order->city = $request->city;
        $order->street = $request->street;
        $order->number = $request->number;
        $order->price = $request->price;
        $order->stage = 'In progress';
        $order->save();

        Cart::where('user_id', Auth::user()->id)->delete();

        return view('/profile');
    }
}