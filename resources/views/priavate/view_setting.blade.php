@section('title','لوحة التحكم - الإعدادات')

@include(Auth::user()->role.'.header')

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
    <h1 class="h0" style="margin-right: 5px;margin-bottom: 25px;text-align: right;">الإعدادات</h1>
    @if (session()->has('message'))
    <div style="color: #155724;background-color: #d4edda;border-color: #c3e6cb;width: 150px;border-radius: 3px;padding-right: 8px;padding-left: 3px;padding-bottom: 3px;padding-top: 3px;">
    {{ session()->get('message')}}
    </div>
    @endif
    <div class="input_form">
    <h1 class="h0" style="margin-right: 5px;margin-bottom: 25px;text-align: right;margin-top: 30px;">تغيير المعلومات الشخصية</h1>
    <form method="POST" action="{{ url('/add_new_info')}}">
        @csrf
        @if($errors->has('msg4'))
        <div style="color: #155724;background-color: #d4edda;border-color: #c3e6cb;width: 150px;border-radius: 3px;padding-right: 8px;padding-left: 3px;padding-bottom: 3px;padding-top: 3px;">
         {{ $errors->first('msg4') }}
        </div>
        @endif
            <input type="text" class="input0" name="name" style="margin-right: 3%;margin-left: 15%;" value="{{ $data->name}}" title="الرجاء إدخال الإسم" placeholder="أدخل الإسم" required>
            <input type="phone" class="input0" name="phone" value="{{ $data->phone}}" title="الرجاء إدخال رقم الجوال" placeholder="أدخل رقم الجوال" style="margin-left: 3%;margin-right: 15%;" required>
            <input type="submit" class="submit0" value="إضافة العضو">
    </form>

      </div>
      <div class="input_form">
    <h1 class="h0" style="margin-right: 5px;margin-bottom: 25px;text-align: right;margin-top: 30px;">تغيير الصورة الشخصية</h1>
    <form method="POST" action="{{ url('/add_new_photo')}}" enctype="multipart/form-data">
        @csrf
        @if($errors->has('msg3'))
        <div style="color: #155724;background-color: #d4edda;border-color: #c3e6cb;width: 150px;border-radius: 3px;padding-right: 8px;padding-left: 3px;padding-bottom: 3px;padding-top: 3px;">
         {{ $errors->first('msg3') }}
        </div>
        @endif
    <input type="file" class="input0" name="photo_profile" title=" الرجاء رفع صورة ملفك الشخصي" style="padding: 10px;margin-right: 3%;margin-left: 15%;color: #747474;">
    <input type="submit" class="submit0" value="تغيير الأن">
    </form>

      </div>
      <div class="input_form">
    <h1 class="h0" style="margin-right: 5px;margin-bottom: 25px;text-align: right;margin-top: 30px;">تغيير كلمة المرور</h1>
    <form method="POST" action="{{ url('/retype_pass')}}" >
        @csrf
        @if($errors->has('msg2'))
        <div style="color: #155724;background-color: #d4edda;border-color: #c3e6cb;width: 160px;border-radius: 3px;padding-right: 8px;padding-left: 3px;padding-bottom: 3px;padding-top: 3px;">
         {{ $errors->first('msg2') }}
        </div>
        @endif
    <input type="password" class="input0" name="password0" title="الرجاء إدخال كلمة المرور القديمة"  placeholder="كلمة المرور القديمة" required="" style="margin-right: 3%;margin-left: 15%;">
    <input type="password" class="input0" name="password1" title="الرجاء إدخال كلمة المرور الجديدة" placeholder="كلمة المرور الجديدة" required="" style="margin-left: 3%;margin-right: 15%;">
    <input type="submit" class="submit0" value="تغيير الأن">
    </form>
     </div>

      <div class="input_form">
    <h1 class="h0" style="margin-right: 5px;margin-bottom: 25px;text-align: right;margin-top: 30px;">تغيير البريد الإلكتروني</h1>
    <form method="POST" action="{{ url('/retype_email')}}" >
        @csrf
        @if($errors->has('msg1'))
        <div style="color: #155724;background-color: #d4edda;border-color: #c3e6cb;width: 180px;border-radius: 3px;padding-right: 8px;padding-left: 3px;padding-bottom: 3px;padding-top: 3px;">
         {{ $errors->first('msg1') }}
        </div>
        @endif
    <input type="email" class="input0" name="email" title="الرجاء إدخال البريد الإلكتروني" value="{{ $data->email}}" placeholder="البريد الإلكتروني" required="" style="margin-right: 3%;margin-left: 15%;">
    <input type="submit" class="submit0" value="تغيير الأن">
    </form>
      </div>
       @if (Auth::User()->role == 'client')

          <div class="input_form">
            <h1 class="h0" style="margin-right: 5px;margin-bottom: 25px;text-align: right;margin-top: 30px;">إعدادات الدفع</h1>

          <form action="{{ url('retype_pay') }}" method="post">
            @csrf
            @if($errors->has('msg'))
            <div style="color: #155724;background-color: #d4edda;border-color: #c3e6cb;width: 150px;border-radius: 3px;padding-right: 8px;padding-left: 3px;padding-bottom: 3px;padding-top: 3px;">
             {{ $errors->first('msg') }}
            </div>
            @endif
            <input type="text" class="input0" placeholder="الإسم الكامل" value="{{  $pay ? $pay->cardholder_name : '' }}" id="cardholder_name" name="cardholder_name" style="margin-right: 3%;margin-left: 15%;" required>

            <input type="text" class="input0" placeholder="رقم البطاقة" value="{{  $pay ? $pay->card_number : '' }}" id="card_number" name="card_number" style="margin-left: 3%;margin-right: 15%;" required>

            <input type="text" class="input0" placeholder="نهاية البطاقة (الشهر)" value="{{  $pay ? $pay->expiry_month : '' }}" id="expiry_month" name="expiry_month" style="margin-right: 3%;margin-left: 15%;" required>

            <input type="text" class="input0" placeholder="نهاية البطاقة (السنة)" value="{{  $pay ? $pay->expiry_year : '' }}" id="expiry_year" name="expiry_year" style="margin-left: 3%;margin-right: 15%;" required>

            <input type="text" class="input0" placeholder="رمز ال cvv" value="{{  $pay ? $pay->cvv : '' }}" id="cvv" name="cvv" style="margin-right: 3%;margin-left: 15%;" required>

            <input type="text" class="input0" placeholder="العنوان البريدي" value="{{  $pay ? $pay->billing_address : '' }}" id="billing_address" name="billing_address" style="margin-left: 3%;margin-right: 15%;" required>

            <input type="text" class="input0" placeholder="الرمز البريدي" value="{{  $pay ? $pay->billing_zip : '' }}" id="billing_zip" name="billing_zip" style="margin-right: 3%;margin-left: 15%;" required>

            <input type="submit"class="submit0"  style="margin-left: 3%;margin-right: 15%;" value="تغيير الأن">
          </form>
        </div>
        @endif

        @include(Auth::user()->role.'.footer')
