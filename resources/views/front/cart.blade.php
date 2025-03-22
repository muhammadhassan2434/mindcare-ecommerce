@extends('front.layouts.app')

@section('content')
<main class="main-area fix">

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="breadcrumb-content text-center">
                        <h2 class="title">Cart Page</h2>
                        <nav aria-label="Breadcrumbs" class="breadcrumb-trail">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item trail-item trail-begin">
                                    <a href="{{ route('front.home') }}"><span>Home</span></a>
                                </li>
                                <li class="breadcrumb-item trail-item trail-end"><span>Cart</span></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="video-shape one"><img src="{{ asset('front-assests/img/others/video_shape01.png') }}" alt="shape"></div>-->
        <!--<div class="video-shape two"><img src="{{ asset('front-assests/img/others/video_shape02.png') }}" alt="shape"></div>-->
    </section>
    <!-- breadcrumb-area-end -->

    <!-- cart-area -->
    <div class="cart__area section-py-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <table class="table cart__table">
                        <thead>
                            <tr>
                                <th class="product__thumb">&nbsp;</th>
                                <th class="product__name">Product</th>
                                <th class="product__price">Price</th>
                                <th class="product__quantity">Quantity</th>
                                <th class="product__subtotal">Subtotal</th>
                                <th class="product__remove">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cartcontent as $item)
                            <tr>
                                <td class="product__thumb">
                                    {{-- <a href="shop-details.html"><img src="{{ asset($item->product_images->image) }}" alt=""></a> --}}
                                </td>
                                <td class="product__name">
                                    {{ $item->name }}

                                </td>
                                <td class="product__price">RS {{ $item->price }}</td>
                                <td class="product__quantity">
                                    <div class="quickview-cart-plus-minus">
                                        <input type="text" value="{{ $item->qty }}" data-id="{{ $item->rowId }}" class="qty-input">
                                    </div>
                                </td>
                                <td class="product__subtotal">RS {{ $item->price * $item->qty }}</td>
                                <td class="product__remove">
                                    <a href="javascript:void(0);" onclick="deleteItem('{{ $item->rowId }}')">×</a>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="6" class="cart__actions">
                                    <div class="update__cart-btn text-end f-right">
                                        <button type="submit" class="btn btn-sm" onclick="updateCart()">Update cart</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4">
                    <div class="cart__collaterals-wrap">
                        <h2 class="title">Cart totals</h2>
                        <ul class="list-wrap">
                            <li>Subtotal <span>RS {{ Cart::subtotal() }}</span></li>
                            <li>Total <span class="amount">RS {{ Cart::subtotal() }}</span></li>
                        </ul>
                        <a href="{{ route('front.checkout') }}" class="btn btn-sm">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-area-end -->

</main>
@endsection

@section('js')
<script>
    function updateCart() {
        $('.qty-input').each(function() {
            var rowId = $(this).data('id');
            var qty = $(this).val();
            $.ajax({
                url: '{{ route("front.updatecart") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    rowId: rowId,
                    qty: qty
                },
                success: function(response) {
                    if(response.status) {
                        window.location.reload();
                    } else {
                        alert(response.message);
                    }
                }
            });
        });
    }

    function deleteItem(rowId) {
        if(confirm("Are you sure you want to delete this item?")) {
            $.ajax({
                url: '{{ route("front.deleteitem.cart") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    rowId: rowId
                },
                success: function(response) {
                    
                    if(response.status) {
                    } else {
                        window.location.reload();
                        alert(response.message);
                    }
                }
            });
        }
    }
</script>
@endsection
