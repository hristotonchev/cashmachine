<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cash Source</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/common.css') }}">
</head>
<body>
<div class="container mt-5">
    <h1>Credit Card Transfer</h1>

    <form  method="post" action="{{ route('store') }}" novalidate>
        @csrf
        <div class="form-group mb-2">
            <label>Card Number</label>
            <input type="integer" class="form-control @error('cardNumber') is-invalid @enderror" name="cardNumber" id="cardNumber">
            @error('cardNumber')
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label>Expiration Date</label>
            <input type="text" class="form-control @error('expDate') is-invalid @enderror" name="expDate" id="expDate" value="{{Carbon\Carbon::now()->format('m/Y')}}" >
            @error('expDate')
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label>Cardholder</label>
            <input type="text" class="form-control @error('cardHolder') is-invalid @enderror" name="cardHolder" id="cardHolder">
            @error('cardHolder')
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label>CVV</label>
            <input type="number" class="form-control @error('cvv') is-invalid @enderror" name="cvv" id="cvv" value="value">
            @error('cvv')
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label>Amount</label>
            <input type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" id="amount" value="value">
            @error('amount')
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
        </div>

        <input name="source" type="hidden" value="card">

        <div class="d-grid mt-3">
            <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
        </div>
    </form>
</div>
</body>
</html>
