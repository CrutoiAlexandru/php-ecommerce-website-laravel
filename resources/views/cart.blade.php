@extends('layouts.app')

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href='https://css.gg/shopping-cart.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
</head>

@section('content')

@if(Session::has('message'))
<!-- In your view -->
<div class="alert alert-danger" id="alert">{{ Session::get('message') }}</div>

<script>
// Hide the alert message after 2 seconds
setTimeout(function() {
    document.getElementById('alert').style.display = 'none';
}, 1000);
</script>
@endif

<h1 class="display-8 text-center">Here are your orders</h1>
<hr class="my-3 bg-dark">
<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <td></td>
        </tr>
    </thead>
    <?php
        use App\Models\Cart;
        
        $carts = Cart::where('user_id', Auth::user()->id)->get();
        $total = 0;
        $all_products = '';
    ?>
    <tbody>
        @foreach ($carts as $cart)
        <?php 
            $product = DB::select('SELECT * FROM products WHERE id = ' . $cart->product_id . ';')[0];
            $total += $product->price;
            $all_products .= $product->name . ', ';
        ?>
        <tr style="width: 100%;">
            <td>{{ $product->name }}</td>
            <td><img src="{{ $product->image }}" alt="{{ $product->name }}" style="width: 50px;"></td>
            <td>{{ $product->description }}</td>
            <td>${{ $product->price }}</td>
            <td>
                <form method="post" action="/cart/delete">
                    @csrf
                    <input hidden name="delete_id" value="<?php echo $cart->id ?>">
                    <button type="submit" class="btn btn-sm bg-dark">
                        <i class='fa fa-trash text-light'></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
        <tr style="width: 100%;" class="bg-dark">
            <td></td>
            <td></td>
            <td class="text-light"><b>Total</b></td>
            <td class="text-light">${{ $total }}</td>
            <td></td>
        </tr>
    </tbody>
</table>

<h1 class="display-6 text-center">Where should we send them?</h1>
<hr class="my-3 bg-dark">

<div class="d-flex justify-content-center">
    <form method="post" action="/order" class="mb-3" style="width: 50%">
        @csrf
        <input type="hidden" name="price" value="<?php echo $total ?>">
        <input type="hidden" name="product" value="<?php echo $all_products ?>">

        <div class="form-group">
            <label for="country">Country</label>
            <input type="text" name="country" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="county">County</label>
            <input type="text" name="county" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" name="city" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="street">Street</label>
            <input type="text" name="street" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="number">Number</label>
            <input type="text" name="number" class="form-control" required>
        </div>
        <div style="height:5%"></div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary bg-dark">Order</button>
        </div>
    </form>
</div>
@endsection