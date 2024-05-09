@include('users/commons/header')
@include('users/commons/navbar')
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

    .add-to-cart-btn {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 20px;
        padding: 8px 16px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s ease;
        text-decoration: none; /* Remove underline from links */
    }

    .add-to-cart-btn:hover {
        background-color: #0056b3;
    }
</style>

<h1 class="sales-heading" style="font-weight: bold; text-align: center; margin-top: 20px; margin-bottom: 30px; font-size: 40px; background: linear-gradient(45deg, #007bff, #ffd700); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Products</h1>


<div class="container-fluid">
    <div class="row">
        @foreach ($data as $product)
        <div class="col-md-3 mb-4">
            
            <a href="{{ route('productsdetailswithoutauth', ['id' => $product->id]) }}" class="product-link" style="text-decoration: none;"> 
                <div class="card custom-card">
                    <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body product-info">
                        <h5 class="card-title product-name">{{ $product->productname }}</h5>
                        <p class="card-text product-description">{{ $product->productdescription }}</p>
                        <p class="card-text price">₹{{ $product->price }}</p>
                        
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@include('users/commons/footer')
