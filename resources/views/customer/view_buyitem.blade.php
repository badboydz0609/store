@section('title','لوحة التحكم - المبيعات')

@include('customer.header')


@if ($productsbuy->count() > 0)

    @foreach ($productsbuy as $data)
        <div class="product">
            <img src="../home/img/{{$data->product_image}}" class="m-0" alt="صورة المنتج">
            <h3>المعرف : {{ $data->id }}</h3>
            <h3>{{ $data->product_name }}</h3>
            <h3 style="color: red;">الكمية : {{ $data->ptoducts_buy_product_quantity }}</h3>
            <button onclick="window.location.href='{{ url('show_buydetils',$data->id)}}'" class="edit-button">مشاهدة</button>
        </div>
    @endforeach

    @else
        <h3>لا يوجد مبيعات</h3>
    @endif
@include('customer.footer')
