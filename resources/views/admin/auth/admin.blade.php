<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: white;
            font-family: Arial, sans-serif; /* Use a common font for better cross-browser compatibility */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #fff; /* Set form background color */
            border: 1px solid #ccc; /* Add border */
            border-radius: 8px; /* Add border radius */
            padding: 20px; /* Add padding */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add box shadow */
            max-width: 400px; /* Limit form width */
            width: 100%; /* Full width */
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333; /* Set header color */
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
            color: #555; /* Set label color */
            display: block; /* Ensures label and input are stacked vertically */
        }

        .form-control {
            border: 1px solid #ccc; /* Add border color */
            border-radius: 5px; /* Add border radius */
            padding: 10px; /* Adjust padding */
            width: calc(100% - 22px); /* Full width input minus padding and border */
            font-size: 16px; /* Set font size */
            color: #333; /* Set text color */
        }

        .btn-primary {
            background-color: #ff9f00; /* Flipkart's secondary color */
            border-color: #ff9f00; /* Set button border color */
            padding: 12px; /* Adjust padding */
            width: 100%; /* Full width button */
            font-size: 16px; /* Set font size */
            color: #fff; /* Set text color */
            cursor: pointer;
            border-radius: 5px; /* Add border radius */
            text-transform: uppercase; /* Convert text to uppercase */
        }

        .btn-primary:hover {
            background-color: #f90; /* Darken the button color on hover */
            border-color: #f90; /* Change button border color on hover */
        }

        .form-container a {
            display: block;
            text-align: center;
            color: #007bff; /* Flipkart's primary color */
            margin-top: 10px; /* Add some space above the link */
            text-decoration: none; /* Remove underline */
            font-size: 16px; /* Set font size */
        }
        .alert {
            margin-bottom: 20px;
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 10px 15px;
            border: 1px solid transparent;
            border-radius: .25rem;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
    </style>
</head>
<body>

<div class="form-container">
    <form action="{{ route('adminlogin') }}" method="POST" class="p-4">
        @csrf
        <h1>Admin Login</h1>
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
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <div class="input-group"> 
                <input type="password" id="password" name="password" class="form-control" required>
                
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
        <a href="/login">User Login</a>

    </form>
</div>


</body>
</html>
