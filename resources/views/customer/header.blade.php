<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title> @yield('title') </title>
    <link rel="stylesheet" href="../home/css/menu-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="../home/js/jquery.min.js"></script>
    <script type="text/javascript" src="../home/js/menu.js"></script>
    <link rel="stylesheet" href="../home/css/dashboard.css">

</head>
<body>
    <!--wrapper start-->
    <div class="wrapper">

        <!--sidebar start-->
        <div class="sidebar">
            <div class="sidebar-menu">
            <center class="profile">
                <img src="/home/icons/users/{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}"><p>{{ Auth::user()->name }}</p>
            </center>

               <li class="item">
                   <a href="{{ url('/') }}" class="menu-btn">
           <i class="fas fa-desktop"></i>
           <span>زيارة الموقع</span>
         </a>

         <li class="item">
            <a href="{{ route('dashboard') }}" class="menu-btn">
                <i class="fa fa-tachometer" aria-hidden="true"></i>
                    <span>لوحة التحكم</span>
            </a>
        </li>
        
               </li>
               <li class="item" id="messege">
                   <a href="{{ url('view_sellitem') }}" class="menu-btn">
                       <i class="fas fa-envelope"></i>
           <span>المنتجات</span>
                   </a>
               </li>

            </li>
            <li class="item" id="messege">
                <a href="{{ url('view_buyitem') }}" class="menu-btn">
                    <i class="fas fa-envelope"></i>
        <span>المشتريات</span>
                </a>
            </li>

               <li class="item" id="setting">
                   <a href="{{ url('view_setting') }}" class="menu-btn">
                       <i class="fas fa-cog"></i><span>الإعدادات</span>
                   </a>
               </li>
               <li class="item">
                   <a href="{{ url('view_about') }}" class="menu-btn"><i class="fas fa-info-circle"></i><span>حولنا</span></a>
               </li>
           </div>
       </div>
       <!--sidebar end-->
               <!--header menu start-->
       <div class="header">
           <div class="header-menu">
            <ul style="padding-right: 94%">
                <li>
                <form method="POST" action="{{ route('logout') }}" x-data="">
                          @csrf
                               <button class="logout" href="{{ route('logout') }}" @click.prevent="$root.submit();" style="background: #fff;color: #000;display: block;font-size: 18px;width: 34px;height: 34px;line-height: 35px;text-align: center;border-radius: 50%;transition: 0.3s;  transition-property: all;
        transition-duration: 0.3s;  transition-timing-function: ease;  transition-delay: 0s;cursor: pointer;transition-property: background,color;border: 1px solid #5dd5c4;">
                            <i class="fas fa-power-off"></i>
                         </button>
                        </form>
                </li>
            </ul>

           </div>
       </div>
       <!--header menu end-->
       <!--main container start-->
<div class="main-container">
