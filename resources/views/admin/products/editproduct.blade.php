@include('admin/commons/header')
@include('admin/commons/adminnavbar')
<style>
    body {
        background-color: white;
    }
</style>
            
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
           
            <h2>Edit Product</h2>
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
            <form action="{{ route('productupdate') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="id" id="id" value="{{ $data->id }}">
                </div>
                <div class="form-group">
                    <label for="productname">Product Name:</label>
                    <input type="text" class="form-control" id="productname" name="productname" value="{{ $data->productname }}" required>
                </div>
                <div class="form-group">
                    <label for="category_name">Category Name:</label>
                    <input type="text" class="form-control" id="category_name" name="category_name" value="{{ $catData->name }}" readonly>
                </div>
                <input type="hidden" id="category_id" name="category_id" value="{{ $catData->id }}">
                
                <div class="form-group">
                    <label for="brand">Brand:</label>
                    <input type="text" class="form-control" id="brand" name="brand" value="{{ $data->brand }}" disabled>
                    <input type="hidden" name="brand" value="{{ $data->brand }}">
                </div>
                    
                <div class="form-group">
                    <label for="productdescription">Product Description:</label>
                    <textarea class="form-control" id="productdescription" name="productdescription" rows="3" required>{{ $data->productdescription }}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Existing Image:</label><br>
                    <img src="{{ asset($data->image) }}" alt="Product Image" style="max-width: 200px;"><br>
                    <small class="form-text text-muted">Current image. You can upload a new one if needed.</small>
                    <input type="hidden" id="existing_image" name="existing_image" value="{{ $data->image }}">
                </div>
                
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file" id="image" name="image" accept="image/*" >
                    <br>
                    <small class="form-text text-muted">Please select an image file.</small>
                  </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $data->price }}" required>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Edit Product</button>
            </form>
        </div>
    </div>
</div>

@include('admin/commons/footer')
