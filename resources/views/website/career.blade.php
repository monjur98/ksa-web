@extends('website.layout.main')
@section('content')
    <div class="page-title pt-5">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1 class="heading-title">Career</h1>
                        <p class="mb-0">
                            Your Next Career Move Starts With Us
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('home_page') }}">Home</a></li>
                    <li class="current">Career</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <section class="schedule section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="schedule-content">
                <div class="session-timeline">
                    @forelse ($careers as $item)
                        <div class="session-block">
                            <div class="session-card">
                                <div class="session-info">
                                    <div class="session-meta">
                                        <span class="track keynote">{{ $item->type }}</span>
                                        <span class="room">Vacancies: {{ $item->vacancies }}</span>
                                    </div>
                                    <h3 class="session-title">{{ $item->title }}</h3>
                                    {!! $item->description !!}
                                    <div class="speaker-info">
                                        <div class="speaker-details">
                                            <h4 class="speaker-name">Experience: {{ $item->experience }}</h4>
                                            <span class="speaker-role">Location: {{ $item->location }}</span>
                                        </div>
                                    </div>
                                </div>
                                <a role="button"
                                    href="mailto:info@kolkatasteelassociates.com?subject=Job%20Application&body=Dear%20HR,%20I%20am%20interested%20in%20the%20position.%20Please%20find%20my%20CV%20attached."
                                    class="add-to-schedule">
                                    <i class="bi bi-envelope-paper"></i> Upload CV
                                </a>

                            </div>
                        </div><!-- End Session Block -->
                    @empty
                        <div class="col-12 text-center">
                            <p>No data found!</p>
                        </div>
                    @endforelse
                </div><!-- End Session Timeline -->
            </div><!-- End Schedule Content -->
        </div>
    </section><!-- /Schedule Section -->
    <img src="{{ asset('assets/img/career.png') }}" style="margin-top: -5%;" class="img-fluid" alt="Career">
@endsection
@section('script')
@endsection
