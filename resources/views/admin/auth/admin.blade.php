@include('admin/commons/header')

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
                <div class="form-group">
                    <label for="email">Username:</label>
                    <input type="text" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
        </div>
    </div>
</div>

@include('admin/commons/footer')
