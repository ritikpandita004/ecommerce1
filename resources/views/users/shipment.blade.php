<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('users/commons/loggedinnavbar')
    <title>Shipment Details</title>
    <style>
        body, .container {
            background-color: #f8f9fa; /* Set background color */
            font-family: Arial, sans-serif; /* Set font family */
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .shipment-form {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 500px;
            width: 100%;
        }

        .shipment-form h2 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
        }

        input[type="text"],
        input[type="email"],
        textarea,
        input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        textarea:focus,
        input[type="tel"]:focus {
            border-color: #007bff;
            outline: none;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .btn-submit {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
            display: inline-block;
            text-align: center;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: red; /* Set color of error messages to red */
        }
    </style>
</head>
<body>

<div class="container">
    
    <form class="shipment-form" id="shipmentForm" action="{{route('shipmentOrderStore',['id' => $id])}}" method="POST">
        @csrf
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2>Shipment Details</h2>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea id="address" name="address" required>{{ old('address') }}</textarea>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" id="phoneNumber" name="phoneNumber" value="{{ old('phonenumber') }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        
        <button type="submit" class="btn-submit">Submit</button>
    </form>
</div>

</body>
</html>
