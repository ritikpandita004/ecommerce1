@include('admin/commons/header')
@include('admin/commons/adminnavbar')

<style>
   
   body {
        background-color: #fff; /* Set background color of the body to white */
    }

    .sales-heading {
        font-weight: bold;
        text-align: center;
        margin-top: 20px;
        margin-bottom: 30px;
        font-size: 40px;
        color: #007bff; /* Blue color */
    }

    .custom-card {
        border: 1px solid #ddd;
        border-radius: 10px;
        transition: box-shadow 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .custom-card:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-img-top {
        height: 200px; /* Set a fixed height for the images */
        object-fit: contain; /* Ensure the image fits within the container */
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        margin: 10px auto 0; /* Center the image horizontally and add margin from top */
        display: block;
    }

    .product-info {
        text-align: center;
        padding: 20px;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .product-name {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
        color: #333;
    }

    .product-description {
        font-size: 14px;
        color: #666;
        margin-bottom: 10px;
    }

    .price {
        font-size: 16px;
        font-weight: bold;
        color: #007bff;
        margin-bottom: 10px;
    }

    .sales-heading {
        text-align: center;
        color: #ff5733;
        margin-top: 20px;
        margin-bottom: 30px;
    }
    
    
    .product-links > a {
    display: block; /* Change display property to block */
    width: 100px; /* Set a fixed width for the link */
    margin: 0 auto; /* Center the link horizontally */
    padding: 8px 16px;
    margin-top: 10px; /* Add some top margin for spacing */
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
