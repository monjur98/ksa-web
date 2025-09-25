@extends('admin.layout.main')
@section('content')
    <div class="pagetitle">
        <h1>Home Banner</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Home Banner List</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <!-- Card -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('home_banner_add') }}" role="button" class="btn btn-primary btn-sm">
                                <i class="bi bi-image me-2"></i> ADD HOME BANNER</a>
                        </div>
                        <hr>
                        <table class="table datatable table-sm" id="homeBannerList">
                            <thead>
                                <tr>
                                    <th scope="col">SL.</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            getHomeBanner();
        });

        function getHomeBanner() {
            if ($.fn.DataTable.isDataTable('#homeBannerList')) {
                $('#homeBannerList').DataTable().destroy();
            }
            $('#homeBannerList').DataTable({
                "ajax": {
                    "url": "{{ route('home_banner_all') }}",
                    "type": "GET",
                    "dataType": "json",
                },
                "columns": [{
                        "data": null,
                        "name": "serial_number",
                        "render": function(data, type, row, meta) {
                            return meta.row + 1;
                        },
                        "autoWidth": true
                    },
                    {
                        "data": "image",
                        "name": "image",
                        "autoWidth": true,
                        render: function(data, type, row) {
                            return `<div class="d-flex align-items-center">
                                        <img class="t-thumb" src="/storage/${row.image}" alt="${data}">
                                    </div>`;
                        }
                    },
                    {
                        "data": "title",
                        "name": "title",
                        "autoWidth": true,
                    },
                    {
                        "data": "status",
                        "name": "status",
                        "autoWidth": true,
                        "render": function(data) {
                            switch (data) {
                                case 1:
                                    return `<span class="badge rounded-0 bg-success-subtle text-success-emphasis">
                                                <i class="bi bi-check-circle"></i> Active
                                            </span>`;
                                case 0:
                                    return `<span class="badge rounded-0 bg-danger-subtle text-danger-emphasis">
                                                <i class="bi bi-ban"></i> Inactive
                                            </span>`;
                                default:
                                    return '';
                            }
                        }
                    },
                    {
                        "data": "id",
                        "name": "actions",
                        "render": function(data, type, row) {
                            let editUrl = `/home-banner-edit/${data}/edit`;
                            let buttons = `<a role="button" href="${editUrl}" class="btn btn-link text-primary text-decoration-none btn-sm">
                                <i class="bi bi-pencil-square"></i></a>`;
                            buttons += `<button type="button" class="btn btn-link text-danger text-decoration-none btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" 
                            data-id="${data}" data-url="home-banner-delete"><i class="bi bi-trash"></i></button>`;
                            return buttons;
                        }
                    }
                ],
                "columnDefs": [{
                    "targets": -1,
                    "orderable": false,
                    "searchable": false,
                }]
            });
        }
    </script>
@endsection
