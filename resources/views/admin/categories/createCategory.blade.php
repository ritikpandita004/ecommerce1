@include('admin/commons/header')
@include('admin/commons/adminnavbar')

<style>
     body {
        background-color: #ffffff !important; /* Set body background color to white */
    }

    .container-fluid {
        background-color: #f8f9fa !important; /* Light background color */
        min-height: calc(100vh - 100px); /* Adjust height as needed */
        padding-top: 50px; /* Add top padding */
    }

    .form-wrapper {
        background-color: #fff !important; /* White background */
        padding: 30px; /* Add padding */
        border-radius: 10px; /* Add border radius */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add shadow */
    }

    .form-title {
        text-align: center; /* Center align the title */
        font-size: 24px; /* Increase font size */
        margin-bottom: 30px; /* Add space below the title */
    }

    .form-control {
        border-radius: 5px; /* Add border radius */
        border-color: #ced4da !important; /* Light border color */
    }

    .form-label {
        font-weight: bold; /* Make labels bold */
    }

    .btn-primary {
        border-radius: 5px; /* Add border radius */
    }
</style>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="form-wrapper">
                <h2 class="form-title">Add New Category</h2>
                <form action="{{ route('storeCategory') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category Name:</label>
                        <input type="text" class="form-control" id="categoryName" name="categoryName" required>
                    </div>
                    <div class="mb-3">
                        <label for="categoryDescription" class="form-label">Category Description:</label>
                        <textarea class="form-control" id="categoryDescription" name="categoryDescription" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="categoryImage" class="form-label">Category Image:</label>
                        <input type="file" class="form-control-file" id="categoryImage" name="categoryImage" accept="image/*" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('admin/commons/footer')
