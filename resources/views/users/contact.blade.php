<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ekart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff !important; /* Set background color of the whole page to white */
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="email"],
        textarea {
    width: 100%;
    max-width: 100%;
    min-width: 200px; /* Set minimum width to 200 pixels or adjust as needed */
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    overflow-wrap: break-word;
}
        textarea {
            height: 100px;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }

        .error-message {
            color: red;
        }
    </style>
    @include('users/commons/loggedinnavbar')
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center mt-5 mb-4">Drop Your Query</h1>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                <form id="queryForm" action="{{route('query')}}" method="POST" onsubmit="return validateForm()">
                    @csrf

                    <input type="text" name="name" placeholder="Your Name" id="name" required>
                    <div id="errorName" class="error-message" style="display:none;">Please enter a name.</div> <!-- Changed class to error-message -->
                    <input type="email" name="email" placeholder="Your Email" id="email" required>
                    <textarea name="message" id="message" placeholder="Your Message" required></textarea>
                    <div id="errorMessage" class="error-message" style="display:none;">Please enter a message.</div>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
    <script>
        function validateForm() {
            var message = document.getElementById("message").value.trim();
            var name = document.getElementById("name").value.trim();
            var isValid = true; // Flag to track overall form validity
    
            if (message === "") {
                document.getElementById("errorMessage").style.display = "block";
                isValid = false; // Set flag to false if message is empty
            } else {
                document.getElementById("errorMessage").style.display = "none"; // Hide error message if message is not empty
            }
    
            if (name === "") {
                document.getElementById("errorName").style.display = "block";
                isValid = false; // Set flag to false if name is empty
            } else {
                document.getElementById("errorName").style.display = "none"; // Hide error message if name is not empty
            }
    
            return isValid; // Return the overall form validity
        }
    </script>
    

</body>
</html>
