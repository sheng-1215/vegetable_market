@extends('layout_admin')

@section('content')

<!-- Success alert for successful orders -->
@session('Buysuccess')
    <script>
        alert("{{ session('Buysuccess') }}")
    </script>
@endsession

<div class="container mt-5">
    <!-- Pending Orders Section -->
    <h1>Pending Orders</h1>
    
    <!-- Check if there are pending orders -->
    @if($cartItems->isEmpty())
        <div class="alert alert-warning">No pending orders at the moment.</div>
    @else
        <!-- Pending Orders Table -->
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Item Image</th>
                    <th>Product Name</th>
                    <th>Mass (gram)</th>
                    <th>Customer</th>
                    <th>Total Price (RM)</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
                    <tr>
                        <td><img src="{{ asset($item->p_image) }}" alt="Product Image" style="width: 50px;"></td>
                        <td>{{ $item->p_name }}</td>
                        <td>{{ $item->mass }} <b>Gram</b></td>
                        <td>{{ $item->name }}</td>
                        <td><b>RM</b> {{ number_format($item->price, 2) }}</td>
                        <td style="color: orange;">{{ ucfirst($item->c_status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-right">
            <form action="{{ route('admin.checkout', $item->p_id) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-danger btn-sm">Shipping</button>
            </form>
        </div>
    @endif

    <!-- Completed Orders Section -->
    <br><br>
    <h1>Completed Orders</h1>

    <!-- Check if there are completed orders -->
    @if($itemComplete->isEmpty())
        <div class="alert alert-info">No completed orders yet.</div>
    @else
        <!-- Completed Orders Table -->
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>    
                    <th>Item Image</th>
                    <th>Product Name</th>
                    <th>Mass (gram)</th>
                    <th>Customer</th>
                    <th>Total Price (RM)</th>
                    <th>Status</th>
                    <th>Trade Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($itemComplete as $items)
                    <tr>
                        <td><img src="{{ asset($items->p_image) }}" alt="Product Image" style="width: 50px;"></td>
                        <td>{{ $items->p_name }}</td>
                        <td>{{ $items->mass }} <b>Gram</b></td>
                        <td>{{ $items->name }}</td>
                        <td><b>RM</b> {{ number_format($items->price, 2) }}</td>
                        <td style="color: green;">{{ ucfirst($items->c_status) }}</td>
                        <td><b>{{ $items->trade_number }}</b></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

@endsection
