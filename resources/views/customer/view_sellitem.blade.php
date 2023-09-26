@section('title','لوحة التحكم - المنتجات')

@include('customer.header')

@foreach ($products as $data)
<div class="product">
<img src="../home/img/{{$data->product_image}}" class="m-0" alt="صورة المنتج">
<h3>{{ $data->product_name }}</h3>

@if ($data->product_action == '0')
<h3 style="color: red;">قيد المراجعة</h3>
@else
<h3 style="color: green;">تم قبوله</h3>
@endif

@if ($data->product_status == '0')
<h3 style="color: red;">تم شرائه</h3>
@else
<h3 style="color: green;">في المخزن</h3>
@endif

<button onclick="window.location.href='{{ url('sup_product/'.$data->id)}}'" class="sup-button">حذف</button>
<button onclick="window.location.href='{{ url('edit_product/'.$data->id)}}'" class="edit-button">تعديل</button>
</div>

@endforeach



<button onclick="window.location.href='{{ url('add_product')}}'" class="add-button">إضافة منتج جديد</button>

    </div>

@include('customer.footer')
