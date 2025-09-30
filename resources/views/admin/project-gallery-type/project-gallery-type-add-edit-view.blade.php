@extends('admin.layout.main')
@section('content')
    <div class="pagetitle">
        <h1>Project Gallery Type</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Project Gallery Type</li>
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
                            action="{{ isset($e_PGT) ? route('project_gallery_type_update', $e_PGT->id) : route('project_gallery_type_store') }}"
                            class="row g-3" method="POST">
                            @csrf
                            @if (isset($e_PGT))
                                @method('PUT')
                            @endif

                            <!-- Title -->
                            <div class="col-md-4">
                                <label class="form-label">Type</label>
                                <input type="text" name="type" value="{{ old('type', $e_PGT->type ?? '') }}"
                                    class="form-control">
                                @error('type')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="col-md-4">
                                <label class="form-label">Status:</label>
                                <select name="status" class="form-select">
                                    <option value="">Choose Status</option>
                                    <option value="1" {{ isset($e_PGT) && $e_PGT->status == 1 ? 'selected' : '' }}>
                                        Active
                                    </option>
                                    <option value="0" {{ isset($e_PGT) && $e_PGT->status == 0 ? 'selected' : '' }}>
                                        Inactive</option>
                                </select>
                            </div>

                            <!-- Submit -->
                            <div class="col-md-4">
                                <div class="no-label"></div>
                                <button type="submit"
                                    class="btn rounded-pill px-3 {{ isset($e_PGT) ? 'btn-success' : 'btn-primary' }}">
                                    @if (isset($e_PGT))
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
            <!-- Card -->
            @if (isset($projectGalleryType))
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-sm mb-0">
                                <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th style="width: 100px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($projectGalleryType as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->type }}</td>
                                            <td>
                                                @if ($item->status === 1)
                                                    <span class="badge rounded-0 bg-success-subtle text-success-emphasis">
                                                        <i class="bi bi-check-circle"></i> Active
                                                    </span>
                                                @else
                                                    <span class="badge rounded-0 bg-danger-subtle text-danger-emphasis">
                                                        <i class="bi bi-ban"></i> Inactive
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <a role="button" href="{{ route('project_gallery_type_edit', $item->id) }}"
                                                    class="btn btn-link text-primary text-decoration-none btn-sm">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="3">
                                                No data found
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
@section('script')
@endsection
