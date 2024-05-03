<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Detail</title>
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8 !important;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            margin-bottom: 10px;
            text-align: center; /* Center align the text */
        }

        .owl-carousel {
            margin-bottom: 20px;
            width: 100%; /* Set carousel width to 100% */
            max-width: 500px; /* Limit maximum width */
            height: auto; /* Set height to auto for responsiveness */
        }

        .owl-item {
            display: flex;
            justify-content: center;
        }

        .owl-item img {
            max-width: 100%;
            max-height: 300px; /* Limit maximum height */
            width: auto;
            height: auto;
        }

        .order-details {
            margin-bottom: 20px;
        }

        .order-details p {
            margin: 5px 0;
        }
        .order-items tbody tr:hover {
        background-color: lightgray; 
       
        }
        .order-items {
            margin-bottom: 20px;
        }

        .order-items table {
            width: 100%;
            border-collapse: collapse;
        }

        .order-items th,
        .order-items td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .order-items th {
            background-color: #f2f2f2;
        }

        .order-total {
            margin-top: 20px;
            text-align: right; 
        }

        
        .carousel-control-prev,
        .carousel-control-next {
            width: 40px; 
            height: 40px; 
            background: rgba(0, 0, 0, 0.5); 
            border-radius: 50%; 
            border: none; 
            font-size: 30px !important; 
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            font-size: 20px; 
            color: #fff; 
        }

     
        .carousel-indicators {
            bottom: 5px; 
        }

      
        .order-items a.order-item {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
    </style>
    
    @include('users/commons/loggedinnavbar')
</head>
<body>
@foreach ($orderData as $orderItem)

<div class="container">
    <h2>Order Summary</h2>
   
    <div class="order-img-carousel">
     
      <div id="carouselExampleIndicators{{ $loop->iteration }}" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
              <div class="owl-carousel">
                  @foreach ($orderItem['products'] as $key => $product)
                      <div class="carousel-item{{ $key == 0 ? ' active' : '' }}">
                          <img src="{{ $product['image'] }}" class="d-block" alt="Product Image">
                      </div>
                  @endforeach
              </div>
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
    <div class="order-details">
        <p><strong>Order Number:</strong> #{{ $orderItem['order']['id'] }}</p>
       <?php
          $dateTime = $orderItem['order']['created_at'];
          $date = date('Y-m-d', strtotime($dateTime));
          $time = date('H:i:s', strtotime($dateTime));
          
          echo "<p><strong>Order Date:</strong> $date</p>";
          echo "<p><strong>Order Time:</strong> $time</p>";
          ?></p>
            <p><strong>Name:</strong>
                {{ $orderItem['shipment'][0]['name'] }}<br>
             <p><strong>Email:</strong>
              {{ $orderItem['shipment'][0]['email'] }}<br>
              <p><strong>Contact details:</strong>
                {{ $orderItem['shipment'][0]['phone'] }}<br>
                <p><strong>Shipping Address:</strong>
                    {{ $orderItem['shipment'][0]['address'] }}<br>
        </p>
    </div>

    <div class="order-items">
        <h3>Items Ordered:</h3>
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $subtotal = 0; // Initialize subtotal variable
                @endphp
                @foreach ($orderItem['products'] as $product)
                <tr>
                  <td><a href="{{ route('productdetails', ['product_id' => $product['id'] ]) }}" class="order-item">{{ $product['productname'] }}</a></td>

                    <td>
                      @if (isset($product['p_id']))
                          <?php
                    
                          $quantities = explode(',', $product['p_id']);
                          $totalQuantity = array_sum($quantities);
                          echo $totalQuantity;
                          ?>
                      @else
                          {{ $product['quantity'] }}
                      @endif
                  </td>
                  <td>
                    {{ $product['price'] }}
                    @php
                        $subtotal += $product['price']; 
                    @endphp
                  </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="order-total">
        <p><strong>SubTotal:</strong> ₹ {{ $subtotal }}</p>
    </div>
    <div class="order-total">
        <p><strong>Tax:</strong> ₹ {{ ($subtotal * 10) / 100 }}</p>
    </div>
    <div class="order-total">
        <p><strong>Total Amount:</strong> ₹ {{ number_format($orderItem['order']['amount'],) }}</p>
    </div>
</div>
@endforeach

<!-- Owl Carousel JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $(document).ready(function(){
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            items: 1
        });
    });
</script>

</body>
</html>
