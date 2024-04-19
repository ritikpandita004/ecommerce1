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
        width: 25%; /* Set width for each card to 25% */
    }

    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-img-top {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        height: 200px;
        object-fit: contain;
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
        height: 80px; /* Limit the height of the description */
        overflow: hidden; /* Hide overflow */
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
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%; /* Ensure the card body fills the entire height */
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
        overflow-x: auto;
        white-space: nowrap;
        display: flex; /* Use flexbox for the container */
    }

    .container .row {
        margin-right: -15px; /* Remove right margin for the last row to avoid extra space */
        margin-left: -15px; /* Remove left margin for the last row to avoid extra space */
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
                <a href="/productuser" class="btn btn-primary">Explore</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@include('users/commons/footer')
