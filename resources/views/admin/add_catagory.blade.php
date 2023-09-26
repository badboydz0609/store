@section('title','لوحة التحكم - إضافة تصنيف جديد')

@include('admin.header')
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
</style>
<h1 class="h0" style="color: #5dd5c4;margin-right: 5px;margin-bottom: 25px;text-align: right;">إنشاء تصنيف جديد</h1>
@if (session()->has('message'))
<div style="color: #155724;background-color: #d4edda;border-color: #c3e6cb;width: 150px;border-radius: 3px;padding-right: 8px;padding-left: 3px;padding-bottom: 3px;padding-top: 3px;">
{{ session()->get('message')}}
</div>
@endif
<form method="POST" action="{{ url('/add_new_catagory')}}" enctype="multipart/form-data">
@csrf
<div>
<input type="text" class="input0" name="catagory" required="" style="" title="الرجاء إدخال إسم التصنيف" placeholder="أدخل إسم التصنيف">
</div>

<div>
<input type="file" class="input0" name="category_image" title=" الرجاء رفع صورة ملفك الشخصي" style="padding: 10px;color: #747474;">
</div>

<div>
<input type="submit" class="submit0" value="إضافة التصنيف">
</div>

</form>
@include('admin.footer')
