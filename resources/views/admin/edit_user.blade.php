@section('title','لوحة التحكم - تعديل معلومات العضو')

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
<h1 class="h0" style="margin-right: 5px;margin-bottom: 25px;text-align: right;">تعديل معلومات العضو</h1>
@if (session()->has('success'))
<div style="color: #155724;background-color: #d4edda;border-color: #c3e6cb;width: 155px;margin-right: 30px;border-radius: 3px;padding-right: 8px;padding-left: 3px;padding-bottom: 3px;padding-top: 3px;">
{{ session()->get('success')}}
</div>
@endif
<form method="POST" action="{{ url('/edit_new_user')}}">
	@csrf
        <input type="text" class="input0" name="name" value="{{ $data->name}}" required="" style="margin-right: 3%;margin-left: 15%;" title="الرجاء إدخال الإسم" placeholder="أدخل الإسم">
        <input type="hidden" name="id" value="{{ $data->id}}" required="">
        <input type="password" class="input0" value="{{ $data->password}}" name="password" title="الرجاء إدخال كلمة المرور" placeholder="كلمة المرور" required="" style="margin-left: 3%;margin-right: 15%;">
        <input type="email" class="input0" value="{{ $data->email}}" name="email" title="الرجاء إدخال البريد الإلكتروني" placeholder="البريد الإلكتروني" required="" style="margin-right: 3%;margin-left: 15%;">
        <input type="phone" class="input0" value="{{ $data->phone}}" name="phone" title="الرجاء إدخال رقم الجوال" placeholder="أدخل رقم الجوال" required="" style="margin-left: 3%;margin-right: 15%;">
        <select name="role" id="role" class="section0" style="margin-right: 3%;margin-left: 15%;">
            @if ($data->role == 'admin')
            <option value="client">عميل</option>
            <option value="customer">تاجر</option>
            <option value="admin" selected>مسؤول</option>
            @else
                @if ($data->role == 'customer')
                    <option value="client">عميل</option>
                    <option value="customer" selected>تاجر</option>
                    <option value="admin">مسؤول</option>
                @else
                <option value="client" selected>عميل</option>
                <option value="customer">تاجر</option>
                <option value="admin">مسؤول</option>
                @endif
            @endif

        </select>
        <input type="submit" class="submit0" value="تعديل العضو">
</form>
@include('admin.footer')
