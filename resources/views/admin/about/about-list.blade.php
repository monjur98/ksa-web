@extends('admin.layout.main')
@section('content')
    <div class="pagetitle">
        <h1>About</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">About List</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <!-- Card -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('about_edit', $about->id) }}" role="button" class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil-square me-2"></i> EDIT ABOUT</a>
                        </div>
                        <hr>
                        <div class="card">
                            <div class="card-header">
                                About Us
                            </div>
                            <div class="card-body">
                                @if (isset($about))
                                    {!! $about->about !!}
                                @endif
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                Mission
                            </div>
                            <div class="card-body">
                                @if (isset($about))
                                    <div class="row align-items-center">
                                        <div class="col-sm-5">
                                            @if (isset($about) && $about->mission_image)
                                                <img src="{{ asset('storage/' . $about->mission_image) }}"
                                                    class="img-fluid rounded" alt="img">
                                            @endif
                                        </div>
                                        <div class="col-sm-7">
                                            <p class="card-text">
                                                @if (isset($about))
                                                    {{ $about->mission }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                Vision
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-sm-7">
                                        <p class="card-text">
                                            @if (isset($about))
                                                {{ $about->vision }}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-sm-5">
                                        @if (isset($about) && $about->vision_image)
                                            <img src="{{ asset('storage/' . $about->vision_image) }}"
                                                class="img-fluid rounded" alt="img">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection
