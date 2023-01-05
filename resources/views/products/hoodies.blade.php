@extends('layouts.app')

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

@section('content')

@if(Session::has('message'))
<!-- In your view -->
<div class="alert alert-success" id="alert">{{ Session::get('message') }}</div>

<script>
// Hide the alert message after 2 seconds
setTimeout(function() {
    document.getElementById('alert').style.display = 'none';
}, 1000);
</script>
@endif

<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <?php
        $products = DB::select('SELECT * FROM products WHERE name LIKE "hoodie%";');
    ?>
    <tbody>
        @foreach ($products as $product)
        <tr style="width: 100%;">
            <td>{{ $product->name }}</td>
            <td><img src="{{ $product->image }}" alt="{{ $product->name }}" style="width: 50px;"></td>
            <td>{{ $product->description }}</td>
            <td>${{ $product->price }}</td>
            <td>
                <form action="/cart" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="btn btn-primary">Add to cart</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection