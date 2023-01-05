@extends('layouts.app')

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

@section('content')
<div class="d-flex justify-content-between h-50">
    <div class="card bg-dark mb-3 w-100 m-1">
        <div class="card-body d-flex align-items-center justify-content-center">
            <a href="/home/beanies" class="text-center text-white text-decoration-none">
                <h1>Beanies</h1>
            </a>
        </div>
    </div>
    <div class="card bg-dark mb-3 w-100 m-1">
        <div class="card-body d-flex align-items-center justify-content-center">
            <a href="/home/hoodies" class="text-center text-white text-decoration-none">
                <h1>Hoodies</h1>
            </a>
        </div>
    </div>
    <div class="card bg-dark mb-3 w-100 m-1">
        <div class="card-body d-flex align-items-center justify-content-center">
            <a href="/home/socks" class="text-center text-white text-decoration-none">
                <h1>Socks</h1>
            </a>
        </div>
    </div>
</div>
@endsection