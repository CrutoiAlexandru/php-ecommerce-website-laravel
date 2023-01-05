<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
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
    public function index()
    {
        return view('cart');
    }

    public function store(Request $request)
    {
        $cart = new Cart;
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $request->product_id;
        $cart->save();

        Session::flash('message', 'Item added to cart');

        return back();
    }

    public function delete(Request $request)
    {
        Cart::where('id', $request->delete_id)->delete();
        Log::alert($request->delete_id);

        Session::flash('message', 'Item deleted from cart');

        return view('cart');
    }
}