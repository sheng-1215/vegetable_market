<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            background: black;
            color: azure;
        }
    </style>
</head>
<body>
    <h1>Welcome to <i>Vegetable Market</i></h1>
    <h2>
        Please enter your OTP : 
        <b>
            <i>{{ $user->OTP }}</i>
        </b>
    </h2>

    {{-- <h4><i><a href="{{ route('verify') }}">Click here to verify ! ! !</a></i></h4> --}}
</body>
</html>
