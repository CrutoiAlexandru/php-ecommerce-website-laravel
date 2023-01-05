@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pitshop</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="css/app.css" rel="stylesheet">

    <style>
    body {
        font-family: 'Nunito', sans-serif;
    }
    </style>
</head>

<body class="antialiased">
    <div class="container mt-5">
        <h1 class="display-4">Welcome to Pitshop</h1>
        <p class="lead">We are a one-stop shop for all your car clothing needs. From beanies and hoodies to socks, we
            have everything you need to show off your love of cars.</p>
        <p>Our team is passionate about cars and we pride ourselves on offering high-quality products at competitive
            prices. We also have a wide selection of products from the top brands in the industry.</p>
        <p>Thank you for choosing Pitshop for your car clothing needs. We look forward to serving you and helping you
            find the perfect gear for your next race or car show.</p>
        <p>Thank you,</p>
        <p>The Pitshop team</p>
    </div>
</body>

</html>
@endsection