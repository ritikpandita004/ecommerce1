<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ekart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #1f1f1f; 
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #000; 
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-logo {
            display: flex;
            align-items: center;
        }

        .navbar-logo img {
            height: 30px; 
            margin-right: 10px;
        }

        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            text-align: center;
            display: flex; /* Adjusted */
            align-items: center; /* Adjusted */
        }

        .navbar ul li {
            margin: 0 10px; /* Adjusted */
        }

        .navbar ul li a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
        }

        .navbar ul li a:hover {
            background-color: #333;
        }

        /* Dropdown Styles */
        .profile-dropdown {
            position: relative;
            cursor: pointer;
        }

        .profile-icon {
            font-size: 24px;
            color: white; 
            border-radius: 50%; 
            background-color:black; 
            padding: 10px; 
        }

        .profile-dropdown-content {
            display: none;
            position: absolute;
            background-color: black; /* Change background color */
            min-width: 160px;
            z-index: 1;
            top: calc(100% + 10px); 
            right: 0; 
            border-radius: 5px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        }

        .profile-dropdown:hover .profile-dropdown-content {
            display: block;
        }

        .profile-dropdown-content a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
        }

        .profile-dropdown-content a:hover {
            background-color: #555;
        }

        /* Additional Dropdown Styles */
        .dropdown select {
            background-color: black;
            color: white;
            border: none;
            padding: 10px 20px;
        }

        .dropdown select:hover {
            background-color: #333;
        }

        /* Media Queries for Responsive Design */
        @media screen and (max-width: 768px) {
            .navbar {
                padding: 10px; /* Adjusted */
            }
            .navbar ul {
                flex-direction: column; /* Adjusted */
                align-items: center; /* Adjusted */
            }
            .navbar ul li {
                margin: 10px 0; /* Adjusted */
            }
            .profile-dropdown {
                margin-right: 0;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-logo">
            <a href="/homepage">
                <img src="image/ekart.webp" alt="E-Kart Logo">
            </a>
        </div>
        <ul>
            <li><a href="/homepage">Home</a></li>
            <li class="dropdown">
                <select onchange="location = this.value;">
                    <option value="#">Category</option>
                    <option value="{{ route('createcategory') }}">Add Category</option>
                    <option value="{{ route('categoryView') }}">View Category</option>
                </select>
            </li>
            <li class="dropdown">
                <select onchange="location = this.value;">
                    <option value="#">Brand</option>
                    <option value="/createbrand">Add Brand</option>
                </select>
            </li>
            <li class="dropdown">
                <select onchange="location = this.value;">
                    <option value="#">Products</option>
                    <option value="{{ route('CreateProduct') }}">Add a new Product</option>
                    <option value="/viewproducts">View Products</option>
                </select>
            </li>
            <li class="profile-dropdown">
                <i class="fas fa-user profile-icon"></i> 
                <div class="profile-dropdown-content">
                    <a href="{{ route('queries') }}">Queries</a>
                    <a href="{{ route('logout') }}">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
</body>
</html> 












































{{-- 

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ekart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-12">
    <nav class="navbar navbar-expand-lg bg-body-tertiary ">
        <div class="container-fluid">
          <a class="navbar-brand" href="/homepage"><img src="image/ekart.webp"width='100' alt="E-Kart Logo"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/homepage">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Category
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('createcategory') }}">Add Category</a></li>
                  <li><a class="dropdown-item" href="{{ route('categoryView') }}">View Category</a></li>
               
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Products
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('CreateProduct') }}">Add a new Product</a></li>
                  <li><a class="dropdown-item" href="/viewproducts">View Products</a></li>
               
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Admin
                </a>
                <ul class="dropdown-menu">
                
                  <li><a class="dropdown-item" href="{{ route('queries') }}">Queries</a></li>
                  <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>

               
                </ul>
              </li>
             
            </ul>
        
          </div>
        </div>
      </nav>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
  
</html> --}}