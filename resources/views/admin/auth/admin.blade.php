@include('admin/commons/header')
@include('admin/commons/adminnavbar')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <form action="{{ route('adminlogin') }}" method="POST" class="p-4 border rounded bg-light">
                @csrf
                <h1 class="text-center mb-4">ADMIN LOGIN</h1>
                <div class="form-group">
                    <label for="email">Username:</label>
                    <input type="text" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-2">Login</button>
            </form>
        </div>
    </div>
</div>


@include('admin/commons/footer')
