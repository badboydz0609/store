<!DOCTYPE html>
<html lang="ar" dir="rtl">
 <head>
 <meta charset="UTF-8">
  <title>DZ STORE</title>
        <!--Google Fonts-->
        <!--Stylesheet-->
    <link rel="stylesheet" href="home/css/forgot-password.css">
    <link rel="stylesheet" href="home/css/all.css">
</head>
<body>
    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
    @endif
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <h1>إستعادة كلمة المرور</h1>
		     <!-- email-forgot-password -->
        <input type="email" id="email" name="email" title="الرجاء إدخال البريد الإلكتروني" :value="old('email')" placeholder="البريد الإلكتروني" required>
        <input class="button back-5dd col-fff" value="موافق" type="submit">

        <div class="link">
        ليس لديك حساب ؟
        </div>


	    <div class="button" onclick="window.location.href='{{ route('register') }}';">
	      <a href="{{ route('register') }}">إنشاء حساب جديد</a>
	    </div>

        <div class="link">
            تذكرت كلمة المرور ؟
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

