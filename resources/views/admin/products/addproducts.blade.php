@include('admin/commons/header')
@include('admin/commons/adminnavbar')
<style>
  body {
    background-color: white;
  }
</style>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card mt-5">
        <div class="card-body">
          <form action="{{ route('Storeproduct') }}" method="post" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <div class="form-group">
              <label for="productName">Product Name</label>
              <input type="text" class="form-control mb-2" id="productName" name="productName" value="{{ old('productName') }}" required>
            </div>
            <div class="form-group">
              <label for="category">Category</label>
              <select class="form-select" id="category" name="category" required>
                <option selected>Select Category</option>
                @foreach($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="dropdown2">Brand</label>
              <select class="form-select" id="brand" name="brand" required>
                <!-- Options for brand -->
              </select>
            </div>
            <div class="form-group mb-2">
              <label for="description">Description</label>
              <input type="text" class="form-control mb-2" id="description" name="description" value="{{ old('description') }}" required>
            </div>
            <div class="form-group">
              <label for="image">Image</label>
              <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
              <br>
              <small class="form-text text-muted">Please select an image file.</small>
            </div>
            <div class="form-group">
              <label for="price">Price</label>
              <input type="text" class="form-control mb-2" id="price" name="price" value="{{ old('price') }}" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@include('admin/commons/footer')
