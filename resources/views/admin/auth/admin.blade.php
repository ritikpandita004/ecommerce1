@include('admin/commons/header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    body {
        background-color: #f8f9fa; /* Set background color */
    }

    .container {
        margin-top: 50px;
    }

    .form-container {
        background-color: #fff; /* Set form background color */
        border: 1px solid #ddd; /* Add border */
        border-radius: 10px; /* Add border radius */
        padding: 20px; /* Add padding */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add box shadow */
    }

    .form-container h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-control {
        border: 1px solid #ced4da; /* Add border color */
        border-radius: 5px; /* Add border radius */
    }

    .btn-primary {
        background-color: #007bff; /* Set button background color */
        border-color: #007bff; /* Set button border color */
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Change button background color on hover */
        border-color: #0056b3; /* Change button border color on hover */
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('adminlogin') }}" method="POST" class="p-4 form-container">
                @csrf
                <h1>ADMIN LOGIN</h1>
                @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first() }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
                <div class="form-group">
                    <label for="email">Username:</label>
                    <input type="text" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <div class="input-group"> <!-- Wrap input and icon in a group -->
                        <input type="password" id="password" name="password" class="form-control" required>
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <i class="fas fa-eye" id="togglePassword" style="line-height: 38px;"></i> <!-- Font Awesome eye icon -->
                            </span>
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary btn-block">Login</button>
                <a href="/login" class="btn btn-primary btn-block">User Login</a>

            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById("togglePassword").addEventListener("click", function() {
        var passwordInput = document.getElementById("password");
        var icon = document.getElementById("togglePassword");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            passwordInput.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    });
</script>

@include('admin/commons/footer')
