@section('title','المتجر - التاجر')


@include('home.header')

    <div class="product-grid" style="height: 412px;display: flex;padding-right: 0px;padding-left: 0px;border-radius: 15px;justify-content: space-around;width: 930px;margin-right: auto;margin-left: 0px;margin-bottom: 0px;">
      <div class="product-image" style="width: 30%;margin-top: auto;margin-bottom: auto;">
        <a href="{{ url('customer',$customers->id)}}" class="image" style="">
          <img class="pic-1" src="/home/icons/users/{{ $customers->profile_photo_path }}" style="border-radius: 50%;"></a>

      </div>
      <table style="text-align: center;height: 300px;margin-top: auto;margin-bottom: auto;">
      <thead>
         <tr><th style="width: 200px;"> <h1 style="font-size: xxx-large;">التاجر</h1></th>
        <th style="width: 200px;"><h1 style="font-size: xxx-large;">المنتجات</h1></th>
        <th style="width: 200px;"><h1 style="font-size: xxx-large;">المبيعات</h1></th>
      </tr></thead>
        <tbody>
        <tr>



     <td><h1 style="color: #5dd5c4;">{{ $customers->name }}</h1></td>

     <td><h1 style="color: #5dd5c4;">{{ $product_all }}</h1></td>


     <td><h1 style="color: #5dd5c4;">{{ $quan_buy->quan_buuy }}</h1></td>

     </tr>
     </tbody>
     </table>
    </div>

     @foreach ($products as $product)
    <div class="col-md-3 col-sm-6">
            <div class="product-grid">
            <div class="product-image">
            <a href="{{ url('demo_item',$product->id)}}" class="image">
            <img class="pic-1" src="../home/img/{{$product->product_image}}">
            </a>
            <span class="product-discount-label">{{$product->product_discount}}%</span>
            </div>
            <div class="product-content">
            <ul class="rating">
            @for ($i = 0; $i < (5 - $product->product_rating); $i++)
                <li class="far fa-star"></li>
            @endfor
            @for ($i = 0; $i < $product->product_rating; $i++)
                <li class="fas fa-star"></li>
            @endfor
            </ul>
            <h3 class="title"><a href="{{ url('demo_item',$product->id)}}">{{$product->product_name}}</a></h3>
            <div class="price">DA {{$product->product_price}}</div>

            @if($product->product_status)

            @auth
            <a class="add-to-cart" href="{{ url('add_salla',$product->id)}}">إضافة إالى السلة</a>
            @endauth
            @guest
            <a class="add-to-cart" href="#">إضافة إالى السلة</a>
            @endguest

            @else
            <a class="add-to-cart" href="#">غير متوفر الان</a>
            @endif

            </div>
            </div>
            </div>
@endforeach




@include('home.footer')
