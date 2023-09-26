@section('title','لوحة التحكم - الحسابات')

@include('admin.header')

<table style="width: 100%;" lang="ar">

<thead>
<tr style="text-align: center;">
<th style="font-size: 23px;padding-bottom: 10px;">المعرف</th>
<th style="font-size: 23px;padding-bottom: 10px;">الإسم</th>
<th style="font-size: 23px;padding-bottom: 10px;">البريد الإلكتروني</th>
<th style="font-size: 23px;padding-bottom: 10px;">الصلاحية</th>
<th style="font-size: 23px;padding-bottom: 10px;"></th>
<th style="font-size: 23px;padding-bottom: 10px;"></th>
</tr>
</thead>
@foreach ($data as $data)
<tbody>
<tr>
  <td style="padding-bottom: 10px;padding-top: 5px;border-bottom: 1px solid #e1dada;"><h3>{{ $data->id}}</h3></td>
  <td style="padding-bottom: 10px;padding-top: 5px;border-bottom: 1px solid #e1dada;"><h3>{{ $data->name}}</h3></td>
  <td style="padding-bottom: 10px;padding-top: 5px;border-bottom: 1px solid #e1dada;"><h3>{{ $data->email}}</h3></td>
  <td style="padding-bottom: 10px;padding-top: 5px;border-bottom: 1px solid #e1dada;"><h3>{{ $data->role}}</h3></td>
  <td style="text-align: -moz-center;padding-bottom: 10px;padding-top: 5px;border-bottom: 1px solid #e1dada;"><button onclick="window.location.href='{{ url('sup_user',$data->id)}}'" class="sup-button">حذف</button></td>
  <td style="text-align: -moz-center;padding-bottom: 10px;padding-top: 5px;border-bottom: 1px solid #e1dada;"><button onclick="window.location.href='{{ url('edit_user',$data->id)}}'" class="edit-button">تعديل</button></td>
</tr>
@endforeach
</tbody>
</table>


<button onclick="window.location.href='{{ url('add_user') }}'"class="add-button">إضافة عضو جديد</button>
@include('admin.footer')
