@extends('layouts.app')

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href='https://css.gg/shopping-cart.css' rel='stylesheet'>
</head>

@section('content')
<div class="d-flex justify-content-center">
    <form method="get" action="/src/order.php" class="mb-3" style="width: 50%">
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
            <button type="submit" class="btn btn-primary">Order</button>
        </div>
    </form>
</div>
@endsection