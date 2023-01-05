@extends('layouts.app')

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href='https://css.gg/shopping-cart.css' rel='stylesheet'>
</head>

@section('content')
<div style="width: 100vw; display:flex; justify-content: center;">
    <div class="line"></div>
</div>

<h1 style='text-align: center;'><span>Previous orders</span></h1>
<hr class="my-4 bg-dark">
<div style="width: 100vw; display:flex; justify-content: center;">
    <div class="line" style="width:90vw;"></div>
</div>

<?php 
    $orders = DB::table('orders')->where('user_id', Auth::user()->id)->get();
?>

<table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Country</th>
            <th>County</th>
            <th>City</th>
            <th>Street</th>
            <th>Number</th>
            <th>Price</th>
            <th>Stage</th>
            <th>Created at</th>
            <th>Updated at</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <?php 
            $order->product = rtrim($order->product, ',');
        ?>
        <tr>
            <td>{{ $order->product }}</td>
            <td>{{ $order->country }}</td>
            <td>{{ $order->county }}</td>
            <td>{{ $order->city }}</td>
            <td>{{ $order->street }}</td>
            <td>{{ $order->number }}</td>
            <td>${{ $order->price }}</td>
            <td>{{ $order->stage }}</td>
            <td>{{ $order->created_at }}</td>
            <td>{{ $order->updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection