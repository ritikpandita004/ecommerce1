@include('users/commons/header')
@include('users/commons/loggedinnavbar')

<style>
    body {
        background-color: #fff;
    }

    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease;
        background-color: #fff;
        width: 100%; /* Set width for each card to 100% */
        margin-bottom: 20px; /* Add margin between cards */
    }

    .card-img-top {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        height: 200px;
        object-fit: cover; /* Change to cover for better image scaling */
        margin: auto;
        display: block;
    }

    .card-title {
        font-weight: bold;
        font-size: 20px;
        color: #333;
        margin-bottom: 10px;
    }

    .card-text {
        color: #666;
        margin-bottom: 15px;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        border-radius: 20px;
        padding: 10px 20px;
        font-size: 16px;
        transition: background-color 0.3s ease;
        width: 100%;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .card-body {
        padding: 15px;
    }

    .category-heading {
        font-weight: bold;
        text-align: center;
        margin-top: 20px;
        margin-bottom: 30px;
        font-size: 40px;
        color: #007bff;
    }

    .container {
        padding: 0 15px; /* Add padding to the container */
    }

    .container .row {
        display: flex;
        flex-wrap: wrap; /* Ensure cards wrap to the next line on small screens */
        margin: 0 -10px; /* Add negative margin to compensate for padding */
    }

    .card {
        flex: 0 0 calc(50% - 20px); /* Show two cards per row on small screens */
        margin: 0 10px; /* Add margin between cards */
    }

    @media (min-width: 768px) {
        .card {
            flex: 0 0 calc(25% - 20px); /* Show four cards per row on larger screens */
        }
    }
</style>

<h1 class="category-heading">Categories</h1>

<div class="container" style="background-color: #fff;">
    <div class="row">
        @foreach ($data as $category)
        <div class="card">
            <img src="{{asset($category->image)}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$category->name}}</h5>
                <p class="card-text">{{$category->categoryDescription}}</p>
                <a href="{{ route('catproductview', ['category_id' => $category->id]) }}" class="btn btn-primary">Explore</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@include('users/commons/footer')
