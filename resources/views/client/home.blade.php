@section('title','لوحة التحكم')

@include('client.header')

<div style="display: block ruby;color: #5dd5c4;">
    <hr style="width: 15px;margin-bottom: 5px;border-color: #5dd5c4;">
    <h2 style="margin-bottom: 10px;margin-top: 10px;">الإحصائيات : </h2>
    <hr style="width: 86.2%;margin-bottom: 5px;border-color: #5dd5c4;">
</div>

<div style="display: inline-flex;width:100%;">

    <div class="product" style="margin-left: 10px;display: block;width: 24.5%;border: 1px solid #3b76ef;color: white;background-color: #3b76ef;">
        <h2 style="margin-bottom: 30px;margin-top: 5px;text-align: center;font-size: xx-large;"> المفضلة : </h2>
        <h3>{{ $fav_coun_all }} منتوج</h3>
    </div>

    <div class="product" style="margin-left: 10px;display: block;width: 24.5%;border: 1px solid #63c7ff;color: white;background-color: #63c7ff;">
        <h2 style="margin-bottom: 30px;margin-top: 5px;text-align: center;font-size: xx-large;">في السلة : </h2>
        <h3>{{ $salla_coun_all}} منتوج</h3>
    </div>

    <div class="product" style="margin-left: 10px;display: block;width: 24.5%;border: 1px solid #a66dd4;color: white;background-color: #a66dd4;">
        <h2 style="margin-bottom: 30px;margin-top: 5px;text-align: center;font-size: xx-large;">تم شرائها : </h2>
        <h3>{{ $buy_coun_all }} منتوج</h3>
    </div>

    <div class="product" style="margin-left: 10px;display: block;width: 24.5%;border: 1px solid #6dd4b1;color: white;background-color: #6dd4b1;">
        <h2 style="margin-bottom: 30px;margin-top: 5px;text-align: center;font-size: xx-large;">التعليقات : </h2>
        <h3>قريبا</h3>
    </div>

</div>

@include('client.footer')
