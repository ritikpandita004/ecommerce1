@include('admin/commons/header')
@include('admin/commons/adminnavbar')

@csrf
<div class="row">
    
    @foreach ($data as $category)
    <div class="col-md-3 mt-2" >''
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">  {{$category->name}}
                </h5>
                <a href="#" class="btn btn-primary">Explore</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

@include('admin/commons/footer')