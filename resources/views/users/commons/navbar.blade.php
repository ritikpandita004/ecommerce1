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
            
           
            <li><a href="/login">Login</a></li>
            <li><a href="/register">Register</a></li>
        
            
        </ul>
    </nav>
</body>
</html>

