<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4 !important;
        }

        .container {
            width: 100%;
            padding: 20px;
            box-sizing: border-box;
        }

        h1 {
            color: #007bff; /* Changed heading color to blue */
            text-align: center;
            margin-bottom: 20px;
        }

        .product {
            display: flex;
            flex-wrap: wrap;
        }

        .product img {
    width: 300px; /* Fixed width */
    height: auto; /* Automatically adjust height to maintain aspect ratio */
    margin-bottom: 20px;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    cursor: zoom-in; /* Change cursor to indicate image can be zoomed */
}



        .product-info {
            flex: 1;
            padding-left: 20px;
        }

        .product-info h2 {
            margin-top: 0;
            color: #333;
        }

        .product-info p {
            color: #666;
            line-height: 1.5;
            margin-bottom: 10px;
        }

        .chip {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            background-color: #007bff;
            color: #fff;
            margin-bottom: 5px;
        }

        .btn {
            padding: 10px 20px;
            background-color: #007bff; /* Changed button color to blue */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        .btn-group {
            margin-top: 20px;
        }

        .btn-group button {
            margin-right: 10px;
        }
    </style>
</head>
@include('users/commons/loggedinnavbar')
<body>
    
<div class="container">
    <h1>Product Details</h1>
    @foreach ($productDetails as $item)
    <div class="product">
        <!-- Wrap the image in a link with a class "image-link" -->
        <a class="image-link" href="{{$item->image}}">
            <img src="{{$item->image}}" alt="Product Image 1">
        </a>
        <div class="product-info">
            <h2 style="color: #142bff;">{{$item->productname}}</h2> <!-- Changed heading color to blue -->
            <div class="chip">{{$item->c_name}}</div>
            <p><strong>Price:</strong>{{$item->price}}</p>
            <p><strong>Description:</strong> {{$item->productdescription}}</p>
            <p><strong>Availability:</strong> In Stock</p>
        </div>
    </div>
    @endforeach 
   
    <div class="btn-group">
        <form action="{{ route('storeCart') }}" method="post">
            @csrf
        <input type="hidden" name="p_id" value="{{ $item->id }}">
        <button type="submit" class="btn btn-primary add-to-cart-btn">Add to Cart</button>
        <a href="/shipment?p_id={{$item->id}}" class="btn">Buy Now</a>
    </form>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script>
    // Initialize Magnific Popup on the .image-link elements
    $(document).ready(function() {
        $('.image-link').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            closeBtnInside: false,
            fixedContentPos: true,
            mainClass: 'mfp-no-margins mfp-with-zoom',
            image: {
                verticalFit: true
            },
            zoom: {
                enabled: true,
                duration: 300
            }
        });
    });
</script>

</body>
</html>
