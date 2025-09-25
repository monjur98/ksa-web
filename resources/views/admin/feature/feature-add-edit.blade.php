@extends('admin.layout.main')
@section('content')
    <div class="pagetitle">
        <h1>Feature</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">{{ isset($e_feature) ? 'Edit' : 'Add' }} Feature</li>
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
                            action="{{ isset($e_feature) ? route('feature_update', $e_feature->id) : route('feature_store') }}"
                            class="row g-3" method="POST">
                            @csrf
                            @if (isset($e_feature))
                                @method('PUT')
                            @endif

                            <!-- Title -->
                            <div class="col-md-8">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" value="{{ old('title', $e_feature->title ?? '') }}"
                                    class="form-control">
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Icon -->
                            <div class="col-md-4">
                                <label class="form-label">Icon</label>
                                <input type="text" name="icon" value="{{ old('icon', $e_feature->icon ?? '') }}"
                                    class="form-control">
                                @error('icon')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea name="description" rows="3" class="form-control">{{ old('title', $e_feature->title ?? '') }}</textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="col-md-4">
                                <label class="form-label">Status:</label>
                                <select name="status" class="form-select">
                                    <option value="">Choose Status</option>
                                    <option value="1"
                                        {{ isset($e_feature) && $e_feature->status == 1 ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="0"
                                        {{ isset($e_feature) && $e_feature->status == 0 ? 'selected' : '' }}>
                                        Inactive</option>
                                </select>
                            </div>

                            <!-- Submit -->
                            <div class="col-md-4">
                                <div class="no-label"></div>
                                <button type="submit"
                                    class="btn rounded-pill px-3 {{ isset($e_feature) ? 'btn-success' : 'btn-primary' }}">
                                    @if (isset($e_feature))
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
