@section('title','المتجر - الدفع')

@include('home.header')
<style>
.button {
    width: 20%;
    font-size: 16px;
    padding: 10px;
    background-color: #fff;
    border: 2px solid #5dd5c4;
    text-align: center;
    cursor: pointer;
    border-radius: 6px;
    height: 50px;
    margin-left: 10px;
    margin-right: 10px;
}

.button a {
    color: #5dd5c4;
}

.list0 {
    display: flex;
    justify-content: center;
    margin-bottom: 100px;
}

</style>
<div class="list0">
    <div class="button" onclick="window.location.href='{{ route('method',1)}}';">
        <a href="{{ route('method',1)}}">الدفع عند الإستلام</a>
    </div>

    <div class="button" onclick="window.location.href='{{ route('method',2)}}';">
        <a href="{{ route('method',2)}}">الدفع الإلكتروني</a>
    </div>
</div>


<div class="list0">
    <div class="button" onclick="window.location.href='{{ route('cart')}}';">
        <a href="{{ route('cart')}}">العودة للسلة</a>
    </div>

</div>
@include('home.footer')
