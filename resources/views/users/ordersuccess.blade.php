<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Placed Successfully</title>
    
    <!-- Add Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Add your CSS styles here if needed -->
    <style>
        /* Example CSS styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #fff; /* Set background color to white */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Set height to 100% of viewport height */
        }
        .container {
            margin-top: 50px;
            text-align: center;
        }
        .card {
            border: none; /* Remove border */
            background: none; /* Remove background */
        }
        .card-header {
            color: green; /* Set color to green */
        }
        .green-tick-icon {
            font-size: 100px; /* Increase font size */
            margin-bottom: 20px; /* Add margin at the bottom */
        }
        .continue-shopping-link {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .continue-shopping-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
   
    <div class="container">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-check-circle green-tick-icon"></i> <!-- Removed text here -->
            </div>

            <div class="card-body">
                <p>Your order has been successfully placed.</p>
                <p>Thank you for shopping with us!</p>
                <a href="{{ route('userproduct') }}" class="continue-shopping-link">Continue Shopping</a>
            </div>
        </div>
    </div>
</body>
</html>
