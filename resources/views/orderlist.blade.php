@extends('layout')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Session message for order cancellation -->
    @session('order')
    <script>
        alert("{{ session('order') }}")
    </script>
    @endsession

    <div class="container mt-5">
        <!-- Pending Orders Section -->
        <h1 class="text-center mb-4">Pending Orders</h1>
        
        <!-- Check if there are any pending orders -->
        @if(isset($pendingOrders) && $pendingOrders->isEmpty())
    <p class="text-center">No pending orders at the moment.</p>
@else
    <!-- Pending Orders Table -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Mass (g)</th>
                    <th scope="col">Total (RM)</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pendingOrders as $item)
                    <tr>
                        <td><img src="{{ asset($item->p_image) }}" alt="{{ $item->p_name }}" class="img-fluid" style="width: 100px; height: auto;"></td>
                        <td class="text-capitalize">{{ $item->p_name }}</td>
                        <td>{{ $item->mass }} g</td>
                        <td>RM {{ number_format($item->price, 2) }}</td>
                        <td>
                            <form action="{{ route('cancel', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to cancel?')">Cancel</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Display the sum of pending orders -->
    <div class="text-right">
        <h5><b>Total Pending Orders: RM {{ number_format($pendingTotal, 2) }}</b></h5>
    </div>
@endif

        <!-- Completed Orders Section -->
        <h1 class="text-center mb-4">Completed Orders</h1>
        
        <!-- Check if there are any completed orders -->
        @if($completedOrders->isEmpty())
            <p class="text-center">No completed orders yet.</p>
        @else
            <!-- Completed Orders Table -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Product Image</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Mass (g)</th>
                            <th scope="col">Total (RM)</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($completedOrders as $item)
                            <tr>
                                <td><img src="{{ asset($item->p_image) }}" alt="{{ $item->p_name }}" class="img-fluid" style="width: 100px; height: auto;"></td>
                                <td class="text-capitalize">{{ $item->p_name }}</td>
                                <td>{{ $item->mass }} g</td>
                                <td>RM {{ number_format($item->price, 2) }}</td>
                                <td><span class="badge badge-success">{{ $item->c_status }}</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <!-- Return button -->
        <div class="text-right mt-4">
                <button type="button" class="btn btn-primary" onclick="window.location='{{ route('index') }}'">Return</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<br><br><br><br><br>
@endsection