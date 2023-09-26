@section('title','لوحة التحكم')

@include('admin.header')

<div style="display: block ruby;color: #5dd5c4;">
    <hr style="width: 15px;margin-bottom: 5px;border-color: #5dd5c4;">
    <h2 style="margin-bottom: 10px;margin-top: 10px;">الإحصائيات : </h2>
    <hr style="width: 86.2%;margin-bottom: 5px;border-color: #5dd5c4;">
</div>
<div style="display: inline-flex;width:100%;">
<div class="product" style="margin-left: 10px;display: block;width: 24.5%;border: 1px solid #3b76ef;color: white;background-color: #3b76ef;">
    <h2 style="margin-bottom: 30px;margin-top: 5px;text-align: center;font-size: xx-large;"> المنتجات : </h2>
<h3>{{ $products_coun_all }}</h3>
</div>

<div class="product" style="margin-left: 10px;display: block;width: 24.5%;border: 1px solid #63c7ff;color: white;background-color: #63c7ff;">
    <h2 style="margin-bottom: 30px;margin-top: 5px;text-align: center;font-size: xx-large;">في السلة : </h2>
<h3>{{ $salla_coun_all}}</h3>
</div>

<div class="product" style="margin-left: 10px;display: block;width: 24.5%;border: 1px solid #a66dd4;color: white;background-color: #a66dd4;">
    <h2 style="margin-bottom: 30px;margin-top: 5px;text-align: center;font-size: xx-large;">تم بيعها : </h2>
<h3>{{ $buy_coun_all}}</h3>
</div>

<div class="product" style="margin-left: 10px;display: block;width: 24.5%;border: 1px solid #6dd4b1;color: white;background-color: #6dd4b1;">
    <h2 style="margin-bottom: 30px;margin-top: 5px;text-align: center;font-size: xx-large;">قيد المعالجة : </h2>
<h3>{{ $products_non_all}}</h3>
</div>


</div>

<div style="display: inline-flex;width:100%;">
    <div class="product" style="margin-left: 10px;display: block;width: 24.5%;border: 1px solid #ffc107;color: white;background-color: #ffc107;">
        <h2 style="margin-bottom: 30px;margin-top: 5px;text-align: center;font-size: xx-large;"> التصنيفات : </h2>
    <h3>{{ $catagories_coun_all }} تصنيف</h3>
    </div>

    <div class="product" style="margin-left: 10px;display: block;width: 24.5%;border: 1px solid #dc3545;color: white;background-color: #dc3545;">
        <h2 style="margin-bottom: 30px;margin-top: 5px;text-align: center;font-size: xx-large;"> الأعضاء : </h2>
    <h3>{{ $clients_coun_all }} عضو</h3>
    </div>

    <div class="product" style="margin-left: 10px;display: block;width: 24.5%;border: 1px solid #198754;color: white;background-color: #198754">
        <h2 style="margin-bottom: 30px;margin-top: 5px;text-align: center;font-size: xx-large;"> التجار : </h2>
    <h3>{{ $customers_coun_all }} تاجر</h3>
    </div>

    <div class="product" style="margin-left: 10px;display: block;width: 24.5%;border: 1px solid #6f42c1;color: white;background-color: #6f42c1">
        <h2 style="margin-bottom: 30px;margin-top: 5px;text-align: center;font-size: xx-large;">المسؤولين : </h2>
    <h3>{{ $adminstratuers_coun_all }} مسؤول</h3>
    </div>

    </div>



<div style="display: block ruby;color: #ffc107;">
    <hr style="width: 15px;margin-bottom: 5px;border-color: #ffc107;">
    <h2 style="margin-bottom: 10px;margin-top: 10px;">التصنيفات : </h2>
    <hr style="width: 87.8%;margin-bottom: 5px;border-color: #ffc107;">
</div>

<div>
    @foreach ($catagories as $catagorie)
        <div class="product" style="width: 24.5%;">
            <img src="../home/icons/Catagory/{{ $catagorie->category_image}}" class="m-0" alt="{{ $catagorie->category_name}}">
            <h3>{{ $catagorie->category_name}}</h3>
        </div>
    @endforeach
</div>

<div style="display: block ruby;color: #3b76ef;">
    <hr style="width: 15px;margin-bottom: 5px;border-color: #3b76ef;">
    <h2 style="margin-bottom: 10px;margin-top: 10px;">المنتجات : </h2>
    <hr style="width: 89%;margin-bottom: 5px;border-color: #3b76ef;">
</div>

<div>
    @foreach ($products as $product)
        <div class="product" style="width: 24.5%;">
            <img src="../home/img/{{ $product->product_image}}" class="m-0" alt="{{ $product->product_name}}">
            <h3>{{ $product->product_name}}</h3>
        </div>
    @endforeach
</div>

<div style="display: block ruby;color: #6f42c1;">
    <hr style="width: 15px;margin-bottom: 5px;border-color: #6f42c1;">
    <h2 style="margin-bottom: 10px;margin-top: 10px;">المسؤولين : </h2>
    <hr style="width: 87.8%;margin-bottom: 5px;border-color: #6f42c1;">
</div>

<div>
@foreach ($adminstratuers as $adminstratuer)
    <div class="product" style="width: 24.5%;">
        <img src="../home/icons/users/{{ $adminstratuer->profile_photo_path}}" class="m-0" alt="{{ $adminstratuer->name}}">
        <h3>{{ $adminstratuer->name}}</h3>
    </div>
@endforeach
</div>

    <div style="display: block ruby;color: #5dd5c4;">
        <hr style="width: 15px;margin-bottom: 5px;border-color: #5dd5c4;">
        <h2 style="margin-bottom: 10px;margin-top: 10px;">التجار : </h2>
        <hr style="width: 91.3%;margin-bottom: 5px;border-color: #5dd5c4;">
    </div>

<div>
    @foreach ($customers as $customer)
        <div class="product" style="width: 24.5%;">
            <img src="../home/icons/users/{{ $customer->profile_photo_path}}" class="m-0" alt="{{ $customer->name}}">
            <h3>{{ $customer->name}}</h3>
        </div>
    @endforeach
</div>

<div style="display: block ruby;color: #dc3545;">
    <hr style="width: 15px;margin-bottom: 5px;border-color: #dc3545;">
    <h2 style="margin-bottom: 10px;margin-top: 10px;">الأعضاء : </h2>
    <hr style="width: 89%;margin-bottom: 5px;border-color: #dc3545;">
</div>

<div>
@foreach ($clients as $client)
    <div class="product" style="width: 24.5%;">
        <img src="../home/icons/users/{{ $client->profile_photo_path}}" class="m-0" alt="{{ $client->name}}">
        <h3>{{ $client->name}}</h3>
    </div>
@endforeach
</div>
@include('admin.footer')
