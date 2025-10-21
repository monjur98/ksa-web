@extends('website.layout.main')
@section('content')
    <div class="page-title pt-5">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1 class="heading-title">Company’s Gallery</h1>
                        <p class="mb-0">
                            Highlights from Our Company’s Story
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('home_page') }}">Home</a></li>
                    <li class="current">Company’s Gallery</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <!-- ***** Main Banner Area End ***** -->
    <section id="gallery" class="gallery section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                <div class="row gallery-grid isotope-container" data-aos="fade-up" data-aos-delay="300">
                    @forelse ($companyGallery as $item)
                        <div class="col-xl-3 col-md-4 col-sm-6 gallery-item isotope-item">
                            <div class="gallery-card">
                                <div class="gallery-image">
                                    <img src="/storage/{{ $item->image ?? '' }}" class="img-fluid"
                                        alt="{{ $item->description }}">
                                </div>
                                <div class="gallery-overlay">
                                    <div class="gallery-actions">
                                        <a href="/storage/{{ $item->image ?? '' }}" title="{{ $item->description }}"
                                            class="glightbox"><i class="bi bi-zoom-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Gallery Item -->
                    @empty
                        <div class="col-12 text-center">
                            <p>No data found!</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section><!-- /Gallery Section -->
@endsection
@section('script')
@endsection
