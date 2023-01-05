<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
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
    public function beanies()
    {
        return view('products/beanies');
    }
    public function hoodies()
    {
        return view('products/hoodies');
    }
    public function socks()
    {
        return view('products/socks');
    }
}