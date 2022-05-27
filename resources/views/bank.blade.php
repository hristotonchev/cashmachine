<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bank Source</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/common.css') }}">
</head>
<body>
<div class="container mt-5">
    <h1>Bank Transfer</h1>
    <form  method="post" action="{{ route('store') }}" novalidate>
        @csrf
        <div class="form-group mb-2">
            <label>Transfer Date</label>
            <input type="date" class="form-control @error('transferDate') is-invalid @enderror" name="transferDate" id="transferDate" value="value">
            @error('transferDate')
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
        <div class="form-group mb-2">
            <label>Customer Name</label>
            <input type="text" class="form-control @error('customerName') is-invalid @enderror" name="customerName" id="customerName">
            @error('customerName')
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label>Account Number</label>
            <input type="text" class="form-control @error('accountNumber') is-invalid @enderror" name="accountNumber" id="accountNumber" >
            @error('accountNumber')
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

        <input name="source" type="hidden" value="bank">

        <div class="d-grid mt-3">
            <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
        </div>
    </form>
</div>
</body>
</html>
