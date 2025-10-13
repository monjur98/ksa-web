@extends('website.layout.main')
@section('content')
    <div class="page-title pt-5">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1 class="heading-title">About Us</h1>
                        <p class="mb-0">
                            Delivering Precision, Quality, and Cost-Effective Steel Joist & Deck Detailing, Drafting, and
                            Design Solutions for Global Structural Success.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('home_page') }}">Home</a></li>
                    <li class="current">About KSA</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <!-- ***** Main Banner Area End ***** -->
    <section class="what-we-do">
        <div class="container">
            @if (isset($about))
                <div class="row">
                    <div class="col-12">
                        <div class="left-content">
                            <h4>About Us</h4>
                            {!! $about->about !!}
                        </div>
                    </div>
                </div>
                <div class="row g-0 mt-4 align-items-center">
                    <div class="col-lg-6">
                        <div class="mission-img">
                            <img src="/storage/{{ $about->mission_image ?? '' }}" class="img-fluid rounded-3"
                                alt="Mission">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="middle-prnt">
                            <div class="middle">
                                <div class="mission-text ms-lg-4 my-5">
                                    <h4 class="mb-4">Mission:</h4>
                                    <p>{{ $about->mission }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 order-lg-last">
                        <div class="vision-img">
                            <img src="/storage/{{ $about->vision_image ?? '' }}" class="img-fluid rounded-3" alt="Vision">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="middle-prnt">
                            <div class="middle">
                                <div class="vision-text me-lg-4 my-5">
                                    <h4 class="mb-4">Vision:</h4>
                                    <p>{{ $about->vision }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
@section('script')
@endsection
