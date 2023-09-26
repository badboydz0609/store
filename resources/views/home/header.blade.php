
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> @yield('title') </title>
<link rel="stylesheet" href="../home/css/index.css">
<link rel="stylesheet" href="../home/css/all.css">
</head>
<body>
      <header class="header">
        <nav class="navbar">
            <a href="{{ url('/') }}" class="nav-logo">المتجر</a>
            <ul class="nav-menu">
              @if (Route::has('login'))
                      @auth

                       <div class="logout">
                      		<li class="nav-item">
                            <a href="{{ url('dashboard') }}" class="nav-link" style="padding: 0px;">
                              <i class="fa fa-tachometer" aria-hidden="true"></i>
                             </a>
                          </li>
				                </div>

                      	<div class="logout">
                      		<li>
                          <form method="POST" action="{{ route('logout') }}" x-data="">
                              @csrf
                      			 <button class="logout" href="{{ route('logout') }}" @click.prevent="$root.submit();" style="background: #fff;color: #000;display: block;font-size: 18px;width: 34px;height: 34px;line-height: 35px;text-align: center;border-radius: 50%;transition: 0.3s;  transition-property: all;
  transition-duration: 0.3s;  transition-timing-function: ease;  transition-delay: 0s;transition-property: background,color;border: 1px solid #5dd5c4;">
                                <i class="fas fa-power-off"></i>
                             </button>
                            </form>
                        	</li>
                      	</div>

                      @else
                        <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">تسجيل الدخول</a>
                        </li>
                          @if (Route::has('register'))
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">إنشاء حساب</a>
                        </li>
                         @endif
                      @endauth
              @endif

            </ul>
        </nav>

<nav class="navbar" style="margin-top: 35px;padding: 10px;">

    @auth
    @if (Auth::user()->role == 'client')
            <ul style="margin-right: 50px;padding-right: 5px;font-size: 29px;padding-left: 0px;margin-bottom: 0px;display: flex;background-color: white;border-radius: 24px;">
                <li class="checkout" style="color: #5dd5c4;">
                    <a href="{{ url('cart') }}" style="color: #5dd5c4;">{{ $cart_item }}</a>
				</li>


                <li class="checkout">
					<a href="{{ url('cart') }}" style="color: #5dd5c4;background-color: white;border-radius: 80%;display: table-cell;padding-right: 9px;padding-bottom: 0px;padding-top: 0px;padding-left: 7px;">
						<i class="fa fa-shopping-cart" aria-hidden="true" style=""></i>
							<span id="checkout_items" class="checkout_items"></span>
					</a>
		  		</li>
            </ul>
    @endif
    @endauth

    <form action="{{ url('search_item') }}" method="post" class="form-inline my-2 my-lg-0" style="display: flex;margin-left: auto;width: 30%;margin-right: 60%;">
        @csrf
        <input class="form-control mr-sm-2" type="search" value="{{ old('search') }}" placeholder="ابحث عن ..." aria-label="Search" name="search" style="padding: 10px;border-radius: 24px;font-size: 16px;padding-right: 20px;margin-left: 1%;">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="border-radius: 24px;padding: 10px 20px;font-size: 16px;">ابحث</button>
    </form>
</nav>

    </header>
    <div class="row">
