@include('users/commons/header')
@include('users/commons/navbar')

<style>
   body {
            background-color: #fff !important; /* Set background color to white */
        }
        .error-message {
            color: red; /* Set color of error messages to red */
        }

    /* Style for the eye icon */
    .password-toggle {
        cursor: pointer;
    }

    /* Style for the input group */
    .input-group {
        position: relative;
    }

    /* Style for the eye icon position */
    .password-toggle {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    z-index: 1; /* Add this line */
}

    .position-relative {
    position: relative;
}

.position-absolute {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
}
</style>
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
                            <p class="error-message">{{ $message }}</p>
                        @endif
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" @if(old('email')) value="{{ old('email') }}" @endif required>
                        </div>
                      
                        <div class="form-group position-relative"> <!-- Add position-relative class here -->
                            <label for="password">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" @if(old('password')) value="{{ old('password') }}" @endif required>
                                <span class="input-group-text" id="togglePassword">
                                    <i class="fas fa-eye-slash" onclick="togglePasswordVisibility()"></i>
                                </span>
                            </div>
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
