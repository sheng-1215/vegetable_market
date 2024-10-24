@extends('layout')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Profile Information</h3>
                    </div>
                    <div class="card-body">
                        @if($profile)
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <strong>Name:</strong>
                            </div>
                            <div class="col-sm-9">
                                {{ $profile->name }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <strong>Gender:</strong>
                            </div>
                            <div class="col-sm-9">
                                {{ $profile->gender }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <strong>Contact Number:</strong>
                            </div>
                            <div class="col-sm-9">
                                {{ $profile->contact_number }}
                            </div>
                        </div>

                        <h5 class="mt-4">Addresses:</h5>
                        @foreach($profile->addresses as $address)
                        <div class="card mt-3">
                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-sm-4">
                                        <strong>Address Line 1:</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        {{ $address->address_line_1 }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-4">
                                        <strong>Address Line 2:</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        {{ $address->address_line_2 ?? 'N/A' }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-4">
                                        <strong>City:</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        {{ $address->city }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-4">
                                        <strong>State:</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        {{ $address->state }}
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-4">
                                        <strong>Postal Code:</strong>
                                    </div>
                                    <div class="col-sm-8">
                                        {{ $address->postal_code }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="alert alert-danger" role="alert">
                            Profile information not found.
                        </div>
                        <form action="{{ route('information.create') }}" >
                            <button type="submit" class="btn btn-primary">Create Profile</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

@endsection