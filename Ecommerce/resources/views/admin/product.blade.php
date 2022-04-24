<!DOCTYPE html>
<html lang="en">
  <head>
     @include('admin.css')

     <style>
         .title 
         {
         color:white;
         padding: 20px; 
         font-size: 25px;
         }

         label 
         {
             display:inline-block;
             width: 200px;
         }

         .input 
         {
             color:black;
         }
     </style>

  </head>
  <body>
       
  @include('admin.sidebar')
      <!-- partial -->

      @include('admin.navbar')

    
      <div class="container-fluid page-body-wrapper">
          <div class="container" align="center">

          <h2 class="title">Add product</h2>
          
    
          @if(session()->has('message'))
 
         <div class="alert alert-success">
         
          <button type="button" class="close" data-dismiss="alert">
         
          {{session()->get('message')}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

          X</button>
          </div>
         
          @endif


          <form action="{{url('uploadproduct')}}" method="POST" enctype="multipart/form-data">

          @csrf

          <div style="padding: 15px;">
          <label>Product title: </label>
          <input class="input" type="text" name="title" placeholder="Give a product title." required="">
          </div>

          <div style="padding: 15px;">
          <label>Price: </label>
          <input class="input" type="number" name="price" placeholder="Give a price." required="">
          </div>

          <div style="padding: 15px;">
          <label>Product description: </label>
          <input class="input" type="text" name="description" placeholder="Give a product description." required="">
          </div>

          <div style="padding: 15px;">
          <label>Quantity: </label>
          <input class="input" type="text" name="quantity" placeholder="Product Quantity:" required="">
          </div>

          <div style="padding: 15px;">
          <label>Product photo: </label>
          <input type="file" name="file">
          </div>
          
          <div style="padding: 15px;">
          <input class="btn btn-success" type="submit">
          </div>

          </form>
          </div>
     
     </div>
       
          @include('admin.script'))
  </body>
</html>