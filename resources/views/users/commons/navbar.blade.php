<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ekart</title>
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
            position: fixed; /* Set position to fixed */
            width: 100%; /* Take full width of the viewport */
            top: 0; /* Stick to the top of the viewport */
            z-index: 1000; /* Ensure it's on top of other elements */
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
        }

        .navbar ul li {
            display: inline;
        }

        .navbar ul li a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
        }

        .navbar ul li a:hover {
            background-color: #333;
        }

        .profile-dropdown {
            position: relative;
            display: inline-block;
            cursor: pointer;
            margin-right: 20px;
        }

        .profile-icon {
            font-size: 24px;
            color: white;
            border-radius: 50%;
            background-color: black;
            padding: 10px;
        }

        .profile-dropdown-content {
            display: none;
            position: absolute;
            background-color: #333;
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

        /* Media Queries for Responsive Design */
        @media only screen and (max-width: 600px) {
            .navbar ul {
                display: none;
            }

            .menu-icon {
                display: block;
                color: white;
                font-size: 20px;
                cursor: pointer;
            }

            .menu-icon:hover {
                background-color: #333;
            }

            .navbar ul.open {
                display: block;
                position: absolute;
                top: 60px; /* Adjust as needed */
                left: 0;
                width: 100%;
                background-color: #000;
            }

            .navbar ul.open li {
                display: block;
            }
        }

        /* Hide menu icon on larger screens */
        @media only screen and (min-width: 601px) {
            .menu-icon {
                display: none;
            }

            .navbar ul {
                display: flex !important; /* Ensure the menu items are visible */
            }
        }
    </style>
</head>
<body>
 
    <nav class="navbar">
        
        <div class="navbar-logo">
            <a href="/registerhomepage">
                <img src="image/ekart.webp" alt="E-Kart Logo">
            </a>
        </div>
        <div class="menu-icon">&#9776;</div>
       
        <ul>
            <li><a href="/registerhomepage">Home</a></li>
            <li><a href="/productswithoutauth">Products</a></li>
            <li><a href="/login">Login</a></li>
            <li><a href="/register">Register</a></li>
        </ul>
        
    </nav>

    <script>
        // JavaScript to toggle the menu
        document.querySelector('.menu-icon').addEventListener('click', function () {
            document.querySelector('.navbar ul').classList.toggle('open');
        });
    </script>
</body>
</html> 




























{{-- 
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        #red{
            background-color: brown;
            height: 100px;

        }

    </style>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:rgba(0, 0, 255, 0.76)">
        <div class="container-fluid">
          <a class="navbar-brand"  href="/registerhomepage"> <img src="image/ekart.webp" alt="E-Kart Logo" width="50"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/registerhomepage">Home</a>    
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/productswithoutauth">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/login">Login</a>
            </li>
            <li  class="nav-item">
                <a class="nav-link active" aria-current="page" href="/register">Register</a>
            </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html> --}}