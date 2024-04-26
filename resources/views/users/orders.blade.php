<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Order - Ecommerce</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <header>
        <!-- Include header content if needed -->
    </header>
    
    <main class="container mt-5">
        <h1 class="mb-4">Your Order</h1>
        <div class="row">
            <!-- Replace the sample data with dynamic data from your backend -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <img src="product_image_1.jpg" class="card-img-top" alt="Product Image 1">
                    <div class="card-body">
                        <h5 class="card-title">Product Name 1</h5>
                        <p class="card-text">Price: $10.00</p>
                    </div>
                    <div class="card-footer">
                        Order ID: #12345
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                @foreach ($data as $product )
                    
               
                <div class="card">
                    <img src="product_image_2.jpg" class="card-img-top" alt="Product Image 2">
                    <div class="card-body">
                        <h5 class="card-title">Product Name 2</h5>
                        <p class="card-text">Price: $15.00</p>
                    </div>
                    <div class="card-footer">
                        {{$product->id}}
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Repeat the above card structure for each product in the order -->
        </div>
    </main>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
