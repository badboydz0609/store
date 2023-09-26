@section('title','لوحة التحكم - معلومات العملية')

@include('customer.header')

<table style="width: 100%;" lang="ar">

    <thead>
    <tr style="text-align: center;">
    <th style="font-size: 23px;padding-bottom: 10px;width: 300px;">المعلومات</th>
    <th style="font-size: 23px;padding-bottom: 10px;">القيم</th>



    </tr>
    </thead>
        <tbody>

        <tr>
            <td style="padding-bottom: 10px;padding-top: 5px;border: 1px solid #e1dada;"><h3>المعرف</h3></td>
            <td style="padding-bottom: 10px;padding-top: 5px;border: 1px solid #e1dada;"><h3>{{ $productsbuy->id }}</h3></td>
        </tr>

        <tr>
            <td style="padding-bottom: 10px;padding-top: 5px;border: 1px solid #e1dada;"><h3>الكمية</h3></td>
            <td style="padding-bottom: 10px;padding-top: 5px;border: 1px solid #e1dada;"><h3>{{ $productsbuy->ptoducts_buy_product_quantity }}</h3></td>
        </tr>

        <tr>
            <td style="padding-bottom: 10px;padding-top: 5px;border: 1px solid #e1dada;"><h3>إسم المنتوج</h3></td>
            <td style="padding-bottom: 10px;padding-top: 5px;border: 1px solid #e1dada;"><h3>{{ $productsbuy->product_name }}</h3></td>
        </tr>

        <tr>
            <td style="padding-bottom: 10px;padding-top: 5px;border: 1px solid #e1dada;"><h3>رقم عملية البيع</h3></td>
            <td style="padding-bottom: 10px;padding-top: 5px;border: 1px solid #e1dada;"><h3>{{ $clientsbuy->id }}</h3></td>
        </tr>

        <tr>
            <td style="padding-bottom: 10px;padding-top: 5px;border: 1px solid #e1dada;"><h3>طريقة الدفع</h3></td>
            @if ($clientsbuy->method_pay == 1)
            <td style="padding-bottom: 10px;padding-top: 5px;border: 1px solid #e1dada;"><h3>بطاقة بنكية</h3></td>
            @else
            <td style="padding-bottom: 10px;padding-top: 5px;border: 1px solid #e1dada;"><h3>الدفع عند الإستلام</h3></td>
            @endif
        </tr>

        <tr>
            <td style="padding-bottom: 10px;padding-top: 5px;border: 1px solid #e1dada;"><h3>اسم الزبون</h3></td>
            <td style="padding-bottom: 10px;padding-top: 5px;border: 1px solid #e1dada;"><h3>{{ $productsclients->name }}</h3></td>
        </tr>

        <tr>
            <td style="padding-bottom: 10px;padding-top: 5px;border: 1px solid #e1dada;"><h3>معلومات التوصيل</h3></td>
            <td style="padding-bottom: 10px;padding-top: 5px;border: 1px solid #e1dada;"><h3>{{ $adress->billing_address }}</h3></td>
        </tr>

        <tr>
            <td style="padding-bottom: 10px;padding-top: 5px;border: 1px solid #e1dada;"><h3>سعر المنتوج</h3></td>
            <td style="padding-bottom: 10px;padding-top: 5px;border: 1px solid #e1dada;"><h3>{{ $productsbuy->product_price }}</h3></td>
        </tr>

        <tr>
            <td style="padding-bottom: 10px;padding-top: 5px;border: 1px solid #e1dada;"><h3>المبلغ المدفوع</h3></td>
            <td style="padding-bottom: 10px;padding-top: 5px;border: 1px solid #e1dada;"><h3>{{ $total_price }}.00</h3></td>
        </tr>

        </tbody>
    </table>

@include('customer.footer')
