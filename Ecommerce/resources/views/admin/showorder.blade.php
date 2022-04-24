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

    
      <div class="container-fluid page-body-wrapper">
          <div class="container" align="center">

          <table class="table table-light">
  <thead>
    <tr >
      <th scope="col">Customer Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Product Title</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

   @foreach($order as $orders)

  <tbody>
    <tr>
      <td>{{$orders->name}}</td>
      <td>{{$orders->phone}}</td>
      <td>{{$orders->address}}</td>
      <td>{{$orders->product_name}}</td>
      <td>{{$orders->quantity}}</td>
      <td>{{$orders->price}}</td>
      <td>{{$orders->status}}</td>
      <td><a class="btn btn-success" href="{{url('updatestatus',$orders->id)}}">Delivered</a></td>
    </tr>
@endforeach

        </div>
     </div>    
       
          @include('admin.script')
  </body>
</html>