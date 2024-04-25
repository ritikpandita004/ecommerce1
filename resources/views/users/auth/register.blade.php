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
                <div class="card-header">Register</div>
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

                    <form method="POST" action="{{ route('storedata') }}">
                        @csrf
                        <input type="text" class="form-control mb-3" name="name" placeholder="Name" value="{{ old('name') }}" required>
                        <input type="email" class="form-control mb-3" name="email" placeholder="Email address" value="{{ old('email') }}" required>
                        <input type="tel" class="form-control mb-3" name="phoneNumber" placeholder="Phone Number" value="{{ old('phoneNumber') }}" required>
                        <!-- Password input with eye icon -->
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Password" id="password" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="togglePassword">
                                    <i class="fas fa-eye-slash" onclick="togglePasswordVisibility()"></i>
                                </span>
                            </div>
                        </div>
                        <input type="password" class="form-control mb-3" name="password_confirmation" placeholder="Confirm Password" required>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="customCheck3" required> 
                            <label class="form-check-label" for="customCheck3">AGREE WITH TERMS AND CONDITIONS</label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mb-2">Register</button>
                    </form>
                    <a href="login" class="btn btn-primary btn-block mb-2">Already a Member</a>
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
