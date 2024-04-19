@include('users/commons/header')

@if(session()->has('id'))
    @include('users/commons/loggedinnavbar')
@else
    @include('users/commons/navbar')
@endif

<div class="background-image-container" style="background-image: url('image/4-1.jpg'); height: 100vh; background-size: cover; background-position: center;">
</div>
{{-- <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="image/4-1.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="image/ecommerce.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="image/Cover_Image_6.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="image/ekart.webp" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div> --}}
@include('users/commons/footer')
    



