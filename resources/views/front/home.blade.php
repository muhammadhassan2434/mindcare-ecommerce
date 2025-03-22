<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Mind-Care</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('front-assests/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assests/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assests/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assests/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assests/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assests/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assests/css/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assests/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assests/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assests/css/responsive.css') }}">
</head>

<body>

    <!-- Pre-loader-start -->
    <div id="preloader">
        {{-- <div class="tg-cube-grid">
                <div class="tg-cube tg-cube1"></div>
                <div class="tg-cube tg-cube2"></div>
                <div class="tg-cube tg-cube3"></div>
                <div class="tg-cube tg-cube4"></div>
                <div class="tg-cube tg-cube5"></div>
                <div class="tg-cube tg-cube6"></div>
                <div class="tg-cube tg-cube7"></div>
                <div class="tg-cube tg-cube8"></div>
                <div class="tg-cube tg-cube9"></div>
            </div> --}}
    </div>
    <!-- Pre-loader-end -->

    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->
    <header id="home">
        <div id="sticky-header" class="menu-area menu-area-two transparent-header">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-12">
                        <div class="mobile-nav-toggler"><i class="flaticon-layout"></i></div>
                        <div class="menu-wrap">
                            <nav class="menu-nav">
                                <div class="logo">
                                    <a href="{{route('front.home')}}"><img src="{{ asset('front-assests/img/logo/logo.png') }}"
                                            alt="Logo"></a>
                                </div>
                                <div class="logo d-none">
                                    <a href="{{route('front.home')}}"><img src="{{ asset('front-assests/img/logo/logo.png') }}"
                                            alt="Logo"></a>
                                </div>
                                <div class="navbar-wrap main-menu d-none d-xl-flex">
                                    <ul class="navigation">
                                        <li class="active menu-item-has-children"><a href="{{route('front.home')}}"
                                                class="section-link">Home</a>
                                            <ul class="sub-menu">
                                                {{-- <li><a href="{{route('front.home')}}">Home One</a></li>
                                                    <li><a href="index-2.html">Home Two</a></li> --}}
                                                <li class="active"><a href="{{route('front.home')}}">Home</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#features" class="section-link">Features</a></li>
                                        <li><a href="#product" class="section-link">Product</a></li>
                                        <li><a href="{{route("front.healthAndBeauty")}}" class="section-link">Health And Beauty</a></li>
                                        {{-- <li><a href="#pricing" class="section-link">Pricing</a></li> --}}
                                        <li class="menu-item-has-children"><a href="#shop"
                                                class="section-link">Shop</a>
                                            <ul class="sub-menu">
                                                <li><a href="{{route('front.shop')}}">Our Shop</a></li>
                                                {{-- <li><a href="{{ route('front.product', $product->slug) }}">Shop Details</a></li> --}}
                                                <li><a href="{{route('front.cart')}}">Cart Page</a></li>
                                                {{-- <li><a href="checkout.html">Checkout Page</a></li> --}}
                                                {{-- <li><a href="{{route('account.login')}}">Login Page</a></li> --}}
                                                {{-- <li><a href="{{route('account.register')}}">Register Page</a></li> --}}
                                                {{-- <li><a href="reset-password.html">Reset Password Page</a></li> --}}
                                            </ul>
                                        </li>
                                        {{-- <li class="menu-item-has-children"><a href="#news"
                                                class="section-link">News</a>
                                            <ul class="sub-menu">
                                                <li><a href="blog.html">Our Blog</a></li>
                                                <li><a href="blog-details.html">Blog Details</a></li>
                                            </ul>
                                        </li> --}}
                                        <li><a href="{{route('front.contact')}}">contacts</a></li>
                                    </ul>
                                </div>
                                <div class="header-action header-action-two">
                                    <ul class="list-wrap">
                                        <li class="header d-none d-sm-flex">
                                            @if(Auth::check())
                                                <a href="{{ route('account.profile') }}">
                                                    <i class="flaticon-user"></i> {{ Auth::user()->name }}
                                                </a>
                                            @else
                                                <a href="{{ route('account.login') }}">
                                                    <i class="flaticon-login"></i> Login
                                                </a>
                                            @endif
                                        </li>
                                        
                                        <li class="header-cart">
                                            <a href="{{ route('front.cart') }}">
                                                <span class="cart-icon">
                                                    <i class="flaticon-shopping-cart"></i>
                                                    <small class="cart-count-two">{{ Cart::count() }}</small>
                                                </span>
                                            </a>
                                        </li>
                                        
                                        <li class="offCanvas-btn-two d-none d-xl-flex">
                                            <a href="#" class="navSidebar-button"><i
                                                    class="flaticon-layout"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <nav class="menu-box">
                <div class="close-btn"><i class="fas fa-times"></i></div>
                <div class="nav-logo">
                    <a href="{{route('front.home')}}"><img src="{{ asset('front-assests/img/logo/logo.png') }}"
                            alt=""></a>
                </div>
                <div class="menu-outer">
                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                </div>
                <div class="social-links">
                    <ul class="clearfix">
                        <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                        {{-- <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li> --}}
                    </ul>
                </div>
            </nav>
        </div>
        <div class="menu-backdrop"></div>
        <!-- End Mobile Menu -->

        <!-- header-search -->
        <div class="search-popup-wrap" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="search-wrap text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="search-form">
                                <form action="#">
                                    <input type="text" placeholder="Enter your keyword...">
                                    <button class="search-btn"><i class="flaticon-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-backdrop"></div>
        <!-- header-search-end -->

        <!-- offCanvas-start -->
        <div class="offCanvas-wrap">
            <div class="offCanvas-toggle"><img src="{{ asset('front-assests/img/icons/close.png') }}"
                    alt="icon"></div>
            <div class="offCanvas-body">
                <div class="offCanvas-content">
                    <h3 class="title">Mind Care Pharmaceuticals Empowering Minds, Enhancing Live
                    <p>Welcome to Mind Care Pharmaceuticals, where innovative healthcare solutions meet compassionate care. Our mission is to improve mental health and well-being through cutting-edge medications and holistic support.</p>
                </div>
                <div class="offcanvas-contact">
                    <h4 class="number">+92 3006624307</h4>
                    <h4 class="email">mindcare74@gmail.com</h4>
                    <p>P181 Valencia Garden Samundri Road,<br>Faisalabad, Pakisatan</p>
                    <ul class="offcanvas-social list-wrap">
                        <!--<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>-->
                        {{-- <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li> --}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="offCanvas-overlay"></div>
        <!-- offCanvas-end -->

    </header>
    <!-- header-area-end -->


    <!-- main-area -->
    <main class="main-area fix">

        <!-- banner-area -->
        <section class="banner-area-two banner-bg"
            data-background="{{ asset('front-assests/img/banner/h3_banner_bg.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="banner-content-two">
                            <h2 class="title wow fadeInUp" data-wow-delay=".2s">Mind Care  Pharmaceuticals</h2>
                            <p class="wow fadeInUp" data-wow-delay=".4s">Welcome to Mind Care Pharmaceuticals, where innovative healthcare solutions meet compassionate care.</p>
                            <div class="btn-grp wow fadeInUp" data-wow-delay=".6s">
                                <a href="{{route('front.shop')}}" class="btn btn-three">Shop Now</a>
                                <a href="{{route('front.contact')}}" class="btn btn-three green-btn">Contact Us</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="banner-img-two">
                            
                        </div>
                    </div>
                </div>
            </div>
            <!--<a href="#!" class="section-down scroll-to-target d-none d-xl-flex" data-target="#about">-->
            <!--    <svg width="16" height="26" viewBox="0 0 16 26" fill="none"-->
            <!--        xmlns="http://www.w3.org/2000/svg">-->
            <!--        <path-->
            <!--            d="M7.29289 25.0603C7.68342 25.4508 8.31658 25.4508 8.70711 25.0603L15.0711 18.6963C15.4616 18.3058 15.4616 17.6726 15.0711 17.2821C14.6805 16.8916 14.0474 16.8916 13.6569 17.2821L8 22.9389L2.34315 17.2821C1.95262 16.8916 1.31946 16.8916 0.928932 17.2821C0.538408 17.6726 0.538408 18.3058 0.928932 18.6963L7.29289 25.0603ZM7 0.196289L7 24.3532H9L9 0.196289L7 0.196289Z"-->
            <!--            fill="currentColor" />-->
            <!--    </svg>-->
            <!--</a>-->
            <svg class="bottom-shape" x="0px" y="0px" preserveAspectRatio="none" viewBox="0 0 1920 408"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M1920 1V408H0V286C0 286 266.068 493.552 883 361C883 361 1341.03 264.823 1914 3L1920 0V1Z"
                    fill="white" />
            </svg>
        </section>
        <!-- banner-area-end -->

        <!-- brand-area -->
        <div class="brand-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="brand-title text-center mb-50">
                            <p class="title">Perfect Brand is Featured on</p>
                        </div>
                    </div>
                </div>
                {{-- <div class="row brand-active">
                        <div class="col-2">
                            <div class="brand-item">
                                <a href="#"><img src="assets/img/brand/brand_01.png" alt="brand"></a>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="brand-item">
                                <a href="#"><img src="assets/img/brand/brand_02.png" alt="brand"></a>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="brand-item">
                                <a href="#"><img src="assets/img/brand/brand_03.png" alt="brand"></a>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="brand-item">
                                <a href="#"><img src="assets/img/brand/brand_04.png" alt="brand"></a>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="brand-item">
                                <a href="#"><img src="assets/img/brand/brand_05.png" alt="brand"></a>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="brand-item">
                                <a href="#"><img src="assets/img/brand/brand_06.png" alt="brand"></a>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="brand-item">
                                <a href="#"><img src="assets/img/brand/brand_03.png" alt="brand"></a>
                            </div>
                        </div>
                    </div> --}}
            </div>
        </div>
        <!-- brand-area-end -->

        <!-- features-area -->
        <section class="features-area-two">
            <div class="container">
                <div class="features-wrap" data-background="{{ asset('front-assests/img/bg/h3_features_bg.jpg') }}">
                    <div class="row gy-5">
                        <div class="col-lg-4 col-md-6">
                            <div class="features-item-two">
                                <div class="features-icon-two">
                                    <img src="{{ asset('front-assests/img/icons/features_icon01.svg') }}"
                                        class="injectable" alt="Icon">
                                    <div class="shape">
                                        <img src="{{ asset('front-assests/img/icons/features_shape.svg') }}"
                                            alt="" class="injectable">
                                    </div>
                                </div>
                                <div class="features-content-two">
                                    <h4 class="title">Vision</h4>
                                    <p>To be a global leader in mental health solutions, transforming lives through innovation and compassionate care.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="features-item-two">
                                <div class="features-icon-two">
                                    <img src="{{ asset('front-assests/img/icons/features_icon02.svg') }}"
                                        class="injectable" alt="Icon">
                                    <div class="shape">
                                        <img src="{{ asset('front-assests/img/icons/features_shape.svg') }}"
                                            alt="" class="injectable">
                                    </div>
                                </div>
                                <div class="features-content-two">
                                    <h4 class="title">Mission</h4>
                                    <p>We are dedicated to advancing mental health with innovative, effective solutions that improve lives globally.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="features-item-two">
                                <div class="features-icon-two">
                                    <img src="{{ asset('front-assests/img/icons/features_icon03.svg') }}"
                                        class="injectable" alt="Icon">
                                    <div class="shape">
                                        <img src="{{ asset('front-assests/img/icons/features_shape.svg') }}"
                                            alt="" class="injectable">
                                    </div>
                                </div>
                                <div class="features-content-two">
                                    <h4 class="title">Objective</h4>
                                    <p>To develop and deliver high-quality mental health treatments that enhance patient well-being and accessibility worldwide.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- features-area-end -->

        <!-- about-area -->
        <section id="about" class="about-area section-py-130">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img text-center">
                            <img src="{{ asset('front-assests/img/others/stoga.jpg') }}" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-title section-title-two mb-35">
                                <div class="sub-title">
                                    <img src="{{ asset('front-assests/img/icons/sub_left.svg') }}" class="injectable"
                                        alt="img">
                                    Perfect Brand is Featured on
                                    <img src="{{ asset('front-assests/img/icons/sub_right.svg') }}"
                                        class="injectable" alt="img">
                                </div>
                                <h2 class="title">A Neuroprotective Powerhouse </h2>
                            </div>
                            <p>Stoga improves microcirculation and helps provide nutrients to the peripheral  Organs.it is specially developed to deal with tiredness migraine aging vertigo diabetic retinopathy. Stoga improves cognitive functions mental health and inner turmoil </p>
                            <a href="{{route('front.shop')}}" class="btn btn-three">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-area-end -->

        <!-- features-area -->
        <section id="features" class="features-area-three features-bg-two"
            data-background="{{ asset('front-assests/img/bg/h3_features_bg_02.jpg') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-title section-title-two white-title text-center mb-60">
                            <div class="sub-title">
                                <img src="{{ asset('front-assests/img/icons/sub_left.svg') }}" class="injectable"
                                    alt="img">
                                Perfect Features
                                <img src="{{ asset('front-assests/img/icons/sub_right.svg') }}" class="injectable"
                                    alt="img">
                            </div>
                            <h2 class="title">Mind Care  <br> Pharmaceuticals</h2>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="features-item features-item-three">
                            <div class="features-icon">
                                <i class="flaticon-tape-measure"></i>
                            </div>
                            <div class="features-content">
                                <h4 class="title">Nervous System Care</h4>
                                <p>Dedicated solutions for neurological health and well-being.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="features-item features-item-three">
                            <div class="features-icon">
                                <i class="flaticon-test"></i>
                            </div>
                            <div class="features-content">
                                <h4 class="title">Health And Wellness</h4>
                                <p>Empower Your Life, Embrace Wellness</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="features-item features-item-three">
                            <div class="features-icon">
                                <i class="flaticon-weight"></i>
                            </div>
                            <div class="features-content">
                                <h4 class="title">Symptom Management</h4>
                                <p>Effective treatments for managing common neurophyscatic symptoms</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="features-item features-item-three">
                            <div class="features-icon">
                                <i class="flaticon-abs"></i>
                            </div>
                            <div class="features-content">
                                <h4 class="title">General Health Support</h4>
                                <p>Comprehensive care for general health and well-being.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- features-area-end -->

        <!-- counter-area -->
        <section class="counter-area">
            <div class="container">
                <div class="counter-wrap">
                    <div class="row gy-4 justify-content-center">
                        <div class="col-lg-4 col-md-6">
                            <div class="counter-item">
                                <div class="counter-icon">
                                    <i class="flaticon-whey-protein-3"></i>
                                </div>
                                <div class="counter-content">
                                    <h2 class="count"><span class="odometer" data-count="3560"></span>+</h2>
                                    <p>Package Delivered</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="counter-item">
                                <div class="counter-icon">
                                    <i class="flaticon-whey-protein-3"></i>
                                </div>
                                <div class="counter-content">
                                    <h2 class="count"><span class="odometer" data-count="1"></span>+</h2>
                                    <p>Countries Covered</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="counter-item">
                                <div class="counter-icon">
                                    <i class="flaticon-whey-protein-3"></i>
                                </div>
                                <div class="counter-content">
                                    <h2 class="count"><span class="odometer" data-count="1800"></span>+</h2>
                                    <p>Happy Customer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- counter-area-end -->

        <!-- product-area -->
        <section id="product" class="product-area section-pt-130 section-pb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="section-title section-title-two mb-60">
                            <div class="sub-title">
                                <img src="{{ asset('front-assests/img/icons/sub_left.svg') }}" class="injectable"
                                    alt="img">
                                Featured Product
                                <img src="{{ asset('front-assests/img/icons/sub_right.svg') }}" class="injectable"
                                    alt="img">
                            </div>
                            <h2 class="title">Top Selling Product</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <div class="view-all-btn text-end mb-50">
                            <a href="{{route('front.shop')}}" class="btn btn-three">All Product</a>
                        </div>
                    </div>
                </div>
                <div class="row gx-20 justify-content-center">

                    @if ($leatest_products->isNotEmpty())
                        @foreach ($leatest_products as $product)
                            @php
                                $productimage = $product->product_images->first();
                                // dd($productimage)
                            @endphp
                            <div class="col-xxl-3 col-lg-4 col-md-6">
                                <div class="product-item">
                                    <div class="product-thumb">
                                        <a href="{{ route('front.product', $product->slug) }}">
                                            @if (!empty($productimage->image))
                                                <img class="card-img-top"
                                                    src="{{ asset($productimage->image) }}" />
                                            @else
                                                <img class="card-img-top"
                                                    src="{{ asset('admin-assests/img/bike.jpg') }}"
                                                    alt="" />
                                            @endif
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <h2 class="title"><a href="{{ route('front.product', $product->slug) }}">{{ $product->title }}</a></h2>
                                        <p class="price">RS {{ $product->price }}</p>
                                        {{-- <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                            <span class="total-rating">(30)</span>
                                        </div> --}}
                                        <div class="product-bottom">
                                            <div class="cart-plus-minus">
                                                <div class="dec qtybutton">-</div>
                                                <input type="text" value="1">
                                                <div class="inc qtybutton">+</div>
                                            </div>
                                            <a  href="javascript:void(0);" class="action-button" onclick="addtocart({{ $product->id }})""><i
                                                    class="flaticon-shopping-cart-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </section>
        <!-- product-area-end -->

        <!-- Ingredients-area -->
        <section id="ingredient" class="ingredients-area-two section-py-130">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-title section-title-two text-center mb-90">
                            <div class="sub-title">
                                <img src="{{ asset('front-assests/img/icons/sub_left.svg') }}" class="injectable"
                                    alt="img">
                                Energy with Mindcare
                                <img src="{{ asset('front-assests/img/icons/sub_right.svg') }}" class="injectable"
                                    alt="img">
                            </div>
                            <h2 class="title">Mind Care Ingredients</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-8 order-0 order-lg-2">
                        <div class="ingredients-img-two" style="display:flex; justify-content:center">
                            <img src="{{ asset('front-assests/img/others/about_img2.png') }}" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="ingredients-item-wrap reverse-item">
                            <div class="ingredients-item-two">
                                <div class="ingredients-icon">
                                    <i class="flaticon-strong-1"></i>
                                </div>
                                <div class="ingredients-content-two">
                                    <h3 class="title">Increased Energy</h3>
                                    <p>Elevate Your Energy, Elevate Your Life</p>
                                </div>
                            </div>
                            <div class="ingredients-item-two">
                                <div class="ingredients-icon">
                                    <i class="flaticon-vitamin"></i>
                                </div>
                                <div class="ingredients-content-two">
                                    <h3 class="title">Increased Memory</h3>
                                    <p>Remember More Achieve More</p>
                                </div>
                            </div>
                            <div class="ingredients-item-two">
                                <div class="ingredients-icon">
                                    <i class="flaticon-supplement"></i>
                                </div>
                                <div class="ingredients-content-two">
                                    <h3 class="title">Drug Interactions</h3>
                                    <p>Smart Choices, Safe Meds</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 order-3">
                        <div class="ingredients-item-wrap">
                            <div class="ingredients-item-two">
                                <div class="ingredients-icon">
                                    <i class="flaticon-vitamins"></i>
                                </div>
                                <div class="ingredients-content-two">
                                    <h3 class="title">Help release in PMS </h3>
                                    <p>Soothe the Symptoms, Find Your Calm. Take Control</p>
                                </div>
                            </div>
                            <div class="ingredients-item-two">
                                <div class="ingredients-icon">
                                    <i class="flaticon-whey-protein-3"></i>
                                </div>
                                <div class="ingredients-content-two">
                                    <h3 class="title">Natural Ingredients</h3>
                                    <p>Nature’s Way to Wellness.Straight from Nature, Straight to You</p>
                                </div>
                            </div>
                            <div class="ingredients-item-two">
                                <div class="ingredients-icon">
                                    <i class="flaticon-weight"></i>
                                </div>
                                <div class="ingredients-content-two">
                                    <h3 class="title">Strong antiaging antioxidant</h3>
                                    <p>Age Gracefully with Nature’s Defenders</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Ingredients-area-end -->

        <!-- doctors-area -->
       <section class="doctors-area section-pt-130 section-pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title section-title-two text-center mb-60">
                        <div class="sub-title">
                            <img src="{{ asset('front-assests/img/icons/sub_left.svg') }}" class="injectable"
                                alt="img">
                            Energy with Mind Care
                            <img src="{{ asset('front-assests/img/icons/sub_right.svg') }}" class="injectable"
                                alt="img">
                        </div>
                        <h2 class="title">Our Journey</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center " >
                <div class="col-xl-10 d-flex">
                    <div class="doctor-item d-md-flex d-sm-block ">
                        <div class="col-lg-3 col-md-4 col-sm-12 doctor-thumb ">
                            <img src="{{ asset('front-assests/img/others/waleedkamamu.jpg') }}" alt="img" style="height: 300px;" class="rounded-5 w-100 ">
                        </div>
                        <div class="doctor-content ms-md-5 mt-5">
                            <h4 class="title"><a href="#!">Zubair Ahmed Singhera</a></h4>
                            <span>Founder</span>
                            <p class="mt-4 text-center">Zubair Ahmed Singhera is the visionary Founder and CEO of Mindcare Pharmaceutical, a pioneering healthcare company he established in 2010. With a passion for improving lives through innovative healthcare solutions, Mr. Singhera has led Mindcare Pharmaceutical to become a respected name in the industry, driven by his commitment to excellence, quality, and patient care.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!-- doctors-area-end -->

        <!-- testimonial-area -->
        
        <!-- testimonial-area-end -->

        <!-- pricing-area -->
        {{-- <section id="pricing" class="pricing-area-two section-pt-130 section-pb-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-title section-title-two text-center mb-40">
                            <span class="sub-title">
                                <img src="{{ asset('front-assests/img/icons/sub_left.svg') }}" class="injectable"
                                    alt="img">
                                Suptex Plans
                                <img src="{{ asset('front-assests/img/icons/sub_right.svg') }}" class="injectable"
                                    alt="img">
                            </span>
                            <h2 class="title">SUPPLEMENT PACKAGES</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="pricing-item-two">
                            <div class="pricing-img-two">
                                <img src="assets/img/others/h3_pricing_img01.png" alt="img">
                            </div>
                            <div class="pricing-title-two">
                                <h2 class="title">Essential</h2>
                                <span>Any Time Money Back Guaranteed</span>
                            </div>
                            <div class="pricing-price-two">
                                <h2 class="price">$29 <span>/Monthly</span></h2>
                            </div>
                            <div class="pricing-list">
                                <ul class="list-wrap">
                                    <li>1 Person User</li>
                                    <li>30 MG Per Capsule</li>
                                    <li>60 Capsules Per Bottle</li>
                                </ul>
                            </div>
                            <div class="pricing-btn-two">
                                <a href="#!">Buy Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="pricing-item-two pricing-item-bg"
                            data-background="{{ asset('front-assests/img/others/pricing_item_bg.jpg') }}">
                            <span class="free-shipping">Free <br> Shipping</span>
                            <div class="pricing-img-two">
                                <img src="{{ asset('front-assests/img/others/h3_pricing_img02.png') }}"
                                    alt="img">
                            </div>
                            <div class="pricing-title-two">
                                <h2 class="title">premium</h2>
                                <span>Any Time Money Back Guaranteed</span>
                            </div>
                            <div class="pricing-price-two">
                                <h2 class="price">$59 <span>/Monthly</span></h2>
                            </div>
                            <div class="pricing-list">
                                <ul class="list-wrap">
                                    <li>3 Person User</li>
                                    <li>80 MG Per Capsule</li>
                                    <li>150 Capsules Per Bottle</li>
                                </ul>
                            </div>
                            <div class="pricing-btn-two">
                                <a href="#!">Buy Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="pricing-item-two">
                            <div class="pricing-img-two">
                                <img src="{{ asset('front-assests/img/others/h3_pricing_img03.png') }}"
                                    alt="img">
                            </div>
                            <div class="pricing-title-two">
                                <h2 class="title">ENTERPRISE</h2>
                                <span>Any Time Money Back Guaranteed</span>
                            </div>
                            <div class="pricing-price-two">
                                <h2 class="price">$99 <span>/Monthly</span></h2>
                            </div>
                            <div class="pricing-list">
                                <ul class="list-wrap">
                                    <li>14 Person User</li>
                                    <li>230 MG Per Capsule</li>
                                    <li>160 Capsules Per Bottle</li>
                                </ul>
                            </div>
                            <div class="pricing-btn-two">
                                <a href="#!">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- pricing-area-end -->

        <!-- faq-area -->
        <!--<section class="faq-area position-relative">-->
        <!--    <div class="row justify-content-end g-0">-->
        <!--        <div class="faq-img" data-background="{{ asset('front-assests/img/others/faq_img.jpg') }}">-->
        <!--            {{-- <a href="https://www.youtube.com/watch?v=ZbwnU1Rp7aY" class="popup-video"><i class="fa fa-play"></i></a> --}}-->
        <!--        </div>-->
        <!--        <div class="col-lg-6">-->
        <!--            <div class="faq-wrapper-two">-->
        <!--                <div class="section-title section-title-two white-title mb-40">-->
        <!--                    <span class="sub-title">-->
        <!--                        <img src="{{ asset('front-assests/img/icons/sub_left.svg') }}" class="injectable"-->
        <!--                            alt="img">-->
        <!--                        faq-->
        <!--                        <img src="{{ asset('front-assests/img/icons/sub_right.svg') }}" class="injectable"-->
        <!--                            alt="img">-->
        <!--                    </span>-->
        <!--                    <h2 class="title">Ask question</h2>-->
        <!--                </div>-->
        <!--                <div class="accordion" id="accordionExample">-->
        <!--                    <div class="accordion-item">-->
        <!--                        <h2 class="accordion-header" id="headingOne">-->
        <!--                            <button class="accordion-button" type="button" data-bs-toggle="collapse"-->
        <!--                                data-bs-target="#collapseOne" aria-expanded="true"-->
        <!--                                aria-controls="collapseOne">-->
        <!--                                What is world of spirits and cocktail ?-->
        <!--                            </button>-->
        <!--                        </h2>-->
        <!--                        <div id="collapseOne" class="accordion-collapse collapse show"-->
        <!--                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">-->
        <!--                            <div class="accordion-body">-->
        <!--                                <p>One of the best designers that turns the client pain points and requests into-->
        <!--                                    magnificent designs. Aware of all the aspect that should be considered</p>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="accordion-item">-->
        <!--                        <h2 class="accordion-header" id="headingTwo">-->
        <!--                            <button class="accordion-button collapsed" type="button"-->
        <!--                                data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"-->
        <!--                                aria-controls="collapseTwo">-->
        <!--                                VidMate app is a powerful application ?-->
        <!--                            </button>-->
        <!--                        </h2>-->
        <!--                        <div id="collapseTwo" class="accordion-collapse collapse"-->
        <!--                            aria-labelledby="headingTwo" data-bs-parent="#accordionExample">-->
        <!--                            <div class="accordion-body">-->
        <!--                                <p>One of the best designers that turns the client pain points and requests into-->
        <!--                                    magnificent designs. Aware of all the aspect that should be considered</p>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="accordion-item">-->
        <!--                        <h2 class="accordion-header" id="headingThree">-->
        <!--                            <button class="accordion-button collapsed" type="button"-->
        <!--                                data-bs-toggle="collapse" data-bs-target="#collapseThree"-->
        <!--                                aria-expanded="false" aria-controls="collapseThree">-->
        <!--                                Free Ingredients provides a searchable and abortion ?-->
        <!--                            </button>-->
        <!--                        </h2>-->
        <!--                        <div id="collapseThree" class="accordion-collapse collapse"-->
        <!--                            aria-labelledby="headingThree" data-bs-parent="#accordionExample">-->
        <!--                            <div class="accordion-body">-->
        <!--                                <p>One of the best designers that turns the client pain points and requests into-->
        <!--                                    magnificent designs. Aware of all the aspect that should be considered</p>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="accordion-item">-->
        <!--                        <h2 class="accordion-header" id="headingFour">-->
        <!--                            <button class="accordion-button collapsed" type="button"-->
        <!--                                data-bs-toggle="collapse" data-bs-target="#collapseFour"-->
        <!--                                aria-expanded="false" aria-controls="collapseFour">-->
        <!--                                How does the 30-day free software trial work?-->
        <!--                            </button>-->
        <!--                        </h2>-->
        <!--                        <div id="collapseFour" class="accordion-collapse collapse"-->
        <!--                            aria-labelledby="headingFour" data-bs-parent="#accordionExample">-->
        <!--                            <div class="accordion-body">-->
        <!--                                <p>One of the best designers that turns the client pain points and requests into-->
        <!--                                    magnificent designs. Aware of all the aspect that should be considered</p>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="accordion-item">-->
        <!--                        <h2 class="accordion-header" id="headingFive">-->
        <!--                            <button class="accordion-button collapsed" type="button"-->
        <!--                                data-bs-toggle="collapse" data-bs-target="#collapseFive"-->
        <!--                                aria-expanded="false" aria-controls="collapseFive">-->
        <!--                                Latest version through Vidmate powerful ?-->
        <!--                            </button>-->
        <!--                        </h2>-->
        <!--                        <div id="collapseFive" class="accordion-collapse collapse"-->
        <!--                            aria-labelledby="headingFive" data-bs-parent="#accordionExample">-->
        <!--                            <div class="accordion-body">-->
        <!--                                <p>One of the best designers that turns the client pain points and requests into-->
        <!--                                    magnificent designs. Aware of all the aspect that should be considered</p>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</section>-->
        <!-- faq-area-end -->

        <!-- quick-purchase-area -->
      
        <!-- quick-purchase-area-end -->

        <!-- blog-post-area -->
        {{-- <section id="news" class="blog-post-area-two section-pt-130 section-pb-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-title section-title-two text-center mb-70">
                            <span class="sub-title">
                                <img src="{{ asset('img/icons/sub_left.svg') }}" class="injectable" alt="img">
                                Read blog
                                <img src="{{ asset('img/icons/sub_right.svg') }}" class="injectable" alt="img">
                            </span>
                            <h2 class="title">Read Blog Post</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="blog-post-item-two">
                            <div class="blog-post-thumb-two">
                                <a href="blog-details.html"><img
                                        src="{{ asset('front-assests/img/blog/h3_blog_post01.jpg') }}"
                                        alt="img"></a>
                            </div>
                            <div class="blog-post-content-two">
                                <div class="blog-post-meta">
                                    <ul class="list-wrap">
                                        <li><a href="blog.html">Tutorials</a></li>
                                        <li><a href="blog.html">February. 20.2024</a></li>
                                    </ul>
                                </div>
                                <h2 class="title"><a href="blog-details.html">How to add a count up animation the
                                        webflow site.</a></h2>
                                <p>At Collax we specialize in designing, building, shipping and scaling beautiful,
                                    usable products with blazing-fast</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="blog-post-item-two">
                            <div class="blog-post-thumb-two">
                                <a href="blog-details.html"><img
                                        src="{{ asset('front-assests/img/blog/h3_blog_post02.jpg') }}"
                                        alt="img"></a>
                            </div>
                            <div class="blog-post-content-two">
                                <div class="blog-post-meta">
                                    <ul class="list-wrap">
                                        <li><a href="blog.html">Business</a></li>
                                        <li><a href="blog.html">February. 20.2024</a></li>
                                    </ul>
                                </div>
                                <h2 class="title"><a href="blog-details.html">How to grow your business with collax
                                        digital solution.</a></h2>
                                <p>At Collax we specialize in designing, building, shipping and scaling beautiful,
                                    usable products with blazing-fast</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- blog-post-area-end -->

        <!-- newsletter-area -->
        {{-- <section class="newsletter-area">
            <div class="container">
                <div class="newsletter-wrap-two">
                    <h2 class="title">Subscribe newsletter</h2>
                    <div class="newsletter-form">
                        <input type="email" placeholder="Enter your mail">
                        <button type="submit" class="btn btn-three">Subscribe</button>
                    </div>
                    <div class="shape">
                        <img src="{{ asset('front-assests/img/others/newsletter_shape.png') }}" alt="shape">
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- newsletter-area-end -->

    </main>
    <!-- main-area-end -->


    <!-- Footer-area -->
    <footer class="footer-area-two footer-bg" data-background="{{ asset('front-assests/img/bg/h3_features_bg.jpg') }}" >
        <div class="footer-top-wrap-two">
            <div class="container">
                <div class="footer-widgets-wrap footer-widgets-wrap-two">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="footer-widget">
                                <div class="footer-about">
                                    <div class="footer-logo logo">
                                        <footer class="footer-area-two footer-bg"
                                            {{-- data-background="{{ asset('front-assests/img/bg/h3_features_bg.jpg') }}"> --}}
                                            <a href="{{route('front.home')}}"><img
                                                    src="{{ asset('front-assests/img/logo/logo.png') }}"
                                                    alt="Logo"></a>
                                    </div>
                                    <div class="footer-text-two">
                                        <p>A new way to make the payments easy, <br> reliable and 100% secure.</p>
                                    </div>
                                    <div class="footer-social footer-social-two">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="footer-widget footer-widget-two">
                                <h4 class="fw-title">About Us</h4>
                                <ul class="list-wrap">
                                    <li><a href="#">About Company</a></li>
                                    <li><a href="#">Affiliate Program</a></li>
                                    <li><a href="#">Customer Spotlight</a></li>
                                    <li><a href="#">Reseller Program</a></li>
                                    <li><a href="shop.html">Our Shop</a></li>
                                    <li><a href="#">Price & Plans</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6">
                            <div class="footer-widget footer-widget-two">
                                <h4 class="fw-title">Support</h4>
                                <ul class="list-wrap">
                                    <li><a href="#">Knowledge Base</a></li>
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="#">Developer API</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Team</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-widget">
                                <h4 class="fw-title">Instagram post</h4>
                                <div class="footer-instagram-two">
                                    <ul class="list-wrap">
                                        <li class="footer-insta-item">
                                            <a href="{{ asset('front-assests/img/others/instagram_post01.jpg') }}"
                                                class="popup-image"><img
                                                    src="{{ asset('front-assests/img/others/instagram_post01.jpg') }}"
                                                    alt="img"></a>
                                        </li>
                                        <li class="footer-insta-item">
                                            <a href="{{ asset('front-assests/img/others/instagram_post02.jpg') }}"
                                                class="popup-image"><img
                                                    src="{{ asset('front-assests/img/others/instagram_post02.jpg') }}"
                                                    alt="img"></a>
                                        </li>
                                        <li class="footer-insta-item">
                                            <a href="{{ asset('front-assests/img/others/instagram_post03.jpg') }}"
                                                class="popup-image"><img
                                                    src="{{ asset('front-assests/img/others/instagram_post03.jpg') }}"
                                                    alt="img"></a>
                                        </li>
                                        <li class="footer-insta-item">
                                            <a href="{{ asset('front-assests/img/others/instagram_post04.jpg') }}"
                                                class="popup-image"><img
                                                    src="{{ asset('front-assests/img/others/instagram_post04.jpg') }}"
                                                    alt="img"></a>
                                        </li>
                                        <li class="footer-insta-item">
                                            <a href="{{ asset('front-assests/img/others/instagram_post05.jpg') }}"
                                                class="popup-image"><img
                                                    src="{{ asset('front-assests/img/others/instagram_post05.jpg') }}"
                                                    alt="img"></a>
                                        </li>
                                        <li class="footer-insta-item">
                                            <a href="{{ asset('front-assests/img/others/instagram_post06.jpg') }}"
                                                class="popup-image"><img
                                                    src="{{ asset('front-assests/img/others/instagram_post06.jpg') }}"
                                                    alt="img"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="footer-shape one">-->
            <!--    <img src="{{ asset('front-assests/img/others/footer_shape01.png') }}" alt="img"-->
            <!--        class="wow fadeInLeft" data-wow-delay=".3s" data-wow-duration="1s">-->
            <!--</div>-->
            <!--<div class="footer-shape two">-->
            <!--    <img src="{{ asset('front-assests/img/others/footer_shape02.png') }}" alt="img"-->
            <!--        class="wow fadeInRight" data-wow-delay=".3s" data-wow-duration="1s">-->
            <!--</div>-->
        </div>
        <div class="copyright-wrap-two">
            <div class="container">
                <div class="copyright-wrap-inner">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <div class="copyright-text">
                                <p>Copyright © 2024 Hs Developers All Rights Reserved.</p>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="payment-card text-center text-md-end">
                                <!--<img src="{{ asset('front-assests/img/others/card_img.png') }}" alt="card">-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer-area-end -->





    <!-- JS here -->
    <script src="{{ asset('front-assests/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('front-assests/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front-assests/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('front-assests/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('front-assests/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('front-assests/js/jquery.odometer.min.js') }}"></script>
    <script src="{{ asset('front-assests/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('front-assests/js/jquery.paroller.min.js') }}"></script>
    <script src="{{ asset('front-assests/js/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('front-assests/js/jquery.inview.min.js') }}"></script>
    <script src="{{ asset('front-assests/js/jquery.easing.js') }}"></script>
    <script src="{{ asset('front-assests/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('front-assests/js/svg-inject.min.js') }}"></script>
    <script src="{{ asset('front-assests/js/jarallax.min.js') }}"></script>
    <script src="{{ asset('front-assests/js/slick.min.js') }}"></script>
    <script src="{{ asset('front-assests/js/validator.js') }}"></script>
    <script src="{{ asset('front-assests/js/ajax-form.js') }}"></script>
    <script src="{{ asset('front-assests/js/wow.min.js') }}"></script>
    <script src="{{ asset('front-assests/js/main.js') }}"></script>
    <script>
        SVGInject(document.querySelectorAll("img.injectable"));
    </script>

    <script>
        function addtocart(productId) {
            $.ajax({
                url: '{{ route("front.addtocart") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: productId
                },
                success: function(response) {
                    if(response.status) {
                        window.location.href = '{{ route("front.cart") }}';
                    } else {
                        alert(response.message);
                    }
                },
                <!--error: function(response) {-->
                <!--    alert('Error adding product to cart.');-->
                <!--}-->
            });
        }
    </script>
</body>

</html>
