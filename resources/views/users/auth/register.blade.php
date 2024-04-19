<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Your custom CSS here */
    </style>
</head>
<body>

@include('users/commons/navbar')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('storedata') }}">
                        @csrf
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <input type="text" class="form-control mb-3" name="name" placeholder="Name" required>
                        <input type="email" class="form-control mb-3" name="email" placeholder="Email address" required>
                        <input type="tel" class="form-control mb-3" name="phoneNumber" placeholder="Phone Number" required>
                        <input type="password" class="form-control mb-3" name="password" placeholder="Password" required>
                        <input type="password" class="form-control mb-3" name="password_confirmation" placeholder="Confirm Password" required>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="customCheck3" required> 
                            <label class="form-check-label" for="customCheck3">AGREE WITH TERMS AND CONDITIONS</label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mb-2">Register</button>
                    </form>
                    <a href="login" class="btn btn-secondary btn-block">Already a Member</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
