@extends('website.layout.main')
@section('content')
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-text">
                        <h2>About Us</h2>
                        <div class="div-dec"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                <div class="row g-0 mt-4">
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
