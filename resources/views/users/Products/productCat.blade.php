@include('users/commons/header')
@include('users/commons/loggedinnavbar')
<style>
    body {
        background-color: #fff;
    }

    .sales-heading {
        font-weight: bold;
        text-align: center;
        margin-top: 20px;
        margin-bottom: 30px;
        font-size: 40px;
        color: #007bff;
    }

    .custom-card {
        border: 1px solid #ddd;
        border-radius: 10px;
        transition: box-shadow 0.3s ease;
        margin-bottom: 20px;
        width: 300px; /* Set a fixed width for each card */
    }

    .custom-card:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-img-top {
    height: 200px;
    object-fit: contain; /* Center-fit the image within its container */
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

    .product-info {
        padding: 20px;
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
        text-decoration: none;
    }

    .add-to-cart-btn:hover {
        background-color: #0056b3;
    }

    /* Add a container to hold the cards horizontally */
    .card-container {
        display: flex;
        flex-wrap: wrap; /* Allow cards to wrap to the next line if needed */
        justify-content: space-between; /* Distribute space between cards */
        padding: 0 20px; /* Add some padding to the sides */
    }
</style>

<h1 class="sales-heading">Products</h1>
<div class="card-container">
    @foreach ($products as $item)
    <div class="card custom-card">
        <img src="{{ asset($item->image) }}" class="card-img-top" alt="{{ $item->name }}">
        <div class="product-info">
            <h5 class="product-name">{{ $item->productname }}</h5>
            <p class="product-description">{{ $item->productdescription }}</p>
            <p class="price"><strong>Price:</strong> ${{ $item->price }}</p>
            <a href="{{ route('storeCart') }}" class="add-to-cart-btn">Add to Cart</a>
        </div>
    </div>
    @endforeach
</div>
@include('users/commons/footer')
