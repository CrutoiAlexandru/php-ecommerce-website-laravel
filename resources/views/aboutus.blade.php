@extends('layouts.app')

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About us</title>
    <link href='https://css.gg/shopping-cart.css' rel='stylesheet'>
</head>

@section('content')
<div class="container mt-5">
    <h1 class="display-4">About Pitshop</h1>
    <p class="lead">Pitshop is a car clothing store that offers a wide range of high-quality products for car
        enthusiasts. From beanies and hoodies to socks , we have everything you need to show off your
        love of cars.</p>
    <p>Our team is passionate about cars and we pride ourselves on offering excellent customer service and competitive
        prices. We also carry products from the top brands in the industry, so you can trust that you are getting the
        best quality when you shop with us.</p>
    <p>Thank you for choosing Pitshop. We hope to see you at our store soon!</p>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="alert alert-primary" role="alert">
                You can contact us at: <a href="mailto:pitshop@gmail.com" class="alert-link">pitshop@gmail.com</a>
            </div>
        </div>
    </div>
</div>
@endsection