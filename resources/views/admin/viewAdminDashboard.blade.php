<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @include('admin/commons/adminnavbar')
    <!-- Add your CSS styles here if needed -->
    <style>
        /* Example CSS styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #fff; /* Set background color to white */
            margin: 0; /* Remove default margin */
            padding: 0; /* Remove default padding */
        }
        .container {
            margin-top: 50px;
            text-align: center; /* Center align content within container */
        }
        .text-center {
            margin-bottom: 20px;
            background-color: yellow;
            padding: 20px;
        }
    </style>
</head>

<body>
   

    <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="text-center mb-5">
                        <h1>ADMIN DASHBOARD</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
</body>
</html>
