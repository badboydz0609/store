@section('title','المتجر - الرئيسية')

@include('home.header')

@if(!isset($search_items))

    @foreach ($categories as $category)


        <div class="stripes-wrapper" style="margin-bottom: 10px;align-items: center;display: flex;flex-direction: row;justify-content: space-between;">
            <div class="btn-loader" style="  font-size: 20px;display: inline-block;background-color: #5dd5c4;border-radius: 4px;color: white;padding: 5px 10px;cursor: default;">{{$category->category_name}}</div>
            <div class="btn-loader" onclick="window.location.href='{{ url('demo_category',$category->id)}}'" style="display: inline-block;font-size: 14px;color: white;background-color: #5dd5c4;border-radius: 4px;padding: 5px 10px;cursor: pointer;">عرض المزيد</div>
        </div>

        @foreach ($categoryProducts[$category->id]->where('categ_id', $category->id) as $product)
            <div class="col-md-3 col-sm-6">
                <div class="product-grid">
                    <div class="product-image">
                        <a href="{{ url('demo_item',$product->id)}}" class="image">
                        <img class="pic-1" src="home/img/{{$product->product_image}}">
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
                            @if(auth()->check() && Auth::user()->role == 'client')
                                <a class="add-to-cart" href="{{ url('add_salla',$product->id)}}">إضافة إالى السلة</a>
                            @else
                                <a class="add-to-cart" href="#">إضافة إالى السلة</a>
                            @endif
                        @else
                            <a class="add-to-cart" href="#">غير متوفر الان</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

    @endforeach

@else

    @foreach ($search_items as $product)
        <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a href="{{ url('demo_item',$product->id)}}" class="image">
                    <img class="pic-1" src="home/img/{{$product->product_image}}">
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
                        @if(auth()->check() && Auth::user()->role == 'client')
                            <a class="add-to-cart" href="{{ url('add_salla',$product->id)}}">إضافة إالى السلة</a>
                        @else
                            <a class="add-to-cart" href="#">إضافة إالى السلة</a>
                        @endif
                    @else
                        <a class="add-to-cart" href="#">غير متوفر الان</a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
@endif

@include('home.footer')
