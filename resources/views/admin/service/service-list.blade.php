@extends('admin.layout.main')
@section('content')
    <div class="pagetitle">
        <h1>Service</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Service List</li>
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
                            <a href="{{ route('service_add') }}" role="button" class="btn btn-primary btn-sm">
                                <i class="bi bi-bookmark-star me-2"></i> ADD SERVICE</a>
                        </div>
                        <hr>
                        <table class="table datatable table-sm" id="serviceList">
                            <thead>
                                <tr>
                                    <th scope="col">SL.</th>
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
            getFeature();
        });

        function getFeature() {
            if ($.fn.DataTable.isDataTable('#serviceList')) {
                $('#serviceList').DataTable().destroy();
            }
            $('#serviceList').DataTable({
                "ajax": {
                    "url": "{{ route('service_all') }}",
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
                            let editUrl = `/service-edit/${data}/edit`;
                            let buttons = `<a role="button" href="${editUrl}" class="btn btn-link text-primary text-decoration-none btn-sm">
                                <i class="bi bi-pencil-square"></i></a>`;
                            buttons += `<button type="button" class="btn btn-link text-danger text-decoration-none btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" 
                            data-id="${data}" data-url="service-delete"><i class="bi bi-trash"></i></button>`;
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
