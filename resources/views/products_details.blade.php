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
                        <label for="quantity">Quantity:</label>
                        <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1" oninput="calculateTotal()" required>
                    </div><br>
                    
                    <div class="form-group">
                        <h3>Price per kg: Rm {{ number_format($product->p_price, 2) }}</h3>
                        <h3>Total Price: Rm <span id="total_price">0.00</span></h3>
                    </div><br>

                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function calculateTotal() {
            var quantity = parseFloat(document.getElementById('quantity').value);
            var price = parseFloat("{{ $product->p_price }}");
            var total = price * quantity;
            document.getElementById('total_price').innerText = total.toFixed(2);
        }

        calculateTotal();
    </script>
</body>
</html>
