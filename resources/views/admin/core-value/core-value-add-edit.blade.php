@extends('admin.layout.main')
@section('content')
    <div class="pagetitle">
        <h1>Core Value</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">{{ isset($e_coreValue) ? 'Edit' : 'Add' }} Core Value</li>
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
                            action="{{ isset($e_coreValue) ? route('core_value_update', $e_coreValue->id) : route('core_value_store') }}"
                            class="row g-3" method="POST">
                            @csrf
                            @if (isset($e_coreValue))
                                @method('PUT')
                            @endif

                            <!-- Icon -->
                            <div class="col-md-4">
                                <label class="form-label">Icon</label>
                                <input type="text" name="icon" value="{{ old('icon', $e_coreValue->icon ?? '') }}"
                                    class="form-control">
                                @error('icon')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Name -->
                            <div class="col-md-4">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" value="{{ old('name', $e_coreValue->name ?? '') }}"
                                    class="form-control">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="col-md-4">
                                <label class="form-label">Status:</label>
                                <select name="status" class="form-select">
                                    <option value="">Choose Status</option>
                                    <option value="1"
                                        {{ isset($e_coreValue) && $e_coreValue->status == 1 ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="0"
                                        {{ isset($e_coreValue) && $e_coreValue->status == 0 ? 'selected' : '' }}>
                                        Inactive</option>
                                </select>
                            </div>

                            <!-- Submit -->
                            <div class="col-12 text-center">
                                <button type="submit"
                                    class="btn rounded-pill px-3 {{ isset($e_coreValue) ? 'btn-success' : 'btn-primary' }}">
                                    @if (isset($e_coreValue))
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
