<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/solid.css" integrity="sha384-DhmF1FmzR9+RBLmbsAts3Sp+i6cZMWQwNTRsew7pO/e4gvzqmzcpAzhDIwllPonQ" crossorigin="anonymous"/>
    <title>Sixteen Clothing HTML Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="/resources/views/User/home.blade.php"><h2>Sixteen <em>Clothing</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="/resources/views/User/home.blade.php">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="products.html">Our Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
              </li>

              <li class="nav-item">
              @if (Route::has('login'))  
                    @auth

                    <li class="nav-item">
                <a class="nav-link" href="{{url('showcart')}}"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;Basket[{{$count}}]</a>
              </li>
                     
                    <x-app-layout>
   
                     </x-app-layout> 

                    @else
                        <a class="nav-link" href="{{ route('login') }}" >Log in</a>

                        @if (Route::has('register'))
                        <li class="nav-item"> <a class="nav-link" href="{{ route('register') }}" >Register</a></li>
                        @endif
                    @endauth              
            @endif
              </li>
            <!-- ** Sadece login ve register görünen kısım **
               <li class="nav-item"> 
             @if (Route::has('login') && Route::has('register'))
                    @auth
                       
                       <li>  <a class="nav-link" href="{{ route('login') }}" >Log in</a> </li>

                         <li>  <a class="nav-link" href="{{ route('register') }}" >Register</a>  </li> 
                        @endif
                    @endauth 
      
                </li>  -->

            </ul>
          </div>
        </div>
      </nav>
      @if(session()->has('message'))
 
 <div style="height:50px; " class="alert alert-danger">
 
  <button style="text-align:center;" type="button" class="close" data-dismiss="alert">
 
   {{session()->get('message')}}

  X</button>
  </div>
 
  @endif

    </header>



<div style="padding:100px;" align="center"> 
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">Product Quantity</th>
      <th scope="col">Product Price</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <form action="{{url('order')}}" method="POST">

  @csrf

  @foreach($cart as $carts)

  <tbody>
    <tr>
      <td>
      <input type="text" name="productname[]" value="{{$carts->product_title}}" hidden>    
      {{$carts->product_title}}</td>

      <td>
      <input type="text" name="quantity[]" value="{{$carts->quantity}}" hidden>    
      {{$carts->quantity}}</td>

      <td>
      <input type="text" name="price[]" value="{{$carts->price }}" hidden>    
      {{$carts->price}}</td>
      <td><a class="btn btn-danger" href="{{url('delete',$carts->id)}}">Delete</a></td>
    </tr>
  </tbody>

  @endforeach

</table>
<button class="btn btn-dark">Confirm Order</button>
</div>

</form>


    <div  style="float:bottom; "> 
    <footer >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; 2020 Sixteen Clothing Co., Ltd.
            
            - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
