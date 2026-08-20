@extends('admin.layout.main')
@section('content')
    <div class="pagetitle">
        <h1>Company Gallery</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">{{ isset($e_companyGallery) ? 'Edit' : 'Add' }} Company Gallery</li>
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
                            action="{{ isset($e_companyGallery) ? route('company_gallery_update', $e_companyGallery->id) : route('company_gallery_store') }}"
                            class="row g-3" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($e_companyGallery))
                                @method('PUT')
                            @endif

                            <!-- Image -->
                            <div class="col-md-8">
                                <label class="form-label">Image</label>
                                <div class="d-flex">
                                    @if (isset($e_companyGallery) && $e_companyGallery->image)
                                        <img class="rounded me-2" src="{{ asset('storage/' . $e_companyGallery->image) }}"
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
                                        {{ isset($e_companyGallery) && $e_companyGallery->status == 1 ? 'selected' : '' }}>
                                        Active
                                    </option>
                                    <option value="0"
                                        {{ isset($e_companyGallery) && $e_companyGallery->status == 0 ? 'selected' : '' }}>
                                        Inactive</option>
                                </select>
                                @error('status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea name="description" rows="3" class="form-control">{{ old('description', $e_companyGallery->description ?? '') }}</textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Submit -->
                            <div class="col-12 text-center">
                                <button type="submit"
                                    class="btn rounded-pill px-3 {{ isset($e_companyGallery) ? 'btn-success' : 'btn-primary' }}">
                                    @if (isset($e_companyGallery))
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
