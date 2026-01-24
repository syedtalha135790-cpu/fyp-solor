<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Soliur | Solar & Electricity HTML Template | Home Page 01</title>

    <!-- Stylesheets -->
    <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Revolution Slider -->
    <link href="{{ asset('frontend/assets/plugins/revolution/css/settings.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/plugins/revolution/css/layers.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/plugins/revolution/css/navigation.css') }}" rel="stylesheet">

    <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('frontend/assets/images/favicon.png') }}" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
</head>


<body>

<div class="page-wrapper">

  <!-- Preloader -->

  <!-- Main Header-->
  <header class="main-header header-style-one">
    <!-- Header Top -->
    <div class="header-top">
      <div class="inner-container">

        <!-- Top Left -->
        <div class="top-left">
          <!-- Info List -->
          <ul class="list-style-one">
            <li><i class="fal fa-clock"></i> Mon - Fri: 09.00am - 10.00 pm</li>
            <li><i class="fa fa-map-marker-alt"></i> Pakistan, Sahiwal </li>
            <li><i class="fa fa-envelope"></i> <a href="#" class="mailto:soliur@mail.com"><span class="__cf_email__" data-cfemail="25764a494c50576548444c490b464a48">[email&#160;protected]</span></a></li>
          </ul>
        </div>

        <!-- Top Right -->
        <div class="top-right">
          <!-- Info Btn -->
          <a href="tel:+92(8800)9806" class="info-btn">
            <i class="icon fa fa-phone"></i>
            <small>Make a Call</small>
            <strong>+36 55 540 069</strong>
          </a>

          <!-- Social Icon One -->
          <ul class="social-icon-one light">
            <li><a href="#"><i class="icon fab fa-google"></i></a></li>
            <li><a href="#"><i class="icon fab fa-pinterest"></i></a></li>
            <li><a href="#"><i class="icon fa fa-x"></i></a></li>
            <li><a href="#"><i class="icon fab fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="icon fab fa-linkedin-in"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Header Top -->

    <div class="header-lower">
      <!-- Main box -->
      <div class="main-box">
        <div class="logo-box">
          <div class="logo"><a href="index.html"><img src="frontend/assets/images/logo.png" alt="Logo" title="Soliur"></a></div>
        </div>

        <!--Nav Box-->
        <div class="nav-outer">
          <nav class="nav main-menu">
            <ul class="navigation">
             <li class="current">
        <a href="{{ route('home') }}">Home</a>
    </li>

    <li>
        <a href="{{ route('shop') }}">Shop</a>
    </li>

    <li>
        <a href="{{ route('services') }}">Services</a>
    </li>

    <li>
        <a href="{{ route('contact') }}">Contact</a>
    </li>

    <li>
        <a href="{{ route('user.register') }}">Register</a>
    </li>
        <!-- Main Menu End-->

        <!-- Outer Box -->
        <div class="outer-box">

          <!-- Header Cart -->
          <button class="ui-btn ui-btn search-btn">
            <span class="icon lnr lnr-icon-search"></span>
          </button>

          <span class="divider"></span>

          <!-- Header Search -->
          <button class="ui-btn ui-btn cart-btn">
            <i class="icon lnr lnr-icon-cart"></i>
            <span class="count">0</span>
          </button>

          <!-- Mobile Nav toggler -->
          <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
        </div>

        <!-- Btn Box -->
        <div class="btn-box">
          <a href="page-contact.html"/a>
        </div>
      </div>
    </div>

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
      <div class="menu-backdrop"></div>

      <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
      <nav class="menu-box">
        <div class="upper-box">
          <div class="nav-logo"><a href="index.html"><img src="frontend/assets/images/logo.png" alt="" title=""></a></div>
          <div class="close-btn"><i class="icon fa fa-times"></i></div>
        </div>

        <ul class="navigation clearfix">
          <!--Keep This Empty / Menu will come through Javascript-->
        </ul>
        <ul class="contact-list-one">
          <li>
            <i class="icon lnr-icon-phone-handset"></i>
            <span class="title">Call Now</span>
            <div class="text"><a href="tel:+92880098670">+92 (8800) - 98670</a></div>
          </li>
          <li>
            <i class="icon lnr-icon-envelope1"></i>
            <span class="title">Send Email</span>
            <div class="text"><a href="https://html.kodesolution.com/cdn-cgi/l/email-protection#e189848d91a1828e8c91808f98cf828e8c"><span class="__cf_email__" data-cfemail="e28a878e92a2818d8f92838c9bcc818d8f">[email&#160;protected]</span></a></div>
          </li>
          <li>
            <i class="icon lnr-icon-map-marker"></i>
            <span class="title">Address</span>
            <div class="text">66 Broklyant, New York India 3269</div>
          </li>
        </ul>

        <ul class="social-links">
          <li><a href="#"><i class="fa fa-x"></i></a></li>
          <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
          <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
          <li><a href="#"><i class="fab fa-instagram"></i></a></li>
        </ul>
      </nav>
    </div><!-- End Mobile Menu -->

    <!-- Header Search -->
    <div class="search-popup">
      <span class="search-back-drop"></span>
      <button class="close-search"><span class="fa fa-times"></span></button>

      <div class="search-inner">
        <form method="post" action="https://html.kodesolution.com/2023/soliur-html/index.html">
          <div class="form-group">
            <input type="search" name="search-field" value="" placeholder="Search..." required="">
            <button type="submit"><i class="fa fa-search"></i></button>
          </div>
        </form>
      </div>
    </div>
    <!-- End Header Search -->

    <!-- Sticky Header  -->
    <div class="sticky-header">
      <div class="auto-container">
        <div class="inner-container">
          <!--Logo-->
          <div class="logo">
            <a href="index.html"><img src="frontend/assets/images/logo.png" alt="Logo" title="Soliur"></a>
          </div>

          <!--Right Col-->
          <div class="nav-outer">
            <!-- Main Menu -->
            <nav class="main-menu">
              <div class="navbar-collapse show collapse clearfix">
                <ul class="navigation clearfix">
                  <!--Keep This Empty / Menu will come through Javascript-->
                </ul>
              </div>
            </nav><!-- Main Menu End-->

            <!--Mobile Navigation Toggler-->
            <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
          </div>
        </div>
      </div>
    </div><!-- End Sticky Menu -->
  </header>
  <!--End Main Header -->

  <!--Main Slider-->
