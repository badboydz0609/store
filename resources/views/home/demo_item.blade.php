
@section('title','المتجر - المنتوج')

@include('home.header')

@if($demo_item)

<div class="pathpage" style="display: flex;margin-bottom: 15px;color: #787f82;color: #5dd5c4;margin-top: 30px;margin-right: 83px;">
<a href="{{ route('websitehome') }}" style="padding-left: 3px;font-size: medium;color: #5dd5c4;">المتجر</a>
<a style="padding-left: 3px;font-size: medium;color: #5dd5c4;">&gt;</a>
<a href="{{ url('demo_category/'.$categories_item->id) }}" style="padding-left: 3px;font-size: medium;color: #5dd5c4;">{{ $categories_item->category_name }}</a>
<a style="padding-left: 3px;font-size: medium;color: #5dd5c4;">&gt;</a>
<a href="{{ url('demo_item/'.$demo_item->id) }}" style="padding-left: 3px;font-size: medium;color: #5dd5c4;">{{ $demo_item->product_name }}</a>
</div>
<div class="container" style="margin-top: 0px;">
<div class="row" style="margin-top: 0;">

<div class="col-lg-5 col-md-12" style="direction: ltr;" >
<a href="home/img/{{ $demo_item->product_image }}">
<img alt="{{ $demo_item->product_name }}" src="../home/img/{{ $demo_item->product_image }}" style="width: 500px;height: 500px;border: 1px solid #5dd5c4;border-radius: 1%;">
</a>
</div>
<div class="col-lg-7 col-md-12">
<div class="product-details__info">
<div class="product-details__title">
<div class="title-wrapper">
<h1 class="title mb-10 " style="font-size:27px;">{{ $demo_item->product_name }}</h1>
<div class="price-wrapper-info price-wrapper--large product-main-price">
<span style="font-size: 16px;" >{{ $demo_item->product_price }} د.ج </span>
</div>
</div>
</div>
<article style="display: block;width: 100%;position: relative;overflow: hidden;margin-bottom: 50px !important;margin-top: 25px;">
<h1 style="margin-bottom: 5px;font-size: x-large;">وصف المنتج :</h1>
<p style="font-size: initial;">{{ $demo_item->product_description }}</p>
</article>
<div class="product-sections-wrapper">


    @if(auth()->check() && Auth::user()->role == 'client')
        <form class="form form--product-options product-details__options ajax" method="post" action="{{ url('/add_salla/'.$demo_item->id) }}">
	@else
        <form class="form form--product-options product-details__options ajax" method="post" action="{{ route('login') }}">
	@endif

@csrf

<div class="product-section product-section--has-label product-section--totals" style="display: block;">

<div style="display: block ruby;width: 700px;">
<div style="margin-bottom: 20px;margin-left: 400px;">
<label style="font-size: x-large;font-weight: bold;margin-left: 15px;">التاجر : </label>
<a style="font-size: large;font-weight: bold;margin-left: 15px;background-color: #5dd5c4;border-radius: 6px;padding: 0px 3px;color: white;" href="{{ url('customer/'.$cust_item->id) }}">{{$cust_item->name}}</a>
</div>
</div>


<div style="display: block ruby;width: 700px;">
<div style="margin-bottom: 20px;margin-left: 400px;">
<label style="font-size: x-large;font-weight: bold;margin-left: 15px;">التصنيف : </label>
<label style="font-size: large;font-weight: bold;margin-left: 15px;background-color: #5dd5c4;border-radius: 6px;padding: 0px 3px;color: white;">أجهزة إلكترونية</label>
</div>
<div class="favorite" style="display: block ruby;padding-top: 0px;padding-left: 5px;padding-bottom: 0px;padding-right: 5px;border-radius: 19px;font-size: 19px;border: 1px solid red;">
    <p>{{ $favorite_item }}</p>
    @if (auth()->check() && Auth::user()->role == 'client')
        @if (!$favorites_item)
            <a href="{{ url('add_favorite',$demo_item->id) }}" style="color: red;"><i class="fa fa-heart-o"></i></a>
        @else
            <a href="{{ url('add_favorite',$demo_item->id) }}" style="color: red;"><i class="fa fa-heart"></i></a>
        @endif
    @else
        <a href="{{ route('login') }}" style="color: red;"><i class="fa fa-heart-o"></i></a>
    @endif

</div> </div>
<div style="margin-bottom: 20px;">
<label style="font-size: x-large;font-weight: bold;margin-left: 15px;">الكمية</label>
</div>
</div>

<div class="product-section product-actions product-section--quantity  no-p mb-0 no-border" style="display: flex;">
<div class="qty-wrapper">

    @if ($demo_item->product_status == '1')
        <input type="number" min="1" step="1" max="{{ $demo_item->product_quantity }}" autocomplete="off"  value="1" name="quantity" lang="en" class="s-quantity-input hydrated" style="border: 1px solid black;padding: 6px;border-radius: 5px;font-size: 13px;">
        <input type="hidden" name="itemdemoid" value="{{ $demo_item->id }}">
    @endif

<!---->
</div>
<div class="flex-grow-1">
<!---->
<!---->

    @if ($demo_item->product_status)
        <button type="submit" class="undefined s-button-element s-button-btn s-button-solid s-button-wide s-button-primary s-button-loader-center" style="border-radius: 6px;background-color: #5dd5c4;padding-bottom: 1.5%;padding-top: 1.5%;font-size: 14px;width: 500px;border: 1px solid #5dd5c4;height: 34px;margin-right: 20px;;">
        <span class="s-button-text">إضافة للسلة</span>
        </button>
    @else
        <button type="submit" class="undefined s-button-element s-button-btn s-button-solid s-button-wide s-button-primary s-button-loader-center" style="border-radius: 6px;background-color: #5dd5c4;padding-bottom: 1.5%;padding-top: 1.5%;font-size: 14px;width: 500px;border: 1px solid #5dd5c4;height: 34px;margin-right: 20px;;" disabled>
        <span class="s-button-text">غير متوفر الان</span>
        </button>
    @endif

</div>
</div>
</form>
</div>
</div>

</div>
</div>


@else

@endif

@include('home.footer')
