<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #fff; /* Set background color to white */
        }
    </style>
</head>
<body>
    @include('users/commons/header')
    @include('users/commons/navbar')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 login-container">
                <div class="card">
                    <div class="card-header">
                        <h3>LOGIN</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('loginCheck') }}">
                            @csrf
                            @if(isset($message))
                                <p class="success-message">{{ $message }}</p>
                            @endif
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-2">Login</button>
                        </form>
                        <a href="register" class="btn btn-primary btn-block mt-2">Register yourself</a>
                        <a href="/adminlogin" class="btn btn-primary btn-block mt-2">Admin login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('users/commons/footer')
</body>
</html>
