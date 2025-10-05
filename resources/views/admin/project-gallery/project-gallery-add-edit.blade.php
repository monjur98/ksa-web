@extends('admin.layout.main')
@section('content')
    <div class="pagetitle">
        <h1>Project Gallery</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">{{ isset($e_project) ? 'Edit' : 'Add' }} Project</li>
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
                            action="{{ isset($e_project) ? route('project_gallery_update', $e_project->id) : route('project_gallery_store') }}"
                            class="row g-3" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($e_project))
                                @method('PUT')
                            @endif

                            <!-- Type -->
                            <div class="col-md-4">
                                <label class="form-label">Project Type:</label>
                                <select name="type_id" class="form-select">
                                    <option value="">Choose Type</option>
                                    @php
                                        $types = projectTypes();
                                    @endphp
                                    @forelse ($types as $item)
                                        <option value="{{ $item->id }}"
                                            {{ isset($e_project) && $e_project->type_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->type }}</option>
                                    @empty
                                        <option value="">No Project Type Found</option>
                                    @endforelse
                                </select>
                                @error('type_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Thumbnail -->
                            <div class="col-md-4">
                                <label class="form-label">Thumbnail</label>
                                <div class="d-flex">
                                    @if (isset($e_project) && $e_project->thumbnail)
                                        <img class="rounded me-2" src="{{ asset('storage/' . $e_project->thumbnail) }}"
                                            alt="Image" width="50" height="37">
                                    @endif
                                    <input type="file" name="thumbnail" class="form-control">
                                </div>
                                @error('thumbnail')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- PDF -->
                            <div class="col-md-4">
                                <label class="form-label">PDF</label>
                                <input type="file" name="project_pdf" class="form-control">
                                @error('project_pdf')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="col-md-4">
                                <label class="form-label">Status:</label>
                                <select name="status" class="form-select">
                                    <option value="">Choose Status</option>
                                    <option value="1"
                                        {{ isset($e_project) && $e_project->status == 1 ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="0"
                                        {{ isset($e_project) && $e_project->status == 0 ? 'selected' : '' }}>
                                        Inactive</option>
                                </select>
                            </div>

                            <!-- Submit -->
                            <div class="col-md-4">
                                <div class="no-label"></div>
                                <button type="submit"
                                    class="btn rounded-pill px-3 {{ isset($e_project) ? 'btn-success' : 'btn-primary' }}">
                                    @if (isset($e_project))
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
