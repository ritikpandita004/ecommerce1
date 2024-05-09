@include('users/commons/header')
@include('users/commons/loggedinnavbar')
<style>
    body {
        background-color: #f0f2f5; /* Set background color of the body */
    }

    .sales-heading {
        font-weight: bold;
        text-align: center;
        margin-top: 20px;
        margin-bottom: 30px;
        font-size: 40px;
        color: #2874f0; /* Flipkart's blue color */
    }

    .card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between; /* Align cards with equal space between them */
        padding: 0 16px; /* Add padding to the container */
        max-width: 1200px; /* Set a maximum width to prevent overflow */
        margin: 0 auto; /* Center the container */
    }

    .custom-card {
        width: calc(25% - 20px); /* Set width for each card to occupy 25% of the container with some margin */
        margin-bottom: 20px; /* Add margin between cards */
        border-radius: 8px;
        overflow: hidden; /* Ensure no content overflows */
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
        background-color: #ffffff; /* Set background color of the card */
        transition: transform 0.2s ease-in-out;
        display: flex;
        flex-direction: column;
    }

    .custom-card:hover {
        transform: translateY(-5px); /* Add a slight lift effect on hover */
    }

    .card-img-top {
        width: 100%;
        max-height: 200px;
        object-fit: contain; /* Center-fit the image */
        border-radius: 8px; /* Rounded corners */
    }

    .product-info {
        padding: 16px;
    }

    .product-name {
        font-size: 16px;
        font-weight: bold;
        color: #212121; /* Dark text color */
        margin-bottom: 8px;
    }

    .product-description {
        font-size: 14px;
        color: #757575; /* Gray text color */
        margin-bottom: 8px;
    }

    .price {
        font-size: 16px;
        font-weight: bold;
        color: #2874f0; /* Flipkart's blue color */
        text-align: center; /* Center the price */
        margin-top: auto; /* Push the price to the bottom */
        padding: 16px;
        background-color: #f8f9fa; /* Set a background color for price container */
    }

    .add-to-cart-btn {
        background-color: #2874f0; /* Flipkart's blue color */
        color: #ffffff;
        border: none;
        border-radius: 4px;
        padding: 8px 16px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s ease;
        text-decoration: none; /* Remove underline from links */
    }

    .add-to-cart-btn:hover {
        background-color: #1e40af; /* Darker shade of blue on hover */
    }
</style>

<h1 class="sales-heading">Products</h1>
<div class="card-container">
    @foreach ($products as $item)
    <div class="custom-card">
        <a href="{{ route('userProductDetail', ['id' => $item->id]) }}" class="product-link" style="text-decoration: none;">
            <img src="{{ asset($item->image) }}" class="card-img-top" alt="{{ $item->name }}">
            <div class="product-info">
                <h5 class="product-name">{{ $item->productname }}</h5>
                <p class="product-description">{{ $item->productdescription }}</p>
            </div>
            <div class="price">Price: ₹{{ $item->price }}</div>
        </a>
    </div>
    @endforeach
</div>
@include('users/commons/footer')
