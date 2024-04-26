<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-kart</title>
    <!-- Link Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
        .profile-dropdown {
            position: relative;
            display: inline-block;
            cursor: pointer;
            margin-right: 20px;
        }

        .profile-icon {
            font-size: 24px;
            color: white; /* Human icon color set to white */
            border-radius: 50%; /* Make it a circle */
            background-color:black; /* Background color behind the icon */
            padding: 10px; /* Adjust padding */
        }

        .profile-dropdown-content {
    display: none;
    position: absolute;
    background-color: #333;
    min-width: 160px;
    z-index: 1;
    top: calc(100% + 10px); /* Adjusted top position */
    right: 0; /* Align dropdown content with the right edge of the profile icon */
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
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-logo">
            <a href="/">
                <img src="image/ekart.webp" alt="E-Kart Logo">
            </a>
            <!-- Replace "ekart-logo.png" with your actual logo path -->
        </div>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/aboutus">About</a></li>
            <li><a href="/contactus">Contact</a></li>
            <li><a href="{{route('usercategory')}}">Categories</a></li>
            <li><a href="{{route('userproduct')}}">Products</a></li>
            <li><a href="{{route('viewCart')}}">Cart</a></li>
            <li class="profile-dropdown">
                <i class="fas fa-user profile-icon"></i> <!-- Human icon -->
                <div class="profile-dropdown-content">
                    <a href="{{ route('orders') }}">Your Orders</a>
                    <a href="{{ route('myProfile') }}">View Profile</a>
                    <a href="{{ route('logout') }}">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
</body>
</html>
