@include('admin/commons/header')
@include('admin/commons/adminnavbar')

<style>
    body {
        background-color: #fff; /* Set body background color to white */
    }

    .custom-card {
        width: 100%; /* Set the width of the card to cover the entire screen */
        max-width: 220px; /* Set the maximum width of the card */
        height: auto; /* Let the height adjust according to content */
        margin: 0 auto; /* Center the cards horizontally */
        display: flex; /* Use flexbox to center the image */
        flex-direction: column; /* Align items in a column */
        align-items: center; /* Center items horizontally */
    }

    .custom-card img {
        width: 100%; /* Make the image responsive */
        max-width: 200px; /* Limit the maximum width of the image */
        height: auto; /* Let the height adjust according to the aspect ratio */
        object-fit: contain; /* Keep the aspect ratio and center the image */
        margin-bottom: 15px; /* Add space between the image and product info */
        padding: 10px; /* Add padding to the image */
    }

    .product-info {
        padding: 15px;
        text-align: center; /* Center the product info */
    }

    .product-name {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .product-description {
        font-size: 14px;
        margin-bottom: 10px;
    }

    .product-price {
        font-size: 16px;
        font-weight: bold;
        color: #ff5733; /* Change price color */
    }

    .sales-heading {
        text-align: center;
        color: #ff5733; /* Change heading color */
        margin-top: 20px;
        margin-bottom: 30px;
    }
</style>

<h1 class="sales-heading">Products</h1>

<div class="container-fluid">
    <div class="row">
        @foreach ($data as $product)
            <div class="col-md-3 mb-4">
                <div class="card custom-card">
                    <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="product-info">
                        <h6 class="product-name">{{ $product->productname }}</h6>
                        <p class="product-description">{{ $product->productdescription }}</p>
                        <p class="product-price">Price: {{ $product->price }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@include('admin/commons/footer')
