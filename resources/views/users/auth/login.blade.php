<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Font Awesome for the eye icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #fff !important; /* Set background color to white */
        }
        .error-message {
            color: red; /* Set color of error messages to red */
        }
    </style>
</head>
<body>

@include('users/commons/navbar')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                    @if(isset($message))
                        <p class="error-message">{{ $message }}</p>
                    @endif
                    <form method="POST" action="{{ route('loginCheck') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control mb-3" id="email" placeholder="Enter email" name="email" @if(old('email')) value="{{ old('email') }}" @endif required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" @if(old('password')) value="{{ old('password') }}" @endif required>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="togglePassword">
                                        <i class="fas fa-eye-slash" onclick="togglePasswordVisibility()"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mb-2">Login</button>
                    </form>
                    <a href="register" class="btn btn-primary btn-block mb-2">Register</a>
                    <a href="/adminlogin" class="btn btn-primary btn-block mb-2">Admin login</a>
                    <a href="/resentpasswordlink" class="btn btn-primary btn-block mb-2">Forget Password</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function togglePasswordVisibility() {
        var passwordField = document.getElementById("password");
        var toggleIcon = document.getElementById("togglePassword").querySelector("i");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleIcon.classList.remove("fa-eye-slash");
            toggleIcon.classList.add("fa-eye");
        } else {
            passwordField.type = "password";
            toggleIcon.classList.remove("fa-eye");
            toggleIcon.classList.add("fa-eye-slash");
        }
    }
</script>

</body>
</html>
