
<div  class="row justify-content-center pt-4" >
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="https://im.haberturk.com/2022/03/05/ver1646490618/3365242_810x458.jpg" alt="Card image cap">
  <div class="card-body">
    <h4 class="card-title">
    <?php

//api çekilirken örnek alınan yer: https://github.com/enesphp/php-tcmb-kur/blob/main/kurcek.php

$kurlar=simplexml_load_file("https://www.tcmb.gov.tr/kurlar/today.xml");
$dolar=$kurlar->Currency[0]->BanknoteBuying;
$euro=$kurlar->Currency[3]->BanknoteSelling;

$euro=str_replace(".", ",", $euro);

echo "1 ₺ = ".$euro." Euro";
?>
    </h4>
   
    <a href="https://www.tcmb.gov.tr/kurlar/today.xml" class="btn btn-primary">TCMB Kurlar Sayfası</a>
  </div>
</div>

<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="https://trthaberstatic.cdn.wp.trt.com.tr/resimler/1536000/dolardoviz-1537318_2.jpg" alt="Card image cap">
  <div class="card-body">
    <h4 class="card-title">
    <?php

//api çekilirken örnek alınan yer: https://github.com/enesphp/php-tcmb-kur/blob/main/kurcek.php

$kurlar=simplexml_load_file("https://www.tcmb.gov.tr/kurlar/today.xml");
$dolar=$kurlar->Currency[0]->BanknoteBuying;
$euro=$kurlar->Currency[3]->BanknoteSelling;

$dolar=str_replace(".", ",", $dolar);

echo  "1 ₺ = ".$dolar." Dolar";
?>
    </h4>
   
    <a href="https://www.tcmb.gov.tr/kurlar/today.xml" class="btn btn-primary">TCMB Kurlar Sayfası</a>
  </div>
</div>

</div>

<div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
           
              <form action="{{url('search')}}" method="get" class="form-inline" style="float:right; padding:10px;">
              @csrf  

              <input class="form-control" type="search" name="search" placeholder="Search">
              <input type="submit" value="Search" class="btn btn-outline-danger">
              
              </form>
           
           
            </div>
          </div>

         <!-- product item--->
        
          @foreach($data as $product)

          <div  class="col-md-4">
            <div class="product-item">
              <a href="#"><img style="height:200px;width:100%;" src="/productimage/{{$product->image}}" alt=""></a>
              <div class="down-content">
                <a href="#"><h4>{{$product->title}}</h4></a>
                <h6>${{$product->price}}</h6>
                <p>{{$product->description}}</p>

                <form action="{{url('addcart',$product->id)}}" method="POST">
                 
                @csrf

                 <div style="margin:0;padding:0;width:49%;float:left;">

                 <input type="number" value="1" min="1" class="form-control"  name="quantity">
                </div>

                 <div style="margin:0;padding:0;width:49%;float:right;">

                <input class="btn btn-outline-primary" type="submit" value="Add Basket">
              
                </div>
                
                <div style="clear:both;"></div>
                
              </form>

               <br>

                <ul  class="stars">
                  <li><i class="fa fa-star" style="color: #FFD700;"></i></li>
                  <li><i class="fa fa-star" style="color: #FFD700;"></i></li>
                  <li><i class="fa fa-star" style="color: #FFD700;"></i></li>
                  <li><i class="fa fa-star" style="color: #FFD700;"></i></li>
                  <li><i class="fa fa-star" style="color: #FFD700;"></i></li>
                </ul>
                <span style="color: #DAA520;">Reviews (10)</span>

              </div>
              
            </div>
          </div>
           
         
          @endforeach

          @if(method_exists($data,'links'))

          <div class="d-flex justify-content-center">

           {!! $data->links() !!}

          </div>

          @endif

        </div>
      </div>
    </div>