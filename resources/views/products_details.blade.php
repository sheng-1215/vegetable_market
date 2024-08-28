@extends('layout')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .product-details {
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row product-details">
            <div class="col-md-6 d-flex justify-content-center">
                <img src="{{ asset($product->p_image) }}" alt="{{ $product->p_name }}" class="product-image">
            </div>
            <div class="col-md-6">
                <h1>{{ $product->p_name }}</h1>
                <p>{{ $product->p_desc }}</p><br>

                <form action="{{ route('addcart', ['id' => $product->id]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <h3>Price per 1000g: Rm {{ number_format($product->p_price, 2) }}</h3>
                        <label for="mass">Mass (in grams):</label>
                        <div class="input-group">
                            <button type="button" class="btn btn-secondary" onclick="adjustMass(-50)">-50g</button>
                            <input type="number" id="mass" name="mass" min="100" value="1000">
                            @error('mass')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                            <button type="button" class="btn btn-secondary" onclick="adjustMass(50)">+50g</button>
                        </div>
                        <h3>Total Price: Rm <span id="total_price">{{ number_format($product->p_price, 2) }}</span></h3>
                        <input type="hidden" id="total_price_input" name="price" value="{{ $product->p_price }}">
                    </div><br>

                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


<script>
    function Calculate(price, mass) {
        let totalPrice = parseFloat(price) * parseFloat(mass);
        document.getElementById('total_price').innerText = totalPrice.toFixed(2);
        document.getElementById('total_price_input').value = totalPrice.toFixed(2);
    }

    function adjustMass(value) {
        let massInput = document.getElementById('mass');
        let newMass = parseInt(massInput.value) + value;
        if (newMass < 1) {
            newMass = 1;
        }
        massInput.value = newMass;
        Calculate({{ $product->p_price }}, newMass / 1000);
    }
</script>

@endsection
