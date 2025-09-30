@extends('admin.layout.main')
@section('content')
    <div class="pagetitle">
        <h1>About</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">{{ isset($e_about) ? 'Edit' : 'Add' }} About</li>
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
                        <form action="{{ isset($e_about) ? route('about_update', $e_about->id) : route('about_store') }}"
                            class="row g-3" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($e_about))
                                @method('PUT')
                            @endif
                            <div class="col-12">
                                <h5 class="card-title border-bottom">About Us</h5>
                            </div>
                            <!-- About -->
                            <div class="col-12">
                                <label class="form-label">About Us</label>
                                <textarea name="about" class="editor form-control">{{ old('title', $e_about->about ?? '') }}</textarea>
                                @error('about')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12">
                                <h5 class="card-title border-bottom">Mission</h5>
                            </div>
                            <!-- Mission Image -->
                            <div class="col-md-8">
                                <label class="form-label">Image</label>
                                <div class="d-flex">
                                    @if (isset($e_about) && $e_about->mission_image)
                                        <img class="rounded me-2" src="{{ asset('storage/' . $e_about->mission_image) }}"
                                            alt="" width="50" height="37">
                                    @endif
                                    <input type="file" name="mission_image" class="form-control">
                                </div>
                                @error('mission_image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Mission Text -->
                            <div class="col-12">
                                <label class="form-label">Mission</label>
                                <textarea name="mission" rows="3" class="form-control">{{ old('mission', $e_about->mission ?? '') }}</textarea>
                                @error('mission')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-12">
                                <h5 class="card-title border-bottom">Vision</h5>
                            </div>
                            <!-- Vision Image -->
                            <div class="col-md-8">
                                <label class="form-label">Image</label>
                                <div class="d-flex">
                                    @if (isset($e_about) && $e_about->vision_image)
                                        <img class="rounded me-2" src="{{ asset('storage/' . $e_about->vision_image) }}"
                                            alt="" width="50" height="37">
                                    @endif
                                    <input type="file" name="vision_image" class="form-control">
                                </div>
                                @error('vision_image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Vision Text -->
                            <div class="col-12">
                                <label class="form-label">Vision</label>
                                <textarea name="vision" rows="3" class="form-control">{{ old('vision', $e_about->vision ?? '') }}</textarea>
                                @error('vision')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Submit -->
                            <div class="col-12 text-center">
                                <button type="submit"
                                    class="btn rounded-pill px-3 {{ isset($e_about) ? 'btn-success' : 'btn-primary' }}">
                                    @if (isset($e_about))
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
