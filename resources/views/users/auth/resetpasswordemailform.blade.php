<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link rel="stylesheet" href="{{ asset('css/reset-password.css') }}">
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: white;
            font-family: Arial, sans-serif;
        }
        .form-container {
            max-width: 400px; /* Adjust max-width as needed */
            width: 90%; /* Use percentage for responsiveness */
            padding: 20px; /* Adjust padding for a smaller form */
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1); /* Add a subtle box-shadow for depth */
        }
        /* Style for form inputs */
        .form-group {
            margin-bottom: 20px; /* Increase margin for more spacing */
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px; /* Adjust spacing between label and input */
            color: #212121; /* Set label color to a dark shade */
        }
        input[type="email"] {
            width: calc(100% - 24px); /* Subtract padding and border width from the width */
            padding: 12px; /* Increase padding for larger input fields */
            border: 1px solid #bdbdbd; /* Use a light gray border */
            border-radius: 5px;
            font-size: 16px; /* Increase font size for better readability */
            color: #212121; /* Set input text color to a dark shade */
            box-sizing: border-box; /* Include padding and border in element's total width and height */
        }
        button[type="submit"] {
            display: block;
            width: calc(100% - 24px);
            padding: 12px; /* Increase padding for larger button */
            border: none;
            border-radius: 5px;
            background-color: #ff9f00; /* Flipkart's secondary color */
            color: #fff;
            cursor: pointer;
            font-size: 16px; /* Increase font size for larger button */
            text-transform: uppercase; /* Convert text to uppercase */
        }
        button[type="submit"]:hover {
            background-color: #f90; /* Darken the button color on hover */
        }
        .error-message {
            color: red; /* Set color of error messages to red */
            margin-top: 10px; /* Add some space above the error messages */
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2 style="text-align: center; color: #ff9f00;">Forgot Password?</h2>
    @if ($errors->any())
    <div class="error-message">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{ route('resetPassword') }}">
        @csrf

        @if (session('status'))
            <div style="color: #388e3c;">{{ session('status') }}</div>
        @endif

        <div class="form-group">
            <label for="email">Email Address:</label>
            <input id="email" type="email" name="email" required>
        </div>

        <button type="submit">Send Password Reset Link</button>
    </form>
</div>

</body>
</html>
