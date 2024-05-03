@include('users/commons/header')

@if(session()->has('id'))
    @include('users/commons/loggedinnavbar')
@else
    @include('users/commons/navbar')
@endif
<style>
    /* CSS styles for success message */
    .alert {
        text-align: center; /* Center the text within the alert */
    }
</style>

@if(session('success'))
    <div id="success-message" class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="background-image-container" style="background-image: url('image/4-1.jpg'); height: 100vh; background-size: cover; background-position: center;">
</div>


@include('users/commons/footer')
<script>
    setTimeout(function() {
        var successMessage = document.getElementById('success-message');
        if (successMessage) {
            successMessage.style.display = 'none';
        }
    }, 5000);
</script>
