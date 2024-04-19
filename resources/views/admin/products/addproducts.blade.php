@include('admin/commons/header')
@include('admin/commons/adminnavbar')
<div class="container ">
  <div class="row justify-content-center">
    <div class="col-md-6">

      <div class="card bg-dark text-white mt-5">
        <div class="card-body">
          <form action="{{route('Storeproduct')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="productName">Product Name</label>
              <input type="text" class="form-control mb-2" id="productName" name="productName" required>
            </div>
            <div class="form-group">
              <label for="category">Category</label>
              <select class="form-select" id="category" name="category" required>
                <option selected>Select Category</option>
                @foreach($categories as $category)
                    
               
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="dropdown2">Brand</label>
              <select class="form-select" id="brand" name="brand" required>
              </select>

            </div>
            <div class="form-group mb-2">
              <label for="Description">Description</label>
              <input type="text" class="form-control mb-2" id="description" name="description" required>
            </div>
            <div class="form-group">
              <label for="image">Image</label>
              <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
              <small class="form-text text-muted">Please select an image file.</small>
          </div>
            <div class="form-group">
              <label for="Price">Price</label>
              <input type="text" class="form-control mb-2" id="price" name="price" required>
            </div>
            
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
@include('admin/commons/footer')
