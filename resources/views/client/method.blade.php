@section('title','المتجر - الدفع')

@include('home.header')
<style>
    .m-0 {
    margin:0;
    }
    .input0 {
    font-size: 16px;
    border: 2px solid #5dd5c4;
    height: 50px;
    padding-right: 10px;
    border-radius: 6px;
    width: 30%;
    margin-top: 15px;
    }
    .form0 {
    font-size: 16px;
    border: 2px solid #5dd5c4;
    height: 50px;
    padding-right: 10px;
    }
    .submit0 {
    font-size: 16px;
    border: 2px solid #5dd5c4;
    text-align: center;
    cursor: pointer;
    height: 50px;
    padding-right: 10px;
    padding-left: 10px;
    margin-right: 3%;
    margin-top: 35px;
    width: 15%;
    color: white;
    background-color: #5dd5c4;
    border-radius: 6px;
    }
    .h0 {
    color: #5dd5c4;
    }

    .section0 {
    text-align: center;
    font-size: 19px;
    cursor: pointer;
    background-color: #fff;
    color: #5dd5c4;
    width: 30%;
    height: 50px;
    border: 2px solid #5dd5c4;
    margin-top: 15px;
    margin-left: 3%;
    margin-right: 15%;
    border-radius: 6px;
    }
    .input_form {
        border: 1px solid #ccc;
        background-color: #f5f5f5;
        border-radius: 5px;
        margin-bottom: 20px;
        padding: 10px;
    }
    </style>
<style>
    .button {
        width: 10%;
        font-size: 16px;
        padding: 10px;
        background-color: #fff;
        border: 2px solid #5dd5c4;
        text-align: center;
        cursor: pointer;
        border-radius: 6px;
        height: 50px;
        margin-left: 20px;
        margin-right: auto;
        margin-top: 50px;
    }
    .button a {
        color: #5dd5c4;
    }
    </style>

<div class="container" style="margin-top: 50px;">
    <div class="table-responsive cart_info" style="margin-top: 50px;">
    <table class="table table-condensed" style="border: 1px solid #e6e4df;">
    <thead style="height: 50px;font-size: x-large;background-color: aliceblue;">
    <tr class="cart_menu">
    <td class="image">العنصر</td>
    <td class="description">معلومات</td>
    <td class="price">السعر للوحدة</td>
    <td class="quantity">الكمية</td>
    <td class="total">السعر الإجمالي</td>
    </tr>
    </thead>
    <tbody>

        @foreach($cartItems as $cartItem)
            <tr>
                <td class="cart_product" style="padding-right: 10px;">
                    <a href="{{ url('demo-item/'.$cartItem->id_item) }}"><img alt="product_image" src="home/img/{{ $cartItem->product_image }}" style="width: 110px;height: 110px;"></a>
                </td>
            <td class="cart_description" style="padding-top: 20px;padding-right: 20px;padding-left: 20px;padding-bottom: 20px;font-size: x-large;">
            <h4><a href="{{ url('demo_item/'.$cartItem->id_item) }}" style="color: #5dd5c4;">{{ $cartItem->product_name }}</a></h4>
            <p>رقم المنتوج : {{ $cartItem->id_item }}</p>
            </td>
            <td class="cart_price" style="padding-top: 20px;font-size: x-large;">
            <p>{{ $cartItem->product_price }} د.ج </p>
            </td>
            <td class="cart_quantity" style="font-size: x-large;padding-top: 20px;">
            <div class="cart_quantity_button">
            <form method="POST" action="">
                @csrf
            <input class="cart_quantity_input" type="number" name="quantity" value="{{ $cartItem->quantity_item }}" autocomplete="off" size="2" step="1" min="1" lang="en" disabled>
            </form>
            </div>
            </td>
            <td class="cart_total" style="padding-top: 20px;font-size: x-large;">
            <p class="cart_total_price">{{ $cartItem->total_price }} د.ج </p>
            </td>

            </tr>
            @endforeach


                <tr>
                    <td class="cart_product" style="padding-right: 10px;">
                    </td>
                    <td class="cart_description" style="padding-top: 20px;padding-right: 20px;padding-left: 20px;padding-bottom: 20px;font-size: x-large;">
                    </td>
                    <td class="cart_price" style="padding-top: 20px;font-size: x-large;">
                    </td>
                    <td class="cart_quantity" style="font-size: x-large;padding-top: 20px;">
                    <p class="cart_quantity">{{ $totalQuantity }}</p>
                    </td>
                    <td class="cart_total" style="padding-top: 20px;font-size: x-large;">
                    <p class="cart_total_price">{{ $totalPrice }} د.ج </p>
                    </td>

                    </tr>

    </tbody>
    </table>
    </div>


</div>



    @if($data == 2)

    @foreach ($pyment as $pyment)
        <form action="" method="post">

            <input type="text" class="input0" placeholder="الإسم الكامل" value="{{ $pyment->cardholder_name }}" id="cardholder_name" name="cardholder_name" style="margin-right: 3%;margin-left: 15%;" required="" disabled>
            <input type="text" class="input0" placeholder="رقم البطاقة" value="{{ $pyment->card_number }}" id="card_number" name="card_number" style="margin-left: 3%;margin-right: 15%;" required="" disabled>
            <input type="text" class="input0" placeholder="العنوان البريدي" value="{{ $pyment->billing_address }}" id="billing_address" name="billing_address" style="margin-right: 3%;margin-left: 15%;" required="" disabled>
            <input type="text" class="input0" placeholder="الرمز البريدي" value="{{ $pyment->billing_zip }}" id="billing_zip" name="billing_zip" style="margin-left: 3%;margin-right: 15%;" required="" disabled>
        </form>
        @endforeach
        <div class="button" onclick="window.location.href='{{ route('pay',1)}}';">
            <a href="{{ route('pay',1)}}">الدفع</a>
        </div>
    @else
    @foreach ($info as $info)
            <form action="{{ route('pay_now') }}" method="post">
                @csrf

                <input type="text" class="input0" placeholder="الإسم الكامل" value="{{ $info->full_name }}" id="full_name" name="full_name" style="margin-right: 3%;margin-left: 15%;" required>
                <input type="text" class="input0" placeholder="العنوان البريدي" value="{{ $info->full_address }}" id="full_address" name="full_address" style="margin-left: 3%;margin-right: 15%;" required>
                <input type="text" class="input0" placeholder="الرمز البريدي" value="{{ $info->full_zip }}" id="full_zip" name="full_zip" style="margin-right: 3%;margin-left: 15%;" required>
                <input type="submit"class="submit0"  style="margin-left: 3%;margin-right: 15%;" value="الطلب الأن">
            </form>
            @endforeach
            <div class="button" onclick="window.location.href='{{ route('pay',2)}}';">
                <a href="{{ route('pay',2)}}">الدفع</a>
            </div>
    @endif

@include('home.footer')
