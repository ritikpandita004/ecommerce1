<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Black Navbar</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #1f1f1f; /* Light black background */
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #000; /* Dark black navbar */
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
            height: 30px; /* Adjust logo height as needed */
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

        /* Dropdown Styles */
        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #333; /* Dark gray dropdown background */
            min-width: 200px;
            z-index: 1;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu li {
            display: block;
        }

        .dropdown-menu li a {
            padding: 10px 20px;
            color: white;
            text-decoration: none;
        }

        .dropdown-menu li a:hover {
            background-color: #555; 
        }
    </style>
    
</head>
<body>
    <nav class="navbar">
        <div class="navbar-logo">
            <img src="image/ekart.webp" alt="E-Kart Logo">
            <!-- Replace "ekart-logo.png" with your actual logo path -->
        </div>
        <ul>
            <li><a href="/homepage">Home</a></li>
            <li>
                <select onchange="location = this.value;">
                    <option value="#">Category</option>
                    <option value="{{ route('createcategory') }}">Add Category</option>
                    <option value="{{ route('categoryView') }}">View Category</option>
                    <!-- Add more categories if needed -->
                </select>
            </li>
            <li>
                <select onchange="location = this.value;">
                    <option value="#">Brand</option>
                    <option value="/createbrand">Add Brand</option>
                    <!-- Add more brand options if needed -->
                </select>
            </li>
            <li>
                <select onchange="location = this.value;">
                    <option value="#">Products</option>
                    <option value="{{ route('CreateProduct') }}">Add a new Product</option>
                    <option value="/viewproducts">View Products</option>
                    <!-- Add more product options if needed -->
                </select>
            </li>
        </ul>
    </nav>
    
</body>
</html>
