@section('title','لوحة التحكم - المنتجات')

@include('admin.header')

@foreach ($data as $data)
<div class="product">
<img src="../home/img/{{ $data->product_image}}" class="m-0" alt="صورة المنتج">
<h3>{{ $data->product_name}}</h3>
@if ( $data->product_action == '0')
<h3 style="color: red;">قيد المراجعة</h3>
<button onclick="window.location.href='{{ url('accept_product',$data->id)}}'" class="accept-button">قبول</button>
@else
<h3 style="color: green;">تم قبوله</h3>
@endif

<button onclick="window.location.href='{{ url('sup_product',$data->id)}}'" class="sup-button">حذف</button>
<button onclick="window.location.href='{{ url('show_product',$data->id)}}'" class="edit-button">مشاهدة</button>
</div>
@endforeach


</div>

@include('admin.footer')
