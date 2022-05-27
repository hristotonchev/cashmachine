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
    <h1>Cash Transfer</h1>

    <form  method="post" action="{{ route('store') }}" novalidate>
        @csrf
        <div class="form-group mb-2">
            <label>Banknote value: 1</label>
            <input type="number" class="form-control @error('banknote1') is-invalid @enderror" name="banknote1" id="banknote1" value="value">
            @error('banknote1')
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
        </div>

        <div class="form-group mb-2">
            <label>Banknote value: 5</label>
            <input type="number" class="form-control @error('banknote5') is-invalid @enderror" name="banknote5" id="banknote5" value="value">
            @error('banknote5')
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
        </div>

        <div class="form-group mb-2">
            <label>Banknote value: 10</label>
            <input type="number" class="form-control @error('banknote10') is-invalid @enderror" name="banknote10" id="banknote10" value="value">
            @error('banknote10')
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
        </div>

        <div class="form-group mb-2">
            <label>Banknote value: 50</label>
            <input type="number" class="form-control @error('banknote50') is-invalid @enderror" name="banknote50" id="banknote50" value="value">
            @error('banknote50')
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
        </div>

        <div class="form-group mb-2">
            <label>Banknote value: 100</label>
            <input type="number" class="form-control @error('banknote100') is-invalid @enderror" name="banknote100" id="banknote100" value="value">
            @error('banknote100')
            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
        </div>

        <input name="source" type="hidden" value="cash">

        <div class="d-grid mt-3">
            <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
        </div>
    </form>
</div>
</body>
</html>
