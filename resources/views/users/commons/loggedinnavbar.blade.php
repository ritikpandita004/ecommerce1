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
            <li>
                <select onchange="dropdownRedirect(this)">
                    <option value="">Profile</option>
                    <option value="{{ route('myProfile') }}">View Profile</option>
                    <option value="{{ route('logout') }}">Logout</option>
                </select>
            </li>
        </ul>
    </nav>

    <script>
        function dropdownRedirect(select) {
            var selectedValue = select.value;
            if (selectedValue) {
                window.location.href = selectedValue;
            }
        }
    </script>
</body>
</html>
