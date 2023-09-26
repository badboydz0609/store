<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title> المتجر - إنشاء حساب جديد</title>
    <!--Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <link rel="stylesheet" href="home/css/signup.css">
	<link rel="stylesheet" href="home/css/all.css">
</head>
<body>

    <nav>

    </nav>

    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
	 @csrf
        <h1>إنشاء حساب جديد</h1>
	    	 <!-- username-register -->
        <input type="text" id="name" name="name" :value="old('name')" title="الرجاء إدخال إسم المستخدم" placeholder="أدخل إسم المستخدم" required autofocus autocomplete="name" />

		    <!-- email-register -->
        <input type="email" id="email" name="email" :value="old('email')" title="الرجاء إدخال البريد الإلكتروني" placeholder="أدخل البريد الإلكتروني" required autofocus autocomplete="email" />

	      	 <!-- phone-register -->
        <input type="tel" id="phone" name="phone" :value="old('phone')" title="الرجاء إدخال رقم الجوال" placeholder="أدخل رقم الجوال" dir="rtl" required autofocus autocomplete="phone" />
		    <!-- password-register -->

        <input type="password" id="password" name="password" :value="old('password')" title="الرجاء إدخال كلمة المرور" placeholder="أدخل كلمة المرور" required autofocus autocomplete="password" />
        <input type="password" id="password_confirmation" name="password_confirmation" :value="old('password_confirmation')" title="الرجاء إدخال كلمة المرور" placeholder="أدخل كلمة المرور" required autofocus autocomplete="password_confirmation" />


               <!--<input type="file" name="image" title=" الرجاء رفع صورة ملفك الشخصي" style="margin-top: 15px;color: #747474;padding: 10px;">
               -->
	           <input class="button back-5dd col-fff" value="إدخال" type="submit">
		<div class="link">
        أنا بالفعل لدي حساب
        </div>

   <div class="button" onclick="window.location.href='{{ route('login') }}';">
	   <a href="{{ route('login') }}">تسجيل الدخول</a>
	   </div>
    </form>
    <footer>
           <!-- copyright -->
    </footer>

</body>
</html>
