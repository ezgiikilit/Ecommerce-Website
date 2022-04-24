<!DOCTYPE html>
<html lang="en">
  <head>

  <base href="/public"> 

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
     

      @include('admin.navbar')

      <div class="container-fluid page-body-wrapper">
          <div class="container" align="center">

          <h2 class="title">Update product</h2>
          
    
          @if(session()->has('message'))
 
         <div class="alert alert-success">
         
          <button type="button" class="close" data-dismiss="alert">
         
          {{session()->get('message')}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

          X</button>
          </div>
         
          @endif


          <form action="{{url('updateproduct',$data->id)}}" method="POST" enctype="multipart/form-data">

          @csrf

          <div style="padding: 15px;">
          <label>Product title: </label>
          <input class="input" type="text" name="title" value="{{$data->title}}" required="">
          </div>

          <div style="padding: 15px;">
          <label>Price: </label>
          <input class="input" type="number" name="price" value="{{$data->price}}" required="">
          </div>

          <div style="padding: 15px;">
          <label>Product description: </label>
          <input class="input" type="text" name="description" value="{{$data->description}}" required="">
          </div>

          <div style="padding: 15px;">
          <label>Quantity: </label>
          <input class="input" type="text" name="quantity" value="{{$data->quantity}}" required="">
          </div>

          <div style="padding: 15px;">
          <label>Old Image: </label>
          <img style=" padding:10px; border:1px solid #999999; " height="100" width="100" src="/productimage/{{$data->image}}">
          </div>

          <div style="padding: 15px;">
          <label>Change the image:</label>
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