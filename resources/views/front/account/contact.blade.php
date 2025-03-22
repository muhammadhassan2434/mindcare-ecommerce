@extends('front.layouts.app')

@section('content')
<main class="main-area fix">

    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="breadcrumb-content text-center">
                        <h2 class="title">Contact Us</h2>
                        <nav aria-label="Breadcrumbs" class="breadcrumb-trail">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item trail-item trail-begin">
                                    <a href="index.html"><span>Home</span></a>
                                </li>
                                <li class="breadcrumb-item trail-item trail-end"><span>Contact Us</span></li>
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

    <!-- contact-area -->
    <section class="contact-area">
        <div class="container">
            <div class="contact-box-wrapper">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 col-sm-9">
                        <div class="contact-box">
                            <div class="contact-icon">
                                <span class="overlay-icon"><i class="fas fa-check"></i></span>
                                <i class="far fa-map"></i>
                            </div>
                            <div class="contact-content">
                                <h5 class="title">Office Address</h5>
                                <p class="contact-desc">P181 Valencia Garden Samundri Road,<br>Faisalabad, Pakisatan</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-9">
                        <div class="contact-box">
                            <div class="contact-icon">
                                <span class="overlay-icon"><i class="fas fa-check"></i></span>
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-content">
                                <h5 class="title">Phone Number</h5>
                                <p class="contact-desc">+92 3006624307</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-9">
                        <div class="contact-box">
                            <div class="contact-icon">
                                <span class="overlay-icon"><i class="fas fa-check"></i></span>
                                <i class="fas fa-globe"></i>
                            </div>
                            <div class="contact-content">
                                <h5 class="title">Web Connect</h5>
                                <p class="contact-desc">mindcarepharmaceuticals.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-area-end -->

    <!-- contact-form-end -->
    <section class="contact-form-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div id="contact-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96811.54759587669!2d-74.01263924803828!3d40.6880494567041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25bae694479a3%3A0xb9949385da52e69e!2sBarclays%20Center!5e0!3m2!1sen!2sbd!4v1636195194646!5m2!1sen!2sbd" allowfullscreen loading="lazy"></iframe>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="contact-form-wrap">
                        <div class="section-title mb-50">
                            <p class="sub-title">.. request make ..</p>
                            <h2 class="title">Asked Anything You <br> Want To Know</h2>
                        </div>
                        <form action="{{route('front.contact.store')}}" class="contact-form" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <label for="full-name">Full Name</label>
                                        <input type="text" id="full-name" name="name" placeholder="Enter here" required="required" data-error="Name is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <label for="email">Email Address</label>
                                        <input type="email" id="email" name="email"  placeholder="Enter here" required="required" data-error="Email is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <select class="form-select"  name="subject" aria-label="Default select example">
                                <option selected disabled>Select Subject **</option>
                                <option value="Delivery & Orders">Delivery & Orders</option>
                                {{-- <option value="2">Diet & Exercise</option> --}}
                                {{-- <option value="3">Marketing & Press</option> --}}
                                <option value="Share Your Success">Share Your Success</option>
                                <option value="Wholesale And Returns">Wholesale And Returns</option>
                            </select>
                            <div class="form-grp">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" name="message" placeholder="Enter here" required="required" data-error="Message is required."></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-btn">
                                <button type="submit" class="btn">make request</button>
                            </div>
                            <div class="messages"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-form-area-end -->

</main>
@endsection

@section('js')
   
@endsection
