<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ekart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Existing CSS styles */
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
