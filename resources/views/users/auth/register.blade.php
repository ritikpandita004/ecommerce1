<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Font Awesome for the eye icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f1f3f6 !important; 
        }
        .register-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            padding: 30px;
        }
        .register-card-header {
            background-color: #2874f0;
            color: #fff;
            border-radius: 10px 10px 0 0;
            padding: 15px;
            text-align: center;
            font-weight: bold;
            font-size: 24px;
            margin-bottom: 30px;
            margin-top: 2px;
        }
        .register-form input[type="text"],
        .register-form input[type="email"],
        .register-form input[type="tel"],
        .register-form input[type="password"] {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 12px;
            margin-bottom: 15px;
            margin-top: 2px;
            width: 100%;
        }
        .register-form input[type="checkbox"] {
            margin-right: 10px;
        }
        .register-form label {
            font-size: 14px;
        }
        .register-form .btn-primary {
            background-color: #fb641b; /* Flipkart's accent color */
            border: none;
            border-radius: 5px;
            padding: 12px;
            width: 100%;
            margin-top: 10px;
        }
        .register-form .btn-primary:hover {
            background-color: #f35627; /* Darker shade of accent color on hover */
        }
        .already-member-link {
            text-align: center;
            margin-top: 10px;
        }
    </style>
    @include('users/commons/navbar')
</head>
<body>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card register-card">
                <div class="card-header register-card-header">Register</div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="register-form" method="POST" action="{{ route('storedata') }}">
                        @csrf
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}" required>
                        <input type="email" class="form-control" name="email" placeholder="Email address" value="{{ old('email') }}" required>
                        <input type="tel" class="form-control" name="phoneNumber" placeholder="Phone Number" value="{{ old('phoneNumber') }}" required>
                        <input type="password" class="form-control" name="password" placeholder="Password" id="password" required>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="customCheck3" required> 
                            <label class="form-check-label" for="customCheck3">AGREE WITH TERMS AND CONDITIONS</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                    <div class="already-member-link">
                        <a href="login">Already a Member</a>
                    </div>
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
