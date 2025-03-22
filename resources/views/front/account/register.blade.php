@extends('front.layouts.app')

@section('content')
<main class="main-area fix">

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="breadcrumb-content text-center">
                        <h2 class="title">Register Page</h2>
                        <nav aria-label="Breadcrumbs" class="breadcrumb-trail">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item trail-item trail-begin">
                                    <a href="index.html"><span>Home</span></a>
                                </li>
                                <li class="breadcrumb-item trail-item trail-end"><span>Create Account</span></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="video-shape one"><img src="{{asset('front-assests/img/others/video_shape01.png')}}" alt="shape"></div>-->
        <!--<div class="video-shape two"><img src="{{asset('front-assests/img/others/video_shape02.png')}}" alt="shape"></div>-->
    </section>
    <!-- breadcrumb-area-end -->

    <!-- singUp-area -->
    <section class="singUp-area section-py-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="singUp-wrap">
                        <h2 class="title" style="text-align: center">Create Your Account</h2>
                        <p>Hey there! Ready to join the party? We just need a few details from you to get started. Let's do this!</p>
                        {{-- <div class="account__social">
                            <a href="#" class="account__social-btn">
                                <img src="assets/img/icons/google.svg" alt="img">
                                Continue with google
                            </a>
                        </div> --}}
                        {{-- <div class="account__divider">
                            <span>or</span>
                        </div> --}}
                        <form action="{{ route('account.processregister') }}" method="post" name="registrationform" id="registrationform" class="account__form">
                            @csrf
                            <div class="row gutter-20">
                                    <div class="form-grp">
                                        <label for="name"> Name</label>
                                        <input type="text" id="name" placeholder="Enter Name" name="name">
                                    </div>
                                    <span class="text-danger">
                                        @error('name')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                </div>
                               
                            <div class="form-grp">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="email">
                            </div>
                            <div class="form-grp">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" placeholder="password">
                            </div>
                            <div class="form-grp">
                                <label for="confirm-password">Confirm Password</label>
                                <input type="password" id="confirm-password" placeholder="Confirm Password" name="password_confirmation">
                            </div>
                            <button type="submit" class="btn btn-two btn-sm" style="border-radius: 5px;">Sign Up</button>
                        </form>
                        <div class="account__switch">
                            <p>Already have an account?<a href="{{route('account.login')}}">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- singUp-area-end -->

</main>
@endsection

@section('js')
    {{-- <script>
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
            // console.log(brands.toString());

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
    </script> --}}
@endsection
