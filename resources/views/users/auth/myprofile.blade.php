@include('users/commons/header')
@include('users/commons/loggedinnavbar')

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #fff; /* Set entire page background to white */
    }

    .container {
        margin: 5rem auto; /* Center the form and add margin from top */
        padding: 20px; /* Add padding from all sides */
        max-width: 500px; /* Limit the form width */
        background-color: #fff;; /* Set blue background for the form */
        color: #fff; /* Set text color to white */
        border-radius: 10px; /* Add border radius for rounded corners */
    }

    .form-group {
        margin-bottom: 20px;
    }

    h1 {
        text-align: center; /* Center align the heading */
        padding: 10px; /* Add padding for the heading */
        background-color: #0056b3; /* Darker blue background for the heading */
        border-radius: 5px; /* Add border radius for rounded corners */
    }

    /* Add more styling as needed */
</style>

@csrf
<div class="container">
    <h1>MY PROFILE</h1>
    
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter your name" value="{{$data->name}}" readonly>
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" placeholder="Enter your email" value="{{$data->email}}" readonly>
    </div>
    <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number" value="{{$data->phone_number}}" readonly>
    </div>
    <div class="form-group">
        <label for="verification">Verification Status</label>
        <input type="text" class="form-control" id="verification" placeholder="{{ $data->is_email_verified == 1 ? 'Verified' : 'Not Verified' }}" readonly>
        <small id="verificationHelp" class="form-text text-muted">Your verification status will be displayed here.</small>
    </div>
    <a href="{{ route('updateView') }}">
        <button type="Edit" class="btn btn-primary">Update Profile</button>
    </a>
</div>

@include('users/commons/footer')
