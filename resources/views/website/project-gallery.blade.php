@extends('website.layout.main')
@section('content')
    <div class="page-title pt-5">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1 class="heading-title">Project Gallery</h1>
                        <p class="mb-0">
                            Showcasing Our Precision, Quality, and Innovation in Steel Joist & Deck Detailing Projects.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <nav class="breadcrumbs">
            <div class="container">
                <ol>
                    <li><a href="{{ route('home_page') }}">Home</a></li>
                    <li class="current">Project Gallery</li>
                </ol>
            </div>
        </nav>
    </div><!-- End Page Title -->

    <!-- ***** Main Banner Area End ***** -->
    <section class="schedule section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @php
                        $types = projectTypes();
                    @endphp
                    <div class="container" data-aos="fade-up" data-aos-delay="100">
                        <div class="schedule-header">
                            <ul class="nav nav-tabs" id="schedule-tabs" role="tablist">
                                @foreach ($types as $index => $item)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link {{ $loop->first ? 'active' : '' }}"
                                            id="schedule-tab-{{ $index }}" data-bs-toggle="tab"
                                            data-bs-target="#schedule-tab-pane-{{ $index }}" type="button"
                                            role="tab" aria-controls="schedule-tab-pane-{{ $index }}"
                                            aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                            {{ $item->type }}
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-content" id="schedule-tabContent">
                            @foreach ($types as $index => $item)
                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                    id="schedule-tab-pane-{{ $index }}" role="tabpanel"
                                    aria-labelledby="schedule-tab-{{ $index }}" tabindex="0">
                                    @php
                                        $filterProject = $projects->where('type_id', $item->id);
                                    @endphp
                                    <div class="row">
                                        @forelse ($filterProject as $project)
                                            <div class="col-md-4 mb-4">
                                                <div class="pg-card">
                                                    <div class="card-inner">
                                                        <div class="box">
                                                            <div class="imgBox">
                                                                <img src="/storage/{{ $project->thumbnail }}"
                                                                    alt="Image">
                                                            </div>
                                                            <div class="icon">
                                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                    data-bs-target="#estimationModal-{{ $project->id }}"
                                                                    class="iconBox">
                                                                    <i class="bi bi-arrows-angle-expand"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal for each project -->
                                            <div class="modal fade" id="estimationModal-{{ $project->id }}" tabindex="-1"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content border-0 rounded-0">
                                                        <div class="modal-header py-2">
                                                            <h5 class="modal-title">PDF</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <iframe src="/storage/{{ $project->project_pdf }}#toolbar=0"
                                                                width="100%" height="450" style="border:none"></iframe>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <p class="text-center">No data found!</p>
                                        @endforelse
                                    </div>
                                </div>
                            @endforeach
                        </div><!-- End Tab Content -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection
