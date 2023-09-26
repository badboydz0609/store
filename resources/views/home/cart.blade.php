@section('title','المتجر - السلة')

@include('home.header')
<style>
.button {
    width: 100%;
    font-size: 16px;
    padding: 10px;
    background-color: #fff;
    border: 2px solid #5dd5c4;
    text-align: center;
    cursor: pointer;
    border-radius: 6px;
    height: 50px;
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
    <td style="text-align: center;">إلغاء</td>
    </tr>
    </thead>
    <tbody>

    @if (!($cartItems->isEmpty()))
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
            <form method="POST" action="{{ url('edit_cart_item') }}">
                @csrf
            <input class="cart_quantity_input" type="number" name="quantity" value="{{ $cartItem->quantity_item }}" autocomplete="off" size="2" step="1" min="1" max="{{ $cartItem->product_quantity}}" lang="en">
            <input class="cart_quantity_input" type="hidden" name="itemid" value="{{ $cartItem->id_item }}">
            </form>
            </div>
            </td>
            <td class="cart_total" style="padding-top: 20px;font-size: x-large;">
            <p class="cart_total_price">{{ $cartItem->total_price }} د.ج </p>
            </td>
            <td class="cart_delete" style="padding-top: 20px;font-size: x-large;text-align: center;">
            <a class="cart_quantity_delete" href="{{ url('sup_cart_item/'.$cartItem->id_item) }}" style="color: #5dd5c4;"><i class="fa fa-times"></i></a>
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
                    <td class="cart_delete" style="padding-top: 20px;font-size: x-large;">
                        <div class="button" onclick="window.location.href='{{ route('checkout')}}';">
                            <a href="{{ route('checkout')}}">الدفع</a>
                        </div>
                    </td>
                    </tr>

    @else
        <tr>
        <td colspan="6" class="cart_delete" style="padding-top: 20px;font-size: x-large;text-align: center;">
        <p class="cart_total_price">عزيزي الزبون أرجوا منك شراء منتوج ولعودة مرة أخرى لهنا</p>
        </td>
        </tr>
    @endif
    </tbody>
    </table>
    </div>


</div>


@include('home.footer')
