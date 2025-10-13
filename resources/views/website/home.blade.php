@extends('website.layout.main')
@section('content')
    <!-- Main Banner Area Start -->
    @if (isset($banner))
        <div class="owl-carousel owl-theme home-banner" id="homeBanner">
            @foreach ($banner as $item)
                <div class="item">
                    <div class="banner-item">
                        <img src="/storage/{{ $item->image }}" alt="Banner Image">
                        <div class="banner-item-overlay text-center">
                            <div class="row justify-content-center">
                                <div class="col-sm-6">
                                    <h2>
                                        {{ $item->title }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Main Banner Area End -->

    <section id="about" class="about section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="features-grid">
                <div class="row g-4">
                    @forelse ($feature as $item)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="feature-card">
                                <div class="feature-icon">
                                    <i class="bi {{ $item->icon }}"></i>
                                </div>
                                <h4>{{ $item->title }}</h4>
                                <p>{{ $item->description }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p>No data found!</p>
                        </div>
                    @endforelse
                </div>
            </div>
    </section>

    <section class="cta-section section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Core Value</h2>
        </div><!-- End Section Title -->
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-4">
                @forelse ($coreValue as $item)
                    <div class="col-lg-4 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
                        <h2><i class="bi {{ $item->icon }} text-danger"></i></h2>
                        <h5>{{ $item->name }}</h5>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>No data found!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="schedule section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>What We Serve</h2>
            <p>Our Services</p>
        </div><!-- End Section Title -->
        @if (isset($service))
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="schedule-header">
                    <ul class="nav nav-tabs" id="schedule-tabs" role="tablist">
                        @foreach ($service as $index => $item)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{ $loop->first ? 'active' : '' }}"
                                    id="schedule-tab-{{ $index }}" data-bs-toggle="tab"
                                    data-bs-target="#schedule-tab-pane-{{ $index }}" type="button" role="tab"
                                    aria-controls="schedule-tab-pane-{{ $index }}"
                                    aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                    {{ $item->title }}
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="tab-content" id="schedule-tabContent">
                    @foreach ($service as $index => $item)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                            id="schedule-tab-pane-{{ $index }}" role="tabpanel"
                            aria-labelledby="schedule-tab-{{ $index }}" tabindex="0">
                            {!! $item->description !!}
                        </div>
                    @endforeach
                </div><!-- End Tab Content -->
            </div>
        @endif
    </section><!-- /Schedule Section -->

    <section class="quote contact section" id="quote">
        <div class="container section-title" data-aos="fade-up">
            <h2>Get a Quote</h2>
            <p>Your Freedom</p>
        </div><!-- End Section Title -->
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="contact-form-panel">
                        <div class="form-container">
                            <form action="{{ route('enquiry_quote') }}" method="POST" class="row">
                                @csrf
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="nameInput" name="name"
                                            placeholder="Full Name" required="">
                                        <label for="nameInput">Full Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="tel" class="form-control" id="phoneInput" name="phone"
                                            pattern="[0-9]{10}" placeholder="Phone Number" required="">
                                        <label for="phoneInput">Phone Number</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="emailInput" name="email"
                                            pattern="[^ @]*@[^ @]*" placeholder="Email Address" required="">
                                        <label for="emailInput">Email Address</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="subjectInput" name="subject"
                                            placeholder="Subject" required="">
                                        <label for="subjectInput">Subject</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="reasonSelect" name="reason"
                                            aria-label="Floating label select example">
                                            <option selected>Choose an Option</option>
                                            <option value="Steel Joist & Girder detailing">Steel Joist & Girder detailing
                                            </option>
                                            <option value="Steel Deck detailing">Steel Deck detailing</option>
                                            <option value="Shear Stud Layout">Shear Stud Layout</option>
                                            <option value="Joist & Deck Estimation">Joist & Deck Estimation</option>
                                            <option value="Wood nailer joist project">Wood nailer joist project</option>
                                            <option value="Joist Design">Joist Design</option>s
                                        </select>
                                        <label for="reasonSelect">Your Reason</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-grid">
                                        <button type="submit" class="btn-submit">Send Message <i
                                                class="bi bi-send-fill ms-2"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $('#homeBanner').owlCarousel({
            loop: true,
            nav: true,
            navText: ['<i class="bi bi-chevron-left"></i>', '<i class="bi bi-chevron-right"></i>'],
            dots: false,
            items: 1,
        })
    </script>
@endsection
