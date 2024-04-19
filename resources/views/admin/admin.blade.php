@include('admin/commons/header')
    <form action="{{ route('adminlogin') }}" method="POST">
        @csrf
        <h1>Admin Login</h1>
        <div>
            <label for="email">Username:</label>
            <input type="text" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
@include('admin/commons/footer')
