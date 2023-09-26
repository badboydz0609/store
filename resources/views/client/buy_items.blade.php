@section('title','لوحة التحكم - المشتريات')

@include('client.header')

@if ($data->count() > 0)
@foreach ($data as $buy)
    <div class="product">
        <h3>رقم العملية : {{ $buy->id }}</h3>
        <h3>كمية المنتوجات : {{ $buy->buy_quantity }}</h3>
        <h3>السعر الإجمالي : {{ $buy->buy_price }}</h3>
    </div>

    @foreach ($buy->products as $product)
        <div class="product">
            <img src="../home/img/{{ $product->product_image }}" class="m-0" alt="صورة المنتج">
            <h3>{{ $product->product_name }}</h3>
            <h3>السعر : {{ $product->ptoducts_buy_product_totalprice }}</h3>
            <h3>الكمية : {{ $product->ptoducts_buy_product_quantity }}</h3>
            <!--<button onclick="window.location.href='{{ url('show_product',$product->id)}}'" class="edit-button">مشاهدة</button>-->
        </div>
    @endforeach
@endforeach

@else
<h3>لا يوجد مشتريات</h3>
@endif




@include('client.footer')
