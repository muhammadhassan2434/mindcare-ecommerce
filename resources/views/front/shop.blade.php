


@extends('front.layouts.app')

@section('content')
    <main class="main-area fix">

        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="breadcrumb-content text-center">
                            <h2 class="title">Our Shop</h2>
                            <nav aria-label="Breadcrumbs" class="breadcrumb-trail">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item trail-item trail-begin">
                                        <a href="{{route('front.home')}}"><span>Home</span></a>
                                    </li>
                                    <li class="breadcrumb-item trail-item trail-end"><span>Our Shop</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="video-shape one"><img src="{{ asset('front-assests/img/others/video_shape01.png') }}"-->
            <!--        alt="shape"></div>-->
            <!--<div class="video-shape two"><img src="{{ asset('front-assests/img/others/video_shape02.png') }}"-->
            <!--        alt="shape"></div>-->
        </section>
        <!-- breadcrumb-area-end -->

        <div class="inner-shop-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-3 col-lg-4 col-md-8 col-sm-8">
                        <aside class="shop-sidebar">
                            <div class="widget">
                                <h4 class="sidebar-title">Filter by Price</h4>
                                <div class="price_filter">
                                    <form id="filterForm" method="GET" action="{{ route('front.shop') }}">
                                        <div id="slider-range"></div>
                                        <div class="price_slider_amount">
                                            <span>Price :</span>
                                            <input type="text" id="amount" readonly />
                                            <input type="hidden" id="price_min" name="price_min"
                                                value="{{ $pricemin ?? 0 }}" />
                                            <input type="hidden" id="price_max" name="price_max"
                                                value="{{ $pricemax ?? 10000 }}" />
                                            <input type="submit" class="btn" value="Filter">
                                        </div>
                                    </form>
                                </div>

                            </div>

                            <div class="widget">
                                <h4 class="sidebar-title">CATEGORIES</h4>
                                <ul class="categories-list list-wrap">
    @foreach ($categories as $category)
        <li>
            <a href="{{ route('front.shop', ['category_id' => $category->id] + request()->except('category_id', 'page')) }}"> <!-- Updated link with filters -->
                {{ $category->name }} <i class="fas fa-angle-double-right"></i>
            </a>
        </li>
    @endforeach
</ul>

                            </div>
                            <div class="widget">
                                <h4 class="sidebar-title">LATEST PRODUCTS</h4>
                                <div class="lp-post-list">
                                    <ul class="lp-post-item list-wrap">

                                        @if ($leatest_products->isNotEmpty())
                                            @foreach ($leatest_products as $leatest_product)
                                                {{-- @php
                                $productimage = $product->product_images->first();
                            @endphp --}}
                                                <li>
                                                    <div class="lp-post-thumb">
                                                        <a href="{{ route('front.product', $leatest_product->slug) }}">
                                                            @if (!empty($productimage->image))
                                                                <img class="card-img-top"
                                                                    src="{{ asset('uploads/product/small/' . $productimage->image) }}" />
                                                            @else
                                                                <img class="card-img-top"
                                                                    src="{{ asset('admin-assests/img/default-150x150.png') }}"
                                                                    alt="" />
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="lp-post-content">
                                                        <!--<ul class="lp-post-rating list-wrap">-->
                                                        <!--    <li>-->
                                                        <!--        <i class="fas fa-star"></i>-->
                                                        <!--        <i class="fas fa-star"></i>-->
                                                        <!--        <i class="fas fa-star"></i>-->
                                                        <!--        <i class="fas fa-star"></i>-->
                                                        <!--        <i class="fas fa-star"></i>-->
                                                        <!--    </li>-->
                                                        <!--</ul>-->
                                                        <h4 class="title"><a
                                                                href="{{ route('front.product', $leatest_product->slug) }}">{{ $leatest_product->title }}</a>
                                                        </h4>
                                                        <span class="price">RS {{ $leatest_product->price }}</span>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="widget">
                                <h4 class="sidebar-title">Product tags</h4>
                                <ul class="Product-tag-list list-wrap">

                                    @foreach ($products as $product)
                                        <li><a href="{{ route('front.shop') }}">{{ $product->sku }}</a></li>
                                    @endforeach

                                </ul>
                            </div>
                        </aside>
                    </div>

                    <div class="col-xl-9 col-lg-8 col-md-12 col-sm-8 shop-sidebar-pad order-first">
                        <div class="shop-top-wrap">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="shop-top-left">
                                        <p class="woocommerce-result-count shop-show-result">
                                            Showing {{ $products->firstItem() }}-{{ $products->lastItem() }} of {{ $products->total() }} results
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="shop-top-right selection">
                                        <form class="woocommerce-ordering mb-0" method="get" action="{{ url()->current() }}">
                                            <select id="sort" name="sort" class="form-control" onchange="this.form.submit()">
                                                <option value="latest" {{ $sort == 'latest' ? 'selected' : '' }}>Latest</option>
                                                <option value="price_desc" {{ $sort == 'price_desc' ? 'selected' : '' }}>Price High</option>
                                                <option value="price_asc" {{ $sort == 'price_asc' ? 'selected' : '' }}>Price Low</option>
                                            </select>
                                            <!-- Retain any filters that have been applied -->
                                            @foreach(request()->except('sort', 'page') as $key => $value)
                                                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                            @endforeach
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="suxnix-shop-product-main">
                            <div class="row">
                                @if ($products->isNotEmpty())
                                    @foreach ($products as $product)
                                        @php
                                            $productimage = $product->product_images->first();
                                        @endphp
                                        <div class="col-xl-4 col-lg-6 col-md-6">
                                            <div class="home-shop-item inner-shop-item">
                                                <div class="home-shop-thumb">
                                                    <a href="{{ route('front.product', $product->slug) }}">
                                                        @if (!empty($productimage->image))
                                                            <img class="card-img-top" src="{{ asset($productimage->image) }}" />
                                                        @else
                                                            <img class="card-img-top"
                                                                src="{{ asset('admin-assests/img/default-150x150.png') }}"
                                                                alt="" />
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="home-shop-content">
                                                    <div class="shop-item-cat"><a href="#">{{ $product->slug }}</a></div>
                                                    <h4 class="title"><a href="{{ route('front.product', $product->slug) }}">{{ $product->title }}</a></h4>
                                                    <span class="home-shop-price">RS {{ $product->price }}</span>
                                                    <div class="shop-content-bottom">
                                                        <a href="javascript:void(0);" class="cart" onclick="addtocart({{ $product->id }})">
                                                            <i class="flaticon-shopping-cart-1"></i>
                                                        </a>
                                                        <a href="{{ route('front.product', $product->slug) }}" class="btn btn-two">Buy Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="pagination-wrap">
                                <ul class="list-wrap">
                                    <!-- Previous Page Link -->
                                    @if ($products->onFirstPage())
                                        <li class="prv-next disabled"><a><i class="fas fa-angle-double-left"></i></a></li>
                                    @else
                                        <li class="prv-next"><a href="{{ $products->previousPageUrl() }}"><i
                                                    class="fas fa-angle-double-left"></i></a></li>
                                    @endif

                                    <!-- Pagination Elements -->
                                    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                        @if ($page == $products->currentPage())
                                            <li><a href="{{ $url }}" class="current">{{ $page }}</a>
                                            </li>
                                        @else
                                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                                        @endif
                                    @endforeach

                                    <!-- Next Page Link -->
                                    @if ($products->hasMorePages())
                                        <li class="prv-right"><a href="{{ $products->nextPageUrl() }}"><i
                                                    class="fas fa-angle-double-right"></i></a></li>
                                    @else
                                        <li class="prv-right disabled"><a><i class="fas fa-angle-double-right"></i></a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                            <!-- Pagination -->
                            <!-- Existing pagination code here -->

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            var slider = $("#slider-range").ionRangeSlider({
                type: "double",
                min: 0,
                max: 10000,
                from: {{ $pricemin ?? 0 }},
                to: {{ $pricemax ?? 1000 }},
                step: 10,
                skin: "round",
                prefix: "RS",
                onFinish: function(data) {
                    $('#price_min').val(data.from);
                    $('#price_max').val(data.to);
                    $('#filterForm').submit();
                }
            }).data("ionRangeSlider");

            $("#slider-range").on("change", function() {
                var range = slider.result;
                $("#amount").val("RS " + range.from + " - RS " + range.to);
            });
        });

        $('#sort').change(function() {
            apply_filters();
        });

        function apply_filters() {
            var brands = [];

            $(".brand-label").each(function() {
                if ($(this).is(":checked") == true) {
                    brands.push($(this).val());
                }
            });

            var url = '{{ url()->current() }}?';

            // brand filter
            if (brands.length > 0) {
                url += '&brand=' + brands.toString();
            }
            // price range filter
            url += '&price_min=' + slider.result.from + '&price_max=' + slider.result.to;

            // sorting filter
            url += '&sort=' + $('#sort').val();

            window.location.href = url;
        }

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
                // error: function(response) {
                //     alert('Error adding product to cart.');
                // }
            });
        }
    </script>
@endsection
