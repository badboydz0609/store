@section('title','لوحة التحكم - مشاهدة المنتوج')

@include('admin.header')

<div class="product">

 <img src="../home/img/{{ $data->product_image }}" alt="{{ $data->product_name }}">
 <style>
    table tbody tr td {padding-bottom: 10px;padding-top: 10px;}
 </style>
 <table style="width: 80%;padding-right: 10px;" lang="ar">

   <tbody>

   <tr>
   <th colspan="2" style="font-size: 23px;">{{ $data->product_name }}</th>
   </tr>

   <tr style="font-size: revert-layer;">
   <td style="font-size: revert-layer;width: 110px;">السعر : </td>
   <td style="padding-right: 0px;">{{ $data->product_price }} د.ج</td>
   </tr>

   <tr>
   <td>وصف المنتوج : </td>
   <td><textarea style="width: 100%;">{{ $data->product_description }}</textarea></td>
   </tr>

   <tr>

   <td>موافقة المسؤول : </td>

       @if ($data->product_action == '0')
       <td>قيد المراجعة</td>
       @else
       <td>تم قبوله</td>
       @endif

    </tr>


   <tr>
   <td>الكمية : </td>
   <td>{{ $data->product_quantity }} وحدة</td>
   </tr>

   <tr>
   <td>حالة الكمية : </td>

       @if ($data->product_status == '0')
       <td>تم شرائه</td>
       @else
       <td>في المخزن</td>
       @endif

       </tr>

   <tr>
   <td>الكمية في السلة :</td>

   @if ($quan > 0)
   <td>{{ $quan }} وحدة</td>
   @else
   <td>0 وحدة</td>
   @endif

   </tr>

   <tr>
   <td>الكمية التي تم بيعها :</td>
   @if ($quan_buy > 00)
   <td>{{ $quan_buy }} وحدة</td>
   @else
   <td>0 وحدة</td>
   @endif

   </tr>

   <tr>
    <td>عدد الإعجابات : </td>

    @if ($favorite_item > 0)
    <td>{{ $favorite_item }} إعجاب</td>
    @else
    <td>0 وحدة</td>
    @endif

    </tr>

   </tr>

   </tbody>
   </table>

   </div>
   <div style="display: flex;">


   @if ($data->product_action == '0')

   <button onclick="window.location.href='{{ url('accept_product',$data->id)}}'" class="add-button" style="margin-left: 10px;display: initial;background-color: #5d64d5;width: 100px;">قبول</button>
   <button onclick="window.location.href='{{ url('sup_product',$data->id)}}'" class="add-button" style="display: initial;background-color: red;width: 100px;margin-right: auto;">حذف</button>


   @else

   <button onclick="window.location.href='{{ url('demo_item',$data->id)}}'" class="add-button" style="display: initial;background-color: #5dd5c4;width: 100px;margin-right: auto;">معاينة</button>
   <button onclick="window.location.href='{{ url('sup_product',$data->id)}}'" class="add-button" style="display: initial;background-color: red;width: 100px;margin-right: auto;">حذف</button>

   @endif

     </div>


@include('admin.footer')
