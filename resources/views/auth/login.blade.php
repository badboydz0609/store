<!DOCTYPE html>
<html lang="ar" dir="rtl">
 <head>
 <meta charset="utf8">
  <title>المتجر - تسجيل الدخول</title>
    <!--Google Fonts-->

    <!--Stylesheet-->
  <link rel="stylesheet" href="home/css/login.css">
  <link rel="stylesheet" href="home/css/all.css">
</head>
<body>
    <header></header>
    <nav></nav>

    <form method="POST" action="{{ route('login') }}">
	@csrf
        <h1>تسجيل الدخول</h1>

        @if(session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
		           <!-- email-login -->
        <input type="email" id="email" name="email" title="الرجاء إدخال البريد الإلكتروني" :value="old('email')" placeholder="البريد الإلكتروني" required autofocus autocomplete="username" />
		           <!-- password-loin -->
          <input type="password" id="password" name="password" title="الرجاء إدخال كلمة المرور" placeholder="كلمة المرور" required autocomplete="current-password" />
                  <div class="forget">
             <a href="{{ route('password.request') }}">نسيت كلمة المرور؟</a>
           </div>
        <input class="button back-5dd col-fff" value="الدخول" type="submit" style="color: #fff;border-radius: 6px;height: 50px;">
        <div class="link">
           ليس لديك حساب متجر ؟
        </div>

	   <div class="button" onclick="window.location.href='{{ route('register') }}';">
	   <a href="{{ route('register') }}">إنشاء متجر جديد</a>
	   </div>

    </form>

    <footer>
                <!-- copyright -->
    </footer>

</body>

</html>
