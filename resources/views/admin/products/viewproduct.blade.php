@include('admin/commons/header')
@include('admin/commons/adminnavbar')

<style>
   
    body {
        background-color: #fff;
    }

    .custom-card {
        width: 100%;
        max-width: 220px;
        height: 100%; /* Changed height to 100% to ensure cards are of equal height */
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between; /* Added to vertically center the content */
        border: 1px solid #ccc; /* Added border for visual separation */
        border-radius: 10px; /* Added border radius for card corners */
        padding: 10px; /* Added padding for spacing */
    }

    .product-info {
        padding: 15px;
        text-align: center;
    }

    .product-name {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 5px;
        color: black; 
    }

    .product-description {
        font-size: 14px;
        margin-bottom: 10px;
        max-height: 60px;
        overflow: hidden;
        text-overflow: ellipsis;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        display: -webkit-box;
        color: black; 
    }

    .product-price {
        font-size: 16px;
        font-weight: bold;
        color: #ff5733;
    }

    .sales-heading {
        text-align: center;
        color: #ff5733;
        margin-top: 20px;
        margin-bottom: 30px;
    }
    
    .product-links {
        display: flex; /* Changed to flex to align links horizontally */
        justify-content: space-around; /* Added to evenly space the links */
        width: 100%; /* Added to ensure links take full width */
        margin-top: auto; /* Added to push links to the bottom of the card */
    }

    .product-links > a {
        padding: 8px 16px;
        margin: 0 5px; /* Added margin between buttons */
        background-color: #ff5733;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
        list-style-type: none; /* Remove default list style */
        border: none; /* Remove default border */
        outline: none; /* Remove default outline */
    }

    .product-links > a:hover {
        background-color: #e84545;
    }

    /* Center align the alert message */
    .alert {
        text-align: center;
    }
</style>

@if(session('success'))
    <div id="success-message" class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

<h1 class="sales-heading">Products</h1>
<div class="container-fluid">
    <div class="row">
        @foreach ($data as $product)
            <div class="col-md-3 mb-4">
                <a href="{{ route('adminproductdetails', ['id' => $product->id]) }}" class="product-link" style="text-decoration: none;"> 
                    <div class="card custom-card">
                        <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="product-info">
                            <h6 class="product-name">{{ $product->productname }}</h6>
                            <p class="product-description">{{ $product->productdescription }}</p>
                            <p class="product-price">Price: {{ $product->price }}</p>
                            <div class="product-links">
                                <a href="{{ route('productedit', ['product_id' => $product->id]) }}">Edit</a>
                                <a href="{{ route('productdelete', ['product_id' => $product->id]) }}">Delete</a>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

@include('admin/commons/footer')
<script>
    setTimeout(function() {
        var successMessage = document.getElementById('success-message');
        if (successMessage) {
            successMessage.style.display = 'none';
        }
    }, 5000);
</script>
