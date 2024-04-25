<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Email Verified Successfully</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f0f0f0;
    }

    .container {
      text-align: center;
    }

    .success-message {
      background-color: #4caf50;
      color: #fff;
      padding: 10px 20px;
      border-radius: 5px;
      text-align: center;
    }

    .login-button {
      margin-top: 20px;
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
      cursor: pointer;
    }

    .login-button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
    <div class="container">
        <div class="success-message">
          <h2>Registration Successful!</h2>
          <p>Thank you for registering. You can now access all our features.</p>
        </div>
        <a href="{{route('login')}}" class="login-button mt-5">Login</a>
    </div>
</body>
</html>
