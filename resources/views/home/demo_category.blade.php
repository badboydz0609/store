@section('title','المتجر - المنتجات')

@include('home.header')

      <div class="pathpage" style="display: flex;margin-bottom: 15px;color: #787f82;color: #5dd5c4;">
      <a href="{{ url('/')}}" style="padding-left: 3px;font-size: medium;color: #5dd5c4;">المتجر</a>
      <a style="padding-left: 3px;font-size: medium;color: #5dd5c4;">&gt;</a>
      <a href="{{ url('demo_category',$category->id)}}"; style="padding-left: 3px;font-size: medium;color: #5dd5c4;">{{$category->category_name}}</a>
      </div>

<div class="product-grid" style="height: 412px;display: flex;padding-right: 0px;padding-left: 0px;border-radius: 15px;justify-content: space-around;width: 930px;margin-right: auto;margin-left: 0px;margin-bottom: 0px;">
    <div class="product-image" style="width: 30%;margin-top: auto;margin-bottom: auto;">
      <a href="{{ url('customer',$category->id)}}" class="image" style="">
        <img class="pic-1" src="/home/icons/Catagory/{{ $category->category_image }}"></a>

    </div>

    <table style="text-align: center;height: 300px;margin-top: auto;margin-bottom: auto;">
    <thead>
       <tr><th style="width: 200px;"> <h1 style="font-size: xxx-large;">التصنيف</h1></th>
      <th style="width: 200px;"><h1 style="font-size: xxx-large;">المنتجات</h1></th>
    </tr></thead>
      <tbody>
      <tr>



   <td><h1 style="color: #5dd5c4;">{{ $category->category_name }}</h1></td>

   <td><h1 style="color: #5dd5c4;">{{ $products_all }}</h1></td>

   </tr>
   </tbody>
   </table>
  </div>

@foreach ($products->where('categ_id', $category->id)->where('product_action', '1') as $product)
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
