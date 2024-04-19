@include('admin/commons/header')
@include('admin/commons/adminnavbar')



<div class="d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 150px);">
  
    <div class="card bg-dark text-white mt-5">
        <div class="card-body">
          
            <form action="{{route('StoreBrand')}}" method="POST">
                @csrf
                <fieldset>
                   {{-- <h1>ADD A NEW BRAND</h1> --}}
                    <div class="mb-3">
                        <label for="brandName" class="form-label">BRAND NAME</label>
                        <input type="text" id="brandName" name="brandName" class="form-control" placeholder="Brand Name">
                    </div>
                    <div class="mb-3">
                      
                        <select class="form-select form-select-lg" id="cat" name ="cat" aria-label="small select example">
                            <option selected>Category</option>
                            @foreach($data as $cat)
                            <option value="{{$cat->id}}"> {{$cat->name}}</option>
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
