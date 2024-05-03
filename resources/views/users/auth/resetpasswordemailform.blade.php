<!-- resources/views/reset-password.blade.php -->

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
            background-color: #f4f4f4;
        }
        .form-container {
            max-width: 600px; /* Adjust max-width as needed */
            margin: 0 auto;
            padding: 40px; /* Increase padding for a larger form */
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Style for form inputs */
        .form-group {
            margin-bottom: 20px; /* Increase margin for more spacing */
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px; /* Adjust spacing between label and input */
        }

        input[type="email"] {
            width: 100%;
            padding: 12px; /* Increase padding for larger input fields */
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px; /* Increase font size for better readability */
        }

        button[type="submit"] {
            display: block;
            width: 100%;
            padding: 12px; /* Increase padding for larger button */
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            font-size: 16px; /* Increase font size for larger button */
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Password Reset</h2>
    <form method="POST" action="{{ route('resetPassword') }}">
        @csrf

        @if (session('status'))
            <div>{{ session('status') }}</div>
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
