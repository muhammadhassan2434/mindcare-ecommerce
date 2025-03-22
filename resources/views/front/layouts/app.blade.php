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
    <link rel="stylesheet" href="{{ asset('front-assests/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assests/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assests/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front-assests/css/responsive.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/ion-rangeslider@2.3.1/css/ion.rangeSlider.min.css" rel="stylesheet" />

</head>

<body>

    <!-- Pre-loader-start -->
    <div id="preloader">
        <div class="tg-cube-grid">
            <div class="tg-cube tg-cube1"></div>
            <div class="tg-cube tg-cube2"></div>
            <div class="tg-cube tg-cube3"></div>
            <div class="tg-cube tg-cube4"></div>
            <div class="tg-cube tg-cube5"></div>
            <div class="tg-cube tg-cube6"></div>
            <div class="tg-cube tg-cube7"></div>
            <div class="tg-cube tg-cube8"></div>
            <div class="tg-cube tg-cube9"></div>
        </div>
    </div>
    <!-- Pre-loader-end -->

    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->
    <header id="home">
        <div id="sticky-header" class="menu-area transparent-header">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="mobile-nav-toggler"><i class="flaticon-layout"></i></div>
                        <div class="menu-wrap">
                            <nav class="menu-nav">
                                <div class="logo">
                                    <a href="{{ route('front.home') }}">
                                        <img src="{{ asset('front-assests/img/logo/logo.png') }}" alt="Logo"
                                            class="main-logo">
                                        <img src="{{ asset('front-assests/img/logo/logo.png') }}" alt="Logo"
                                            class="secondary-logo">
                                    </a>
                                </div>
                                <div class="navbar-wrap main-menu d-none d-xl-flex">
                                    <ul class="navigation">
                                        <li><a href="{{ route('front.home') }}">Home</a></li>
                                        <li><a href="{{ route('front.home') }}">Features</a></li>
                                        <li><a href="{{ route('front.shop') }}">Product</a></li>
                                        <li><a href="{{route("front.healthAndBeauty")}}">Health And Beauty</a></li>
                                        <!--<li><a href="{{ route('front.home') }}">Pricing</a></li>-->
                                        <li class="menu-item-has-children active"><a href="{{ route('front.shop') }}">Shop</a>
                                            <ul class="sub-menu">
                                                <li class="active"><a href="{{ route('front.shop') }}">Our Shop</a>
                                                </li>
                                                {{-- <li><a href="shop-">Shop Details</a></li> --}}
                                                <li><a href="{{ route('front.cart') }}">Cart Page</a></li>
                                                {{-- <li><a href="checkout.html">Checkout Page</a></li> --}}
                                                {{-- <li><a href="{{ route('account.login') }}">Login Page</a></li> --}}
                                                {{-- <li><a href="{{ route('account.register') }}">Register Page</a></li> --}}
                                                {{-- <li><a href="reset-password.html">Reset Password Page</a></li> --}}
                                            </ul>
                                        </li>
                                        {{-- <li class="menu-item-has-children"><a href="index.html#news">News</a>
                                                <ul class="sub-menu">
                                                    <li><a href="blog.html">Our Blog</a></li>
                                                    <li><a href="blog-details.html">Blog Details</a></li>
                                                </ul>
                                            </li> --}}
                                        <li><a href="{{ route('front.contact') }}">contacts</a></li>
                                    </ul>
                                </div>
                                <div class="header-action d-none d-sm-block">
                                    <ul>
                                        <li class="header d-none d-sm-flex">
                                            @if (Auth::check())
                                                <a href="{{ route('account.profile') }}">
                                                    <i class="flaticon-user"></i> {{ Auth::user()->name }}
                                                </a>
                                            @else
                                                <a href="{{ route('account.login') }}">
                                                    <i class="flaticon-login"></i> Login
                                                </a>
                                            @endif
                                        </li>
                                        <li class="header-shop-cart">
                                            <a href="{{ route('front.cart') }}" class="cart-count">
                                                <i class="flaticon-shopping-cart"></i>
                                                <span class="mini-cart-count">{{ Cart::count() }}</span>
                                            </a>
                                            <div class="header-mini-cart">
                                                <ul
                                                    class="woocommerce-mini-cart cart_list product_list_widget list-wrap">
                                                    @foreach (Cart::content() as $item)
                                                        <li
                                                            class="woocommerce-mini-cart-item d-flex align-items-center">
                                                            <a href="javascript:void(0);"
                                                                class="remove remove_from_cart_button"
                                                                onclick="deleteItem('{{ $item->rowId }}')">×</a>
                                                            <div class="mini-cart-img">
                                                                {{-- <img src="{{ asset('uploads/product/small/' . $item->options->productimage->image) }}" --}}
                                                                    {{-- alt="{{ $item->name }}"> --}}
                                                            </div>
                                                            <div class="mini-cart-content">
                                                                <h4 class="product-title"><a
                                                                        href="{{ route('front.product', $item->id) }}">{{ $item->name }}</a>
                                                                </h4>
                                                                <div class="mini-cart-price">{{ $item->qty }} ×
                                                                    <span class="woocommerce-Price-amount amount">RS
                                                                        {{ $item->price }}</span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <p class="woocommerce-mini-cart__total">
                                                    <strong>Subtotal:</strong>
                                                    <span class="woocommerce-Price-amount">RS
                                                        {{ Cart::subtotal() }}</span>
                                                </p>
                                                <p class="checkout-link">
                                                    <a href="{{ route('front.cart') }}"
                                                        class="button wc-forward">View cart</a>
                                                    <a href="{{ route('front.checkout') }}"
                                                        class="button checkout wc-forward">Checkout</a>
                                                </p>
                                            </div>
                                        </li>
                                        
                                        <li class="offCanvas-btn d-none d-xl-block"><a href="#"
                                                class="navSidebar-button"><i class="flaticon-layout"></i></a>
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
                    <a href="index.html"><img src="{{ asset('front-assests/img/logo/logo.png') }}"
                            alt="Logo"></a>
                </div>
                <div class="menu-outer">
                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                </div>
                <div class="social-links">
                    <ul class="clearfix">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
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
                    <h3 class="title">Getting all of the <span>Nutrients</span> you need simply cannot be done without
                        supplements.</h3>
                    <p>Nam libero tempore, cum soluta nobis eligendi cumque quod placeat facere possimus assumenda omnis
                        dolor repellendu sautem temporibus officiis</p>
                </div>
                <div class="offcanvas-contact">
                    <h4 class="number">+93 3006624307</h4>
                    <h4 class="email">mindcare74@gmail.com</h4>
                    <p>P181 Valencia Garden Samundri Road,<br>Faisalabad, Pakisatan</p>
                    <ul class="offcanvas-social list-wrap">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="offCanvas-overlay"></div>
        <!-- offCanvas-end -->

    </header>
    <!-- header-area-end -->


    <!-- main-area -->
    @yield('content')
    <!-- main-area-end -->


    <!-- Footer-area -->
    <footer class="footer-area not-show-instagram">
        <div class="footer-top-wrap">
            <div class="container">
                <div class="footer-widgets-wrap">
                    <div class="row">
                        <div class="col-lg-4 col-md-7">
                            <div class="footer-widget">
                                <div class="footer-about">
                                    <div class="footer-logo logo">
                                        <a href="index.html"><img
                                                src="{{ asset('front-assests/img/logo/logo.png') }}"
                                                alt="Logo"></a>
                                    </div>
                                    <div class="footer-text">
                                        <p>Making beauty especially relating complot especial common questions tend to
                                            recur through posts or queries standards vary orem donor command tei.</p>
                                    </div>
                                    <div class="footer-social">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-5 col-sm-6">
                            <div class="footer-widget">
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
                        <div class="col-lg-2 col-md-5 col-sm-6">
                            <div class="footer-widget">
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
                        <div class="col-lg-3 col-md-5">
                            <div class="footer-widget">
                                <h4 class="fw-title">CONTACT US</h4>
                                <div class="footer-contact-wrap">
                                    <p>P181 Valencia Garden Samundri Road,<br>Faisalabad, Pakisatan</p>
                                    <ul class="list-wrap">
                                        <li class="phone"><i class="fas fa-phone"></i> +92 3006624307</li>
                                        <!--<li class="mail"><i class="fas fa-envelope"></i> Suxnix@example.com</li>-->
                                        <li class="website"><i class="fas fa-globe"></i> mindcarepharmaceuticals.com</li>
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
        <div class="copyright-wrap">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-7">
                        <div class="copyright-text">
                            <p>Copyright © 2024 Suxnix All Rights Reserved.</p>
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
    </footer>
    <!-- Footer-area-end -->

    <script>
        function deleteItem(rowId) {
            if (confirm("Are you sure you want to delete this item?")) {
                $.ajax({
                    url: '{{ route('front.deleteitem.cart') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        rowId: rowId
                    },
                    success: function(response) {
                        if (response.status) {
                            window.location.reload();
                        } else {
                            alert(response.message);
                        }
                    }
                });
            }
        }
    </script>




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
    <script src="https://cdn.jsdelivr.net/npm/ion-rangeslider@2.3.1/js/ion.rangeSlider.min.js"></script>

    @yield('js')
    <script>
        SVGInject(document.querySelectorAll("img.injectable"));
    </script>
</body>

</html>
