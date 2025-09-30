@extends('admin.layout.main')
@section('content')
    <div class="pagetitle">
        <h1>About</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">{{ isset($e_contact) ? 'Edit' : 'Add' }} About</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <!-- Card -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Form -->
                        <form
                            action="{{ isset($e_contact) ? route('contact_update', $e_contact->id) : route('contact_store') }}"
                            class="row g-3" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($e_contact))
                                @method('PUT')
                            @endif
                            <div class="col-12">
                                <h5 class="card-title border-bottom">Contact</h5>
                            </div>

                            <!-- Email Address -->
                            <div class="col-sm-6">
                                <label class="form-label">Email Address</label>
                                <input name="email" class="form-control"
                                    value="{{ old('email', $e_contact->email ?? '') }}">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Phone Number -->
                            <div class="col-sm-6">
                                <label class="form-label">Phone Number</label>
                                <input name="phone" class="form-control"
                                    value="{{ old('phone', $e_contact->phone ?? '') }}">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Address -->
                            <div class="col-12">
                                <label class="form-label">Address</label>
                                <input name="address" class="form-control"
                                    value="{{ old('address', $e_contact->address ?? '') }}">
                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12">
                                <h5 class="card-title border-bottom">Google Map</h5>
                            </div>

                            <!-- Map -->
                            <div class="col-12">
                                <label class="form-label">Map</label>
                                <textarea name="map" rows="4" class="form-control">{{ old('map', $e_contact->map ?? '') }}</textarea>
                                @error('map')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Submit -->
                            <div class="col-12 text-center">
                                <button type="submit"
                                    class="btn rounded-pill px-3 {{ isset($e_contact) ? 'btn-success' : 'btn-primary' }}">
                                    @if (isset($e_contact))
                                        <i class="bi bi-file-arrow-up"></i> UPDATE
                                    @else
                                        <i class="bi bi-file-plus"></i> ADD
                                    @endif
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection
