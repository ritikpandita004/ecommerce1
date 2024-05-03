<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ekart</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS */
        body {
            background-color: #f0f2f4 !important; 
        }
        .order-container {
            margin-bottom: 20px; 
        }
        .order-card {
            background-color: #fff; 
            border-radius: 8px; 
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
            padding: 20px; 
            display: flex; /* Display flex for side-by-side layout */
        }
        .order-img {
            max-width: 80px; /* Adjusted width of carousel images */
            height: auto; 
            margin-right: 20px; 
            border-radius: 8px;
            border: 1px solid #e0e0e0;
        }
        .order-details {
            flex: 1; /* Fill remaining space */
        }
        .order-details .section {
            margin-bottom: 20px; /* Add margin between sections */
        }
        .section-title {
            font-size: 18px;
            font-weight: bold;
            color: #212121;
            margin-bottom: 10px;
        }
        .details p {
            font-size: 16px;
            color: #6b6b6b;
            margin-bottom: 0; 
        }
       
        .order-item a {
            cursor: pointer;
            color: inherit;
            text-decoration: none !important;
        }
        
        .carousel-item img {
            max-width: 100%;
            height: auto;
        }
      
        .order-img-carousel {
            width: 80px; 
            margin-right: 20px; 
        }
        
        .order-details {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 4%;
            color: #000; 
        }
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%; 
            padding: 10px; 
        }
        .carousel-control-prev-icon {
            margin-right: 2px; 
        }
        .carousel-control-next-icon {
            margin-left: 2px; 
        }
      
        .no-orders-message {
            background-color: yellow;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
          
        top: 50%;
        left: 50%;
        }
    </style>
</head>
<body>
    <header>
      @include('users/commons/loggedinnavbar')
    </header>
    <main class="container mt-5">
        <h1 class="mb-4 text-center">All orders</h1>
        
        @if(count($orderData) == 0)
            <div class="no-orders-message">
                <p>No orders</p>
            </div>
        @else
            @foreach ($orderData as $orderItem)
            <div class="order-container">
                <a href="{{ route('ordersdetails', ['order_id' => $orderItem['order']['id'] ]) }}" class="order-item">
                    <div class="order-card">
                       
                        <div class="order-img-carousel">
                            <div id="carouselExampleIndicators{{ $loop->iteration }}" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @foreach ($orderItem['products'] as $key => $product)
                                        <li data-target="#carouselExampleIndicators{{ $loop->parent->iteration }}" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
                                    @endforeach
                                </ol>
                                <div class="carousel-inner">
                                    @foreach ($orderItem['products'] as $key => $product)
                                        <div class="carousel-item{{ $key == 0 ? ' active' : '' }}">
                                            <img src="{{ $product['image'] }}" class="d-block w-100" alt="Product Image">
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators{{ $loop->iteration }}" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators{{ $loop->iteration }}" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <!-- Order details on right side -->
                        <div class="order-details">
                            <!-- Shipping Details -->
                            <div class="section">
                                <div class="section-title">Shipping Details</div>
                                <div class="details">
                                    <p> {{ $orderItem['shipment'][0]['address'] }}</p>
                                </div>
                            </div>
                            <!-- Customer Information -->
                            <div class="section">
                                <div class="section-title">Customer Information</div>
                                <div class="details">
                                    <p><strong>Name:</strong> {{ $orderItem['shipment'][0]['name'] }}</p>
                                    <p><strong>Contact details:</strong> {{ $orderItem['shipment'][0]['phone'] }}</p>
                                    <p><strong>Email:</strong> {{ $orderItem['shipment'][0]['email'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div> 
                </a> 
            </div> 
            @endforeach
        @endif
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
