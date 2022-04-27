<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')
  </head>
  <body>
       
  @include('admin.sidebar')
      <!-- partial -->

      @include('admin.navbar')

      <!-- partial -->
     
      <div style="padding-botto:30px;" class="container-fluid page-body-wrapper">

          <div class="container" align="center">

      <table>
          <tr style="background-color: grey;">
              <td style="padding:20px;">Title</td>
              <td style="padding:20px;">Description</td>
              <td style="padding:20px;">Quantity</td>
              <td style="padding:20px;">Price</td>
              <td style="padding:20px;">Image</td>
              <td style="padding:20px;">Update</td>
              <td style="padding:20px;">Delete</td>
 
          </tr>
         
                    @if (count($data)>0)
          @foreach($data as $product)
          <tr align="center" style="background-color: black;">

          @if(session()->has('message'))

         <div class="alert alert-success">

          <button type="button" class="close" data-dismiss="alert">

          {{session()->get('message')}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

          X</button>
          </div>

          @endif

              <td>{{$product->title}}</td>
              <td>{{$product->price}}</td>
              <td>{{$product->description}}</td>
              <td>{{$product->quantity}}</td>
              <td>
                  <img height="100" width="100" src="{{asset($product->image)}}">
              </td>

              <td>
                  <a class="btn btn-primary" href="{{url('updateview',$product->id)}}">Update</a>
              </td>
              <td>
                  <a class="btn btn-danger" href="{{url('deleteproduct',$product->id)}}">Delete</a>
              </td>
            </tr>
           @endforeach
           @else
              <tr>
                <td colspan="8" align="center">No Data Found :(</td>
          @endif
         
           
      </table>

</div>
</div>

          <!-- partial -->
       
          @include('admin.script'))
  </body>
</html>
