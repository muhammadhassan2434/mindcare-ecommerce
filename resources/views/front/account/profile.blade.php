@extends('front.layouts.app')

@section('content')
<main class="main-area fix">
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="breadcrumb-content text-center">
                        <h2 class="title">Profile</h2>
                        <nav aria-label="Breadcrumbs" class="breadcrumb-trail">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item trail-item trail-begin">
                                    <a href="{{ route('front.home') }}"><span>Profile</span></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="video-shape one">-->
        <!--    <img src="{{ asset('front-assests/img/others/video_shape01.png') }}" alt="shape">-->
        <!--</div>-->
        <!--<div class="video-shape two">-->
        <!--    <img src="{{ asset('front-assests/img/others/video_shape02.png') }}" alt="shape">-->
        <!--</div>-->
    </section>
    <!-- breadcrumb-area-end -->

    <section class="section-11">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-3">
                    @include('front.account.commom.sidebar')
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="h5 mb-0 pt-2 pb-2">Personal Information</h2>
                        </div>
                        <div class="card-body p-4">
                            <form action="{{ route('front.account.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT') <!-- Add this to specify that the form uses the PUT method -->
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" readonly name="name" id="name" placeholder="Enter Your Name" class="form-control" value="{{ $user->name ?? '' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Email</label>
                                        <input type="text" readonly name="email" id="email" placeholder="Enter Your Email" class="form-control" value="{{ $user->email ?? '' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone">Phone</label>
                                        <input type="text" readonly name="phone" id="phone" placeholder="Enter Your Phone" class="form-control" value="{{ $address->mobile ?? '' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="address">Address</label>
                                        <textarea name="address" readonly id="address" class="form-control" cols="30" rows="5" placeholder="Enter Your Address">{{ $address->address ?? '' }}</textarea>
                                    </div>
                                    {{-- <div class="d-flex">
                                        <button type="submit" class="btn btn-dark">Update</button>
                                    </div> --}}
                                </div>
                            </form>
                            {{-- @if (isset($address))
                                <p>Last updated on: {{ $address->updated_at->format('d-m-Y') }}</p>
                            @endif --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- singUp-area-end -->
</main>
@endsection
