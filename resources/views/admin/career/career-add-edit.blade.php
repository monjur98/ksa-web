@extends('admin.layout.main')
@section('content')
    <div class="pagetitle">
        <h1>Career</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">{{ isset($e_career) ? 'Edit' : 'Add' }} Career</li>
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
                            action="{{ isset($e_career) ? route('career_update', $e_career->id) : route('career_store') }}"
                            class="row g-3" method="POST">
                            @csrf
                            @if (isset($e_career))
                                @method('PUT')
                            @endif

                            <!-- Job Title -->
                            <div class="col-md-4">
                                <label class="form-label">Job Title</label>
                                <input type="text" name="title" value="{{ old('title', $e_career->title ?? '') }}"
                                    class="form-control">
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Job Type -->
                            <div class="col-md-4">
                                <label class="form-label">Job Type</label>
                                <input type="text" name="type" value="{{ old('type', $e_career->type ?? '') }}"
                                    class="form-control">
                                @error('type')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Vacancies -->
                            <div class="col-md-4">
                                <label class="form-label">Vacancies</label>
                                <input type="number" name="vacancies"
                                    value="{{ old('vacancies', $e_career->vacancies ?? '') }}" class="form-control">
                                @error('vacancies')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Experience -->
                            <div class="col-md-4">
                                <label class="form-label">Experience</label>
                                <input type="text" name="experience"
                                    value="{{ old('experience', $e_career->experience ?? '') }}" class="form-control">
                                @error('experience')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Location -->
                            <div class="col-md-4">
                                <label class="form-label">Location</label>
                                <input type="text" name="location"
                                    value="{{ old('location', $e_career->location ?? '') }}" class="form-control">
                                @error('location')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="col-md-4">
                                <label class="form-label">Status:</label>
                                <select name="status" class="form-select">
                                    <option value="">Choose Status</option>
                                    <option value="1"
                                        {{ isset($e_career) && $e_career->status == 1 ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="0"
                                        {{ isset($e_career) && $e_career->status == 0 ? 'selected' : '' }}>
                                        Inactive</option>
                                </select>
                                @error('status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="editor form-control">{{ old('title', $e_career->description ?? '') }}</textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Submit -->
                            <div class="col-12 text-center">
                                <button type="submit"
                                    class="btn rounded-pill px-3 {{ isset($e_career) ? 'btn-success' : 'btn-primary' }}">
                                    @if (isset($e_career))
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
