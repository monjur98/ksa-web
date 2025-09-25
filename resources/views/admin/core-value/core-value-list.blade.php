@extends('admin.layout.main')
@section('content')
    <div class="pagetitle">
        <h1>Core Value</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Core Value List</li>
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
                            <a href="{{ route('core_value_add') }}" role="button" class="btn btn-primary btn-sm">
                                <i class="bi bi-bookmark-star me-2"></i> ADD CORE VALUE</a>
                        </div>
                        <hr>
                        <table class="table datatable table-sm" id="coreValueList">
                            <thead>
                                <tr>
                                    <th scope="col">SL.</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Name</th>
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
            getCoreValue();
        });

        function getCoreValue() {
            if ($.fn.DataTable.isDataTable('#coreValueList')) {
                $('#coreValueList').DataTable().destroy();
            }
            $('#coreValueList').DataTable({
                "ajax": {
                    "url": "{{ route('core_value_all') }}",
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
                        "data": "icon",
                        "name": "icon",
                        "autoWidth": true,
                        render: function(data, type, row) {
                            return `<i class="${row.icon} h3" style="color:#de6026;"></i>`;
                        }
                    },
                    {
                        "data": "name",
                        "name": "name",
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
                            let editUrl = `/core-value-edit/${data}/edit`;
                            let buttons = `<a role="button" href="${editUrl}" class="btn btn-link text-primary text-decoration-none btn-sm">
                                <i class="bi bi-pencil-square"></i></a>`;
                            buttons += `<button type="button" class="btn btn-link text-danger text-decoration-none btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" 
                            data-id="${data}" data-url="core-value-delete"><i class="bi bi-trash"></i></button>`;
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
