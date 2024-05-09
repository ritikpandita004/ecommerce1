{{-- @include('users/commons/header')

@if(session()->has('id'))
    @include('users/commons/loggedinnavbar')
@else
    @include('users/commons/navbar')
@endif

<style>
    /* CSS styles for success message */
    .alert {
        text-align: center; /* Center the text within the alert */
    }
</style>

@if ($errors->any())
    <div id="error-message" class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div id="success-message" class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

<div class="background-image-container" style="background-image: url('image/4-1.jpg'); height: 100vh; background-size: cover; background-position: center;">
</div>

@include('users/commons/footer')

<script>
    // Function to remove the error messages after 2 seconds
    setTimeout(function() {
        var errorMessage = document.getElementById('error-message');
        if (errorMessage) {
            errorMessage.style.display = 'none';
        }
    }, 2000);

    // Function to remove the success message after 5 seconds
    setTimeout(function() {
        var successMessage = document.getElementById('success-message');
        if (successMessage) {
            successMessage.style.display = 'none';
        }
    }, 5000);
</script>
 --}}


 <!doctype html>
 <html lang="en">
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Ekart</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
 </head>
 <style>
    body{
        background-color: #f4f4f4 !important;
    }
 </style>
 <body>
 
 @include('users/commons/navbar')
 
 <!-- slider -->
 
 <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
   <div class="carousel-indicators">
     <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
     <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
     <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
   </div>
   <div class="carousel-inner">
     <div class="carousel-item active">
       <img src="image/Cover_Image_6.jpg" class="d-block w-100"style="height: 400px;"  alt="...">
       <div class="carousel-caption d-none d-md-block">
         <h5>Bags</h5>
         <p>All types of bags available at 50% discount.</p>
       </div>
     </div>
     <div class="carousel-item">
       <img src="image/headphones.jpeg" class="d-block w-100"style="height:400px;"  alt="...">
       <div class="carousel-caption d-none d-md-block">
         <h5>20% Off Our Premium Headphones!</h5>
         <p>Dive into unparalleled audio bliss with our premium headphones, now available at an exclusive 20% discount!</p>
       </div>
     </div>
     <div class="carousel-item">
       <img src="image/clothes.jpg" class="d-block w-100"style="height: 400px;"  alt="...">
       <div class="carousel-caption d-none d-md-block">
         <h5> Enjoy 20% Off Our Fashionable Clothing! </h5>
         <p class="text-light">Step up your fashion game with our trendy clothing collection, now available at an irresistible 20% discount!</p>
       </div>
     </div>
   </div>
   <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
     <span class="visually-hidden">Previous</span>
   </button>
   <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
     <span class="visually-hidden">Next</span>
   </button>
 </div>
 
 <div class="container fluid">
  
 <div class="row">
 
 <div class="col-12">
 
 <h1 class="text-center display-6 mt-5 mb-5">Welcome to ekart, your one-stop destination for quality products and exceptional service.</h1>
 
 </div>
 </div>
   <!-- features -->
   <div class="row justify-content-evenly">
     <div class="col-md-3 text-center mt-5">
       <h1><i class="bi bi-wrench-adjustable text-secondary"></i></h1>
       <h5>Returns and Exchange</h5>
       <p>All products come under 15 days of exchange and return.</p>
     </div>
 
     <div class="col-md-3 text-center mt-5">
       <h1><i class="bi bi-truck text-"></i></h1>
       <h5>Free shipment</h5>
       <p>Free shipment on orders above 300. The offer is applicabe for 1 order only. </p>
     </div>
 
     <div class="col-md-3 text-center mt-5">
       <h1><i class="bi bi-patch-check-fill text-primary"></i></h1>
       <h5>Verified Seller </h5>
       <p>All the sellers are verified in the platform.You can buy orginal products on 10 % discount </p>
     </div>
 
 
   </div>
 
   <div class="row justify-content-evenly pt-3 pb-5">
     <div class="col-md-5 mt-5 pt-3">
       <img src="image/pre.jpeg" class="img-fluid rounded-circle" style="max-width: 100%; max-height: 300px;" alt="">
 
 
     </div>
     <div class="col-md-5 mt-5 text-center mb-5 pt-3">
       <h5 class="mt-2"  >Our Services</h5>
       <div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
         <div class="progress-bar bg-success" style="width: 100%"></div>
       </div>
     
      <h5 class="mt-4"> Price </h5>
       <div class="progress" role="progressbar" aria-label="Warning example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
         <div class="progress-bar bg-warning " style="width: 100%"></div>
       </div>
       <h5  class="mt-4">Quality</h5>
       <div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
         <div class="progress-bar bg-info" style="width: 100%"></div>
       </div>
       <h5  class="mt-4">Collections</h5>
       <div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
         <div class="progress-bar bg-danger" style="width: 100%"></div>
       </div>
   
     </div>
   </div>
 
 
   <div class="row justify-content-evenly pt-2 pb-5" style="background-color:white">
     <div class="col-5 mt-5">
       <h3 class="m-4 text-center">Contact Form</h3>
       @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
       <form action="{{route('query')}}" method="POST" onsubmit="return validateForm()">
        @csrf
         <div class="mb-3 mt-5">
           <label for="Name" class="form-label">Name</label>
           <input type="text" class="form-control" id="name" id="name" name="name" >
         
         </div>
         
         <div class="mb-3 mt-5">
           <label for="exampleInputEmail1" class="form-label">Email address</label>
           <input type="email" class="form-control" id="exampleInputEmail1" name="email" id="email" aria-describedby="emailHelp">
           <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
         </div>
 
         <div class="container">
           <div class="form-group">
             <label for="exampleFormControlTextarea1">Message</label>
             <textarea  name="message" id="message" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
           </div>
         </div>
         
         
         
         <button type="submit" class="btn btn-primary mt-3 ">Submit</button>
       </form>
 
 
 
 
     </div>
 
 
 
 
 
     <div class="col-5 mt-5">
 
       <h3 class="text-center m-4">Address</h3>
       <p>E-40, Phase-8,<br> Industrial Area,<br> Sahibzada Ajit Singh Nagar,<br> Punjab 160071 <br><i class="bi bi-telephone"></i>: 914-541-072</p>
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3430.492921569769!2d76.68820470571521!3d30.704540226877373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fef35ff996629%3A0x56af50ec0799b622!2sTeleperformance%20Mohali!5e0!3m2!1sen!2sin!4v1715253726074!5m2!1sen!2sin" style="width:100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
 
     </div>
 
 
   </div>
 
 <!-- faq -->
 <div class="row justify-content-evenly pt-5 pb-5">
 <div class="col-md-10">
 
 <h3 class="text-center">FAQ</h3>
 <div class="accordion accordion-flush border" id="accordionFlushExample">
   <div class="accordion-item">
     <h2 class="accordion-header">
       <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        How secure is your online payment process?
       </button>
     </h2>
     <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
       <div class="accordion-body">We prioritize the security of our customers' transactions. Our e-commerce platform employs industry-standard encryption protocols to safeguard your sensitive information during online transactions. Additionally, we utilize trusted payment gateways that comply with stringent security measures to ensure a safe and secure payment process.</div>
     </div>
   </div>
   <div class="accordion-item">
     <h2 class="accordion-header">
       <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        What is your return and exchange policy?
       </button>
     </h2>
     <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
       <div class="accordion-body">We understand that sometimes purchases may not meet your expectations. That's why we offer a hassle-free return and exchange policy. If you're not completely satisfied with your purchase, you can return it within [10] days for a full refund or exchange, provided the item is in its original condition with tags attached. Please refer to our Returns & Exchanges page for detailed instructions and any exceptions.</div>
     </div>
   </div>
   <div class="accordion-item">
     <h2 class="accordion-header">
       <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
        How do you handle customer data and privacy?
       </button>
     </h2>
     <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
       <div class="accordion-body">Protecting our customers' privacy is paramount to us. We strictly adhere to data protection regulations and implement robust security measures to safeguard personal information collected during transactions and account creation. We do not sell or share customer data with third parties for marketing purposes. For more information on how we handle data, please refer to our Privacy Policy.</div>
     </div>
   </div>
 </div>
 
 
 </div>
 
 </div>
 
 
 
 </div>
 
 <!-- footer -->
 <div class="row justify-content-evenly bg-dark text-white pt-2 pt-4">
   
   <div class="col-md-3 pt-4 ">
     <h3 class="mb-2">Contact us</h3> 
     <p>E-40, Phase-8,<br> Industrial Area,<br> Sahibzada Ajit Singh Nagar,<br> Punjab 160071 <br><i class="bi bi-telephone"></i>: 914-541-072</p>
   </div>
  
  
  
   <div class="col-md-3 pt-4">
     <h3>Important Links</h3>
     <p >
       <a href="" class="link-light text-decoration-none">Home</a><br>
       <a href="" class="link-light text-decoration-none">Products</a><br>
       <a href="" class="link-light text-decoration-none">Services</a><br>
       <a href="" class="link-light text-decoration-none">Partners</a><br>
       <a href="" class="link-light text-decoration-none">Our team</a><br>
       <a href="" class="link-light text-decoration-none">Collaborations</a><br>
 
     </p>
   </div>
  
   <div class="col-md-3 pt-4">
     <h3>About us</h3>
     <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi possimus quisquam eum mollitia aliquid nihil vel repudiandae sunt at odit.</p>
 
   </div>
 
   <div class="row bg-secondary p-2">
 
     <div class="col-12">
       <p class="text-center">Copy Right 2021-2024. All rights reserved </p>
     </div>
   </div>
  
  </div>
 
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 <script>
    function validateForm() {
        var message = document.getElementById("message").value.trim();
        var name = document.getElementById("name").value.trim();
        var isValid = true; // Flag to track overall form validity

        if (message === "") {
            document.getElementById("errorMessage").style.display = "block";
            isValid = false; // Set flag to false if message is empty
        } else {
            document.getElementById("errorMessage").style.display = "none"; // Hide error message if message is not empty
        }

        if (name === "") {
            document.getElementById("errorName").style.display = "block";
            isValid = false; // Set flag to false if name is empty
        } else {
            document.getElementById("errorName").style.display = "none"; // Hide error message if name is not empty
        }

        return isValid; // Return the overall form validity
    }
</script>
 </body>
 </html> 
 