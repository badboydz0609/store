@section('title','لوحة التحكم - المفضلة')

@include('client.header')

@if ($data->count() > 0)
@foreach ($data as $data)
<div class="product">
<img src="../home/img/{{ $data->product_image}}" class="m-0" alt="صورة المنتج">
<h3>{{ $data->product_name}}</h3>
<h3>{{ $data->product_price}}</h3>

<button onclick="window.location.href='{{ url('sup_favorite',$data->id)}}'" class="sup-button">حذف</button>
<button onclick="window.location.href='{{ url('demo_item',$data->id)}}'" class="edit-button">مشاهدة</button>
</div>
@endforeach

@else
<h3>لا يوجد منتجات مفضلة</h3>
@endif

@include('client.footer')
