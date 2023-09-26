@section('title','لوحة التحكم - إضافة منتوج')

@include('customer.header')
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
<h1 class="h0" style="margin-right: 5px;margin-bottom: 25px;text-align: right;">إنشاء حساب تاجر أو عميل</h1>
@if (session()->has('message'))
<div style="color: #155724;background-color: #d4edda;border-color: #c3e6cb;width: 150px;border-radius: 3px;padding-right: 8px;padding-left: 3px;padding-bottom: 3px;padding-top: 3px;">
{{ session()->get('message')}}
</div>
@endif

<form method="POST" action="{{ url('/add_new_product')}}" enctype="multipart/form-data">
	@csrf

    <input type="text" class="input0" name="product_name" value="{{ old('product_name')}}" required="" style="margin-right: 3%;margin-left: 15%;" title="الرجاء إدخال الإسم" placeholder="أدخل الإسم">
        <input type="number" class="input0" name="product_quantity" value="{{ old('product_quantity')}}" title="الرجاء إدخال الكمية" placeholder="كمية المنتوج" min="0" required="" style="margin-left: 3%;margin-right: 15%;" lang="en">
        <input type="number" class="input0" name="product_price" value="{{ old('product_price')}}" title="الرجاء إدخال سعر المنتوج" placeholder="سعر المنتوج" min="0" required="" style="margin-right: 3%;margin-left: 15%;" lang="en">
        <input type="number" class="input0" name="product_discount" value="{{ old('product_discount')}}" title="الرجاء إدخال التخفيض" placeholder="أدخل التخفيض" max="100" min="0" required="" style="margin-left: 3%;margin-right: 15%;" lang="en">
<input type="file" class="input0" name="product_image" value="{{ old('product_image')}}"title=" الرجاء رفع صورة المنتوج" style="padding: 10px;margin-right: 3%;margin-left: 15%;color: #747474;">
            <select name="categ_id" id="categ_id" class="section0">
                @foreach ($catg as $catgs)
                     <option value="{{ $catgs->id}}">{{ $catgs->category_name}}</option>
               @endforeach
            </select>
        <input type="text" class="input0" name="product_description" value="{{ old('product_description')}}" placeholder="أدخل وصف المنتج" title="الرجاء إدخال وصف المنتوج" required="" style="margin-right: 3%;margin-left: 15%;">

        <input type="submit" class="submit0" value="إضافة المنتوج" style="margin-right: 15%;">
</form>

@include('customer.footer')
