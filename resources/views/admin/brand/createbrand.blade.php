@include('admin/commons/header')

<style>
    body {
        background-color: white !important;
        padding-top: 70px; /* Adjust as needed */
    }

    .card {
        width: 500px; /* Increase width */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add shadow */
        border-radius: 10px; /* Add border radius */
    }

    .card-body {
        padding: 30px; /* Add padding */
    }

    .form-label {
        font-weight: bold; /* Make label bold */
    }

    .form-control {
        border: 1px solid #ced4da; /* Add border */
        border-radius: 5px; /* Add border radius */
        padding: 10px; /* Add padding */
        font-size: 16px; /* Increase font size */
    }

    .form-select {
        border: 1px solid #ced4da; /* Add border */
        border-radius: 5px; /* Add border radius */
        padding: 10px; /* Add padding */
        font-size: 16px; /* Increase font size */
    }

    .btn-primary {
        padding: 12px 20px; /* Increase padding */
        font-size: 18px; /* Increase font size */
        border-radius: 5px; /* Add border radius */
    }

    .brand-label {
        font-size: 20px; /* Increase font size */
        margin-bottom: 20px; /* Add space below the label */
    }
</style>

@include('admin/commons/adminnavbar')

<div class="d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 150px);">
    <div class="card bg-white text-dark mt-5">
        <div class="card-body">
            @if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
            <div class="brand-label">BRAND NAME</div>
            <form action="{{ route('StoreBrand') }}" method="POST">
                @csrf
                <fieldset>
                    <div class="mb-3">
                        <input type="text" id="brandName" name="brandName" class="form-control" placeholder="Brand Name">
                    </div>
                    <div class="mb-3">
                        <select class="form-select form-select-lg" id="cat" name="cat" aria-label="small select example">
                            <option selected>Category</option>
                            @foreach($data as $cat)
                            <option value="{{ $cat->id }}"> {{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>

@include('admin/commons/footer')
