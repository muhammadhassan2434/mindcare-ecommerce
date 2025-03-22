@extends('front.layouts.app')

@section('content')
<main class="main-area fix">

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="breadcrumb-content text-center">
                        <h2 class="title">Checkout</h2>
                        <nav aria-label="Breadcrumbs" class="breadcrumb-trail">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item trail-item trail-begin">
                                    <a href="{{ route('front.home') }}"><span>Home</span></a>
                                </li>
                                <li class="breadcrumb-item trail-item trail-end"><span>Checkout</span></li>
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

    <!-- checkout-area -->
    <div class="checkout__area section-py-130">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="coupon__code-wrap">
                        <div class="coupon__code-info">
                            <span><i class="far fa-bookmark"></i> Have a coupon?</span>
                            <a href="#" id="coupon-element">Click here to enter your code</a>
                        </div>
                        <form action="#" class="coupon__code-form">
                            <p>If you have a coupon code, please apply it below.</p>
                            <input type="text" placeholder="Coupon code">
                            <button type="submit" class="btn btn-sm">Apply coupon</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-7">
                    <form action="{{ route('front.processcheckout') }}" method="POST" class="customer__form-wrap">
                        @csrf
                        <span class="title">Billing Details</span>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-grp">
                                    <label for="first-name">First name *</label>
                                    <input type="text" id="first-name" name="first_name" value="{{ $customeradress->first_name ?? '' }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-grp">
                                    <label for="last-name">Last name *</label>
                                    <input type="text" id="last-name" name="last_name" value="{{ $customeradress->last_name ?? '' }}" required>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-grp">
                            <label for="company-name">Company name (optional)</label>
                            <input type="text" id="company-name" name="company_name" value="{{ $customeradress->company_name ?? '' }}">
                        </div> --}}
                        <div class="form-grp select-grp">
                            <label for="country">Country / Region *</label>
                            <select id="country" name="country" class="country-name" required>
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}" {{ ($customeradress->country_id ?? '') == $country->id ? 'selected' : '' }}>
                                        {{ $country->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-grp">
                            <label for="street-address">Street address *</label>
                            <input type="text" id="street-address" name="address" value="{{ $customeradress->address ?? '' }}" placeholder="House number and street name" required>
                        </div>
                        <div class="form-grp">
                            <input type="text" id="street-address-two" name="apartment" value="{{ $customeradress->apartment ?? '' }}" placeholder="Apartment, suite, unit, etc. (optional)">
                        </div>
                        <div class="form-grp">
                            <label for="town-name">Town / City *</label>
                            <input type="text" id="town-name" name="city" value="{{ $customeradress->city ?? '' }}" required>
                        </div>
                        <div class="form-grp select-grp">
                            <label for="state">State *</label>
                            <input type="text" id="state" name="state" value="{{ $customeradress->state ?? '' }}" required>
                        </div>
                        <div class="form-grp">
                            <label for="zip-code">ZIP Code *</label>
                            <input type="text" id="zip-code" name="zip" value="{{ $customeradress->zip ?? '' }}" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-grp">
                                    <label for="phone">Phone *</label>
                                    <input type="text" id="phone" name="mobile" value="{{ $customeradress->mobile ?? '' }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-grp">
                                    <label for="email">Email address *</label>
                                    <input type="email" id="email" name="email" value="{{ $customeradress->email ?? '' }}" required>
                                </div>
                            </div>
                        </div>
                        <span class="title title-two">Additional Information</span>
                        <div class="form-grp">
                            <label for="note">Order notes (optional)</label>
                            <textarea id="note" name="order_notes" placeholder="Notes about your order, e.g. special notes for delivery.">{{ $customeradress->notes ?? '' }}</textarea>
                        </div>
                        <div class="form-grp">
                            <label for="payment-method">Payment Method *</label>
                            <select id="payment-method" name="payment_status" required>
                                <option value="cod">Cash on Delivery</option>
                                {{-- <option value="stripe">Credit Card (Stripe)</option> --}}
                            </select>
                        </div>
                        <div id="card-payment-form" class="d-none">
                            <!-- Add your stripe payment form here -->
                        </div>
                        <button type="submit" class="btn btn-sm">Place order</button>
                    </form>
                </div>
                <div class="col-lg-5">
                    <div class="order__info-wrap">
                        <h2 class="title">YOUR ORDER</h2>
                        <ul class="list-wrap">
    <li class="title">Product <span>Subtotal</span></li>
    
    @php
        $total = 0; // Initialize the total amount
        $deliveryCharge = $totalShippingCharge; // Set delivery charge from backend settings
    @endphp

    @foreach(Cart::content() as $item)
        @php
            $itemSubtotal = $item->price * $item->qty; // Calculate subtotal for each item
            $total += $itemSubtotal; // Add item subtotal to total
        @endphp
        <li>{{ $item->name }} × {{ $item->qty }} <span>RS {{ $itemSubtotal }}</span></li>
    @endforeach

    @php
        // Apply free shipping if total is more than 5000
        if ($total > 5000) {
            $deliveryCharge = 0; // Free shipping for orders over 5000
        }
        $grandTotal = $total + $deliveryCharge; // Calculate grand total
    @endphp

    <li>Shipping <span id="shippingAmount">RS {{ $deliveryCharge }}</span></li>
    <li>Total <span id="grandTotal">RS {{ $grandTotal }}</span></li>
</ul>


                        <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="#">privacy policy.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout-area-end -->

</main>
@endsection

@section('js')
<script>
    $("#payment-method").change(function(){
        if($(this).val() == 'cod'){
            $("#card-payment-form").addClass('d-none');
        } else {
            $("#card-payment-form").removeClass('d-none');
        }
    });

    $('#country').change(function() {
        $.ajax({
            url: "{{ route('front.getOrdersummary') }}",
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                country_id: $(this).val()
            },
            dataType: 'json',
            success: function(response) {
                if(response.status == true){
                    $("#shippingAmount").html('RS ' + response.shippingCharge);
                    $("#grandTotal").html('RS ' + response.grandtotal);
                }
            },
        });
    });
</script>
@endsection
