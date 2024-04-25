@include('users/commons/header')
@include('users/commons/loggedinnavbar')

<style>
    /* Custom CSS styles */
    body {
        background-color: #ffffff; /* White background for the page */
    }

    .card-header {
        background-color: #007bff; /* Blue background */
        color: #ffffff; /* White text color */
        font-size: 24px; /* Increased font size for the header */
        font-weight: bold;
        padding: 15px 20px; /* Add padding to the header */
    }

    .card-body {
        background-color: #f8f9fa; /* Light grey background */
        padding: 20px;
    }

    .form-group {
        margin-bottom: 20px; /* Space between form groups */
    }

    label {
        font-weight: bold;
    }

    .btn-primary {
        background-color: #007bff; /* Primary button color */
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Darker color on hover */
        border-color: #0056b3;
    }

    /* Center the form */
    .center-form {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Full height of the viewport */
    }

    /* Add margin to the form */
    .form-container {
        margin: 20px;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top: 20px;">
            <div class="card">
                <div class="card-header">{{ __('UPDATE YOUR PROFILE') }}</div>

                <div class="card-body">
                    <form action="{{ route('updateProfle') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" class="form-control" id="name" placeholder="{{ __('Enter your name') }}" name="name" required value="{{$data->name}}">
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('Email address') }}</label>
                            <input type="email" class="form-control" id="email" placeholder="{{ __('Enter your email') }}" name="email" required value="{{$data->email}}" readonly> <!-- Add readonly attribute here -->
                        </div>
                        <div class="form-group">
                            <label for="phone">{{ __('Phone Number') }}</label>
                            <input type="tel" class="form-control" id="phone" placeholder="{{ __('Enter your phone number') }}" name="phone_number" required value="{{$data->phone_number}}">
                        </div>
                        <div class="form-group">
                            <label for="verification">{{ __('Verification Status') }}</label>
                            <input type="text" class="form-control" id="verification" placeholder="{{ $data->is_email_verified == 1 ? __('Verified') : __('Not Verified') }}" readonly>
                            <small id="verificationHelp" class="form-text text-muted">{{ __('Your verification status will be displayed here.') }}</small>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Update Profile') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Function to display a message when the email field is clicked
    function displayMessage() {
        alert("You cannot edit the email");
    }
</script>

@include('users/commons/footer')
