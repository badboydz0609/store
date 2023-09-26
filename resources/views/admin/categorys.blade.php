@section('title','لوحة التحكم - التصنيفات')

@include('admin.header')

<table style="width: 100%;" lang="ar">

<thead>
<tr style="text-align: center;">
<th style="font-size: 23px;padding-bottom: 10px;">المعرف</th>
<th style="font-size: 23px;padding-bottom: 10px;">التصنيف</th>
<th style="font-size: 23px;padding-bottom: 10px;">الصورة</th>
<th style="font-size: 23px;padding-bottom: 10px;">عدد المنتجات</th>
<th style="font-size: 23px;padding-bottom: 10px;"></th>
<th style="font-size: 23px;padding-bottom: 10px;"></th>
</tr>
</thead>
@foreach ($data as $data)
<tbody>
<tr>
  <td style="padding-bottom: 10px;padding-top: 5px;border-bottom: 1px solid #e1dada;"><h3>{{ $data->id}}</h3></td>
  <td style="padding-bottom: 10px;padding-top: 5px;border-bottom: 1px solid #e1dada;"><h3>{{ $data->category_name}}</h3></td>
  <td style="width: 200px;text-align:-moz-center; padding-bottom: 10px;padding-top: 5px;border-bottom: 1px solid #e1dada;"><img src="home/icons/Catagory/{{$data->category_image}}" class="m-0" alt="صورة التصنيف" style="display: block;height: 80px;width: 90px;"></td>
  <td style="padding-bottom: 10px;padding-top: 5px;border-bottom: 1px solid #e1dada;"><h3>{{ $data->nubmer_item }}</h3></td>
  <td style="text-align: -moz-center;padding-bottom: 10px;padding-top: 5px;border-bottom: 1px solid #e1dada;"><button onclick="window.location.href='{{ url('sup_catagory',$data->id)}}'" class="sup-button">حذف</button></td>
  <td style="text-align: -moz-center;padding-bottom: 10px;padding-top: 5px;border-bottom: 1px solid #e1dada;"><button onclick="window.location.href='{{ url('edit_catagory',$data->id)}}'" class="edit-button">تعديل</button></td>
</tr>
@endforeach
</tbody>
</table>


<button onclick="window.location.href='{{ url('add_catagory') }}'"class="add-button">إضافة تصنيف جديد</button>
@include('admin.footer')
