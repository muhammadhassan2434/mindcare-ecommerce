@extends('front.layouts.app')

@section('content')
<main class="main-area fix">
    <section class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="breadcrumb-content text-center">
                        <h2 class="title">Thank You</h2>
                        <nav aria-label="Breadcrumbs" class="breadcrumb-trail">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item trail-item trail-begin">
                                    <a href="{{ route('front.home') }}"><span>Home</span></a>
                                </li>
                                <li class="breadcrumb-item trail-item trail-end"><span>Thank You</span></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="thank-you__area section-py-130">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h3>Thank you for your order!</h3>
                    <p>Your order has been placed successfully. We will process it soon.</p>
                    <a href="{{ route('front.home') }}" class="btn btn-sm">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
