@extends('admin.layout.main')
@section('content')
    <div class="pagetitle">
        <h1>Project Gallery</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Project List</li>
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
                            <a href="{{ route('project_gallery_add') }}" role="button" class="btn btn-primary btn-sm">
                                <i class="bi bi-filetype-pdf me-2"></i> ADD PROJECT</a>
                        </div>
                        <hr>
                        <table class="table datatable table-sm" id="projectList">
                            <thead>
                                <tr>
                                    <th scope="col">SL.</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Thumbnail</th>
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
            getProjects();
        });

        function getProjects() {
            if ($.fn.DataTable.isDataTable('#projectList')) {
                $('#projectList').DataTable().destroy();
            }
            $('#projectList').DataTable({
                "ajax": {
                    "url": "{{ route('project_gallery_all') }}",
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
                        "data": "type.type",
                        "name": "type.type",
                        "autoWidth": true,
                    },
                    {
                        "data": "thumbnail",
                        "name": "thumbnail",
                        "autoWidth": true,
                        render: function(data, type, row) {
                            return `<div class="d-flex align-items-center">
                                        <img class="t-thumb" src="/storage/${row.thumbnail}" alt="Image">
                                    </div>`;
                        }
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
                            let editUrl = `/project-gallery-edit/${data}/edit`;
                            let buttons = `<a role="button" href="${editUrl}" class="btn btn-link text-primary text-decoration-none btn-sm">
                                <i class="bi bi-pencil-square"></i></a>`;
                            buttons += `<button type="button" class="btn btn-link text-danger text-decoration-none btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" 
                            data-id="${data}" data-url="project-gallery-delete"><i class="bi bi-trash"></i></button>`;
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
