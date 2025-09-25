@extends('admin.layout.main')
@section('content')
    <div class="pagetitle">
        <h1>Home Banner</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">{{ isset($e_homeBanner) ? 'Edit' : 'Add' }} Home Banner</li>
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
                            action="{{ isset($e_homeBanner) ? route('home_banner_update', $e_homeBanner->id) : route('home_banner_store') }}"
                            class="row g-3" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($e_homeBanner))
                                @method('PUT')
                            @endif

                            <!-- Title -->
                            <div class="col-12">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" value="{{ old('title', $e_homeBanner->title ?? '') }}"
                                    class="form-control">
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Image -->
                            <div class="col-md-4">
                                <label class="form-label">Image</label>
                                <div class="d-flex">
                                    @if (isset($e_homeBanner) && $e_homeBanner->image)
                                        <img class="rounded me-2" src="{{ asset('storage/' . $e_homeBanner->image) }}"
                                            alt="Banner Image" width="50" height="37">
                                    @endif
                                    <input type="file" name="image" class="form-control">
                                </div>
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="col-md-4">
                                <label class="form-label">Status:</label>
                                <select name="status" class="form-select">
                                    <option value="">Choose Status</option>
                                    <option value="1"
                                        {{ isset($e_homeBanner) && $e_homeBanner->status == 1 ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="0"
                                        {{ isset($e_homeBanner) && $e_homeBanner->status == 0 ? 'selected' : '' }}>
                                        Inactive</option>
                                </select>
                            </div>

                            <!-- Submit -->
                            <div class="col-md-4">
                                <div class="no-label"></div>
                                <button type="submit"
                                    class="btn rounded-pill px-3 {{ isset($e_homeBanner) ? 'btn-success' : 'btn-primary' }}">
                                    @if (isset($e_homeBanner))
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
