@include('admin/commons/header')
@include('admin/commons/adminnavbar')

<div class="container-fluid bg-white py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('storeCategory') }}" method="POST" enctype="multipart/form-data" class="my-5" style="width: 400px; height: 400px;">
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

@include('admin/commons/footer')
