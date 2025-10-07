@extends('admin.layout.main')
@section('content')
    <div class="pagetitle">
        <h1>Contact</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Contact List</li>
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
                            <a href="{{ route('contact_edit', $contact->id) }}" role="button"
                                class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil-square me-2"></i> EDIT CONTACT</a>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Email Address:</h5>
                                        {{ $contact->email ?? '' }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Phone Number:</h5>
                                        {{ $contact->phone ?? '' }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Address:</h5>
                                        {{ $contact->address ?? '' }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        Google Map
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                {{ $contact->map ?? '' }}
                                            </div>
                                            <div class="col-md-6">
                                                @if ($contact)
                                                    <iframe src="{{ $contact->map ?? '' }}" width="100%" height="250px"
                                                        style="border:0; border-radius: 5px;" allowfullscreen=""
                                                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                                @endif
                                            </div>
                                        </div>
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
