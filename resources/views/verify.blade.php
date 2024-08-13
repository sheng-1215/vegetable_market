<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            background: #d6f2f6;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Email Verification</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-center">Please enter the OTP sent to your email.</p>
                        <form action="{{ route('verify') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="hidden" name="email" value="{{ session('email') }}">
                                <label for="otp" class="form-label">OTP</label>
                                <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter OTP">
                                @error('otp')
                                    <p style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Verify</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <small>Didn't receive the OTP? <a href="{{ route('register') }}">Register again</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
