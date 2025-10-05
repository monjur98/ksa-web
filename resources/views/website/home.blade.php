@extends('website.layout.main')
@section('content')
    <!-- ***** Main Banner Area Start ***** -->
    @if (isset($banner))
        <div class="swiper-container" id="top">
            <div class="swiper-wrapper">
                @foreach ($banner as $item)
                    <div class="swiper-slide">
                        <div class="slide-inner" style="background-image:url(/storage/{{ $item->image }})">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="header-text">
                                            <h2>{{ $item->title }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
        </div>
    @endif

    <!-- ***** Main Banner Area End ***** -->

    <section class="services">
        <div class="container">
            @if (isset($feature))
                <div class="row">
                    @foreach ($feature as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="service-item">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="{{ $item->icon }} me-2"></i>
                                    <h4>{{ $item->title }}</h4>
                                </div>
                                <p>{{ $item->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <section class="simple-cta">
        <div class="container">
            @if (isset($feature))
                <div class="row">
                    <div class="col-12">
                        <h4>Core Value</h4>
                    </div>
                    @foreach ($coreValue as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="core-value-item">
                                <i class="fa-solid fa-fire"></i>
                                <h3>Quality Assurance</h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <section class="about-us" id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h6>Our Services</h6>
                        <h4>What We Serve</h4>
                    </div>
                </div>
                @if (isset($service))
                    <div class="col-lg-12">
                        <div class="naccs">
                            <div class="tabs">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="menu">
                                            @foreach ($service as $item)
                                                <div
                                                    class="{{ $loop->first ? 'active gradient-border' : 'gradient-border' }}">
                                                    <span>{{ $item->title }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <ul class="nacc">
                                            <!-- Joist & Deck Estimation -->
                                            @foreach ($service as $item)
                                                <li class="{{ $loop->first ? 'active' : '' }} nacc-li">
                                                    <div class="right-content right-content-list">
                                                        {!! $item->description !!}
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class="calculator" id="quote">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-block text-center">
                        <img src="assets/images/quote.png" class="img-fluid" alt="Quote">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="section-heading">
                        <h6>Your Freedom</h6>
                        <h4>Get a Quote</h4>
                    </div>
                    <form id="calculate" action="" method="get">
                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="name">Your Name</label>
                                    <input type="name" name="name" id="name" placeholder="" autocomplete="on"
                                        required>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="email">Your Phone</label>
                                    <input type="tel" name="phone" id="phone" pattern="[0-9]{10}" placeholder=""
                                        required="">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="email">Your Email</label>
                                    <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                        placeholder="" required="">
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <label for="subject">Subject</label>
                                    <input type="subject" name="subject" id="subject" placeholder="" autocomplete="on">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="chooseOption" class="form-label">Your Reason</label>
                                    <select name="Category" class="form-select" aria-label="Default select example"
                                        id="chooseOption" onchange="this.form.click()">
                                        <option selected>Choose an Option</option>
                                        <option value="Steel Joist & Girder detailing">Steel Joist & Girder detailing
                                        </option>
                                        <option value="Steel Deck detailing">Steel Deck detailing</option>
                                        <option value="Shear Stud Layout">Shear Stud Layout</option>
                                        <option value="Joist & Deck Estimation">Joist & Deck Estimation</option>
                                        <option value="Wood nailer joist project">Wood nailer joist project</option>
                                        <option value="Joist Design">Joist Design</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="orange-button">Submit Now</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection
