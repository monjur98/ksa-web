@extends('admin.layout.main')
@section('content')
    <div class="pagetitle">
        <h1>Enquiry</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Enquiry Details </li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <!-- Card -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Label</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Name :</td>
                                    <td>{{ $e_enquiry->name }}</td>
                                </tr>
                                <tr>
                                    <td>Phone :</td>
                                    <td>{{ $e_enquiry->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Email :</td>
                                    <td>{{ $e_enquiry->email }}</td>
                                </tr>
                                <tr>
                                    <td>Subject :</td>
                                    <td>{{ $e_enquiry->subject }}</td>
                                </tr>
                                @if ($e_enquiry->reason)
                                    <tr>
                                        <td>Reason :</td>
                                        <td>{{ $e_enquiry->reason }}</td>
                                    </tr>
                                @endif
                                @if ($e_enquiry->message)
                                    <tr>
                                        <td>Message :</td>
                                        <td>{{ $e_enquiry->message }}</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <!-- Form -->
                        <form action="{{ route('enquiry_update', $e_enquiry->id) }}" class="row g-3" method="PUT">
                            @csrf
                            @method('PUT')
                            <!-- Status -->
                            <div class="col-md-4">
                                <label class="form-label">Status:</label>
                                <select name="status" class="form-select">
                                    <option value="">Choose Status</option>
                                    <option value="0"
                                        {{ isset($e_enquiry) && $e_enquiry->status == 0 ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="1"
                                        {{ isset($e_enquiry) && $e_enquiry->status == 1 ? 'selected' : '' }}>Complete
                                    </option>
                                    <option value="2"
                                        {{ isset($e_enquiry) && $e_enquiry->status == 2 ? 'selected' : '' }}>
                                        Reject</option>
                                </select>
                            </div>
                            <!-- Submit -->
                            <div class="col-md-4">
                                <div class="no-label"></div>
                                <button type="submit" class="btn rounded-pill px-3 btn-success">
                                    <i class="bi bi-file-arrow-up"></i> UPDATE
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
