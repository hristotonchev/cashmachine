<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cash Machine</title>
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
</head>


<body>
<div style="text-align:center" class="bigfont">
    @if(Session::has('success'))
        <div class="alert alert-success text-center">
            {{Session::get('success')}}
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-error text-center">
            {{Session::get('error')}}
        </div>
    @endif
    <h1>Cash Machine</h1>
    <h3>Choose source method:</h3>
        <span><a href="{{ route('cash') }}" class="button">Cash</a></span>
        <span><a href="{{ route('credit_card') }}" class="button">Credit Card</a></span>
        <span><a href="{{ route('bank_transfer') }}" class="button">Bank Transfer</a></span>
    </div>
</div>
</body>


</html>
