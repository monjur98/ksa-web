@extends('admin.layout.main')
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="card">
                    <div class="card-body info-card">
                        <h5 class="card-title">Total Banners</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-images text-danger"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ isset($country_qty) ? $country_qty : '0' }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card">
                    <div class="card-body info-card">
                        <h5 class="card-title">Total Services</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-ui-checks text-danger"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ isset($city_qty) ? $city_qty : '0' }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card">
                    <div class="card-body info-card">
                        <h5 class="card-title">Pending Queries</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-chat-right-text text-danger"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ isset($pending_query_qty) ? $pending_query_qty : '0' }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
@endsection
