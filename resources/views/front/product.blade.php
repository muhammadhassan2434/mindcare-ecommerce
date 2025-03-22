@extends('front.layouts.app')

@section('content')
    <main class="main-area fix">

        <!-- breadcrumb-area -->
        <section class="breadcrumb-area breadcrumb-bg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="breadcrumb-content text-center">
                            <h2 class="title">{{ $product->title }}</h2>
                            <nav aria-label="Breadcrumbs" class="breadcrumb-trail">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item trail-item trail-begin">
                                        <a href="{{ route('front.home') }}"><span>Home</span></a>
                                    </li>
                                    <li class="breadcrumb-item trail-item trail-end"><span>{{ $product->title }}</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- shop-details-area -->
        <section class="inner-shop-details-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="inner-shop-details-flex-wrap">
                            <div class="inner-shop-details-img-wrap">
                                <div class="tab-content" id="myTabContent">
                                    @if($product)
                                    @php
                                    
                                        $productimage = $product->product_images->first();
                                        // dd($productimage->image);
                                    @endphp
                                        @if (!empty($productimage->image))
                                            <img class="card-img-top" src="{{ asset($productimage->image) }}"  alt="Product Image"/>
                                        @else
                                            <img class="card-img-top" src="{{ asset('admin-assests/img/default-150x150.png') }}" alt="Default Image" />
                                        @endif
                                    </div>
                                @else
                                    <p>No product found.</p>
                                @endif
                                
                                
                            </div>
                            <div class="inner-shop-details-nav-wrap">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    @foreach ($product->product_images as $key => $image)
                                        <li class="nav-item" role="presentation">
                                            <a href="#" class="nav-link {{ $key == 0 ? 'active' : '' }}"
                                                id="item-{{ $key }}-tab" data-bs-toggle="tab"
                                                data-bs-target="#item-{{ $key }}" role="tab"
                                                aria-controls="item-{{ $key }}" aria-selected="true">
                                                <img src="{{ asset('uploads/product/' . $image->image) }}" alt="">
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="inner-shop-details-content">
                            <h4 class="title">{{ $product->title ?? 'N/A' }}</h4>
                            <div class="inner-shop-details-meta">
                                <ul class="list-wrap">
                                    <li>Brand: <a
                                            href="#">{{ $product->brand->name ? $product->brand->name : 'No Brand Available' }}</a>
                                    </li>
                                    {{-- <li class="inner-shop-details-review">
                                    <div class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span>(4.5)</span>
                                </li> --}}
                                    <li>Sku: <span>{{ $product->sku }}</span></li>
                                </ul>
                            </div>
                            <div class="inner-shop-details-price">
                                <h2 class="price">RS {{ $product->price }}</h2>
                                <h5 class="stock-status">- {{ $product->stock_status }}</h5>
                            </div>
                            <p>{{ $product->description }}</p>
                            <div class="inner-shop-details-list">
                                <ul class="list-wrap">
                                    {{ $product->short_description }}
                                </ul>
                            </div>
                            <div class="inner-shop-perched-info">
                                <div class="sd-cart-wrap">
                                    <form>
                                        <div class="quickview-cart-plus-minus">
                                            <input type="number" value="1" id="qty-input" min="1">
                                        </div>
                                    </form>
                                </div>
                                <a href="javascript:void(0);" onclick="addToCart({{ $product->id }})" class="cart-btn">Add
                                    to Cart</a>
                                {{-- <a href="{{ route('front.product', $product->slug) }}" class="wishlist-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist"><i class="far fa-heart"></i></a> --}}
                            </div>
                            <div class="inner-shop-details-bottom">
                                <span><span>Tags: <a href="#">{{ $product->slug }}</a></span></span>
                                <span>
                                    <span>Category: {{ $product->category->name ?? 'N/a' }}

                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-desc-wrap">
                            <ul class="nav nav-tabs" id="myTabTwo" role="tablist">
                                <li class="nav-item">
                                    <a href="#" class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                        data-bs-target="#description" role="tab" aria-controls="description"
                                        aria-selected="true">Description</a>
                                </li>
                                {{-- <li class="nav-item">
                                <a href="#" class="nav-link" id="information-tab" data-bs-toggle="tab" data-bs-target="#information" role="tab" aria-controls="information" aria-selected="false">Additional information</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" role="tab" aria-controls="review" aria-selected="false">Reviews (3)</a>
                            </li> --}}
                            </ul>
                            <div class="tab-content" id="myTabContentTwo">
                                <div class="tab-pane fade show active" id="description" role="tabpanel"
                                    aria-labelledby="description-tab">
                                    <div class="product-desc-content">
                                       <h4 class="title">The true strength of {{ $product->title ?? 'N/A' }} :</h4>
<p>{{ $product->description }}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- shop-details-area-end -->

        <!-- related-products -->
        {{-- <div class="related-products-area pb-120">
            <div class="container">
                <div class="related-products-wrap">
                    <h2 class="title">Related Products</h2>

                    <div class="row">
                        @if ($relatedProducts->isNotEmpty())
                            @foreach ($relatedProducts as $product)
                                @php
                                    $productimage = $product->product_images->first();
                                @endphp
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="home-shop-item inner-shop-item">
                                        <div class="home-shop-thumb">
                                            <a href="shop-details.html">
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
                                            <div class="shop-item-cat"><a>{{ $product->slug }}</a></div>
                                            <h4 class="title"><a >{{ $product->title }}</a></h4>
                                            <span class="home-shop-price">RS {{ $product->price }}</span>
                                            <div class="shop-content-bottom">
                                                <a href="javascript:void(0);" class="cart" onclick="addtocart({{ $product->id }})">
                                                    <i class="flaticon-shopping-cart-1"></i>
                                                </a>
                                                
                                                <a href="{{ route('front.product', $product->slug) }}"
                                                    class="btn btn-two">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- related-products-end -->

    </main>
@endsection

@section('js')
    <script>
        function addToCart(productId) {
            var qty = $('#qty-input').val();
            $.ajax({
                url: '{{ route('front.addtocart') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: productId,
                    qty: qty
                },
                success: function(response) {
                    if (response.status) {
                        alert(response.message);
                        window.location.href = '{{ route('front.cart') }}';
                    } else {
                        alert(response.message);
                    }
                }
            });
        }
    </script>
@endsection
