@extends('admin.layout.main')
@section('content')
    <div class="pagetitle">
        <h1>Career</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Career List</li>
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
                            <a href="{{ route('career_add') }}" role="button" class="btn btn-primary btn-sm">
                                <i class="bi bi-person-badge me-2"></i> ADD CAREER</a>
                        </div>
                        <hr>
                        <table class="table datatable table-sm w-100" id="careerList">
                            <thead>
                                <tr>
                                    <th scope="col">SL.</th>
                                    <th scope="col">Position</th>
                                    <th scope="col">Vacancie</th>
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
            getCareer();
        });

        function getCareer() {
            if ($.fn.DataTable.isDataTable('#careerList')) {
                $('#careerList').DataTable().destroy();
            }
            $('#careerList').DataTable({
                "ajax": {
                    "url": "{{ route('career_all') }}",
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
                        "data": "vacancies",
                        "name": "vacancies",
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
                            let editUrl = `/career-edit/${data}/edit`;
                            let buttons = `<a role="button" href="${editUrl}" class="btn btn-link text-primary text-decoration-none btn-sm">
                                <i class="bi bi-pencil-square"></i></a>`;
                            buttons += `<button type="button" class="btn btn-link text-danger text-decoration-none btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" 
                            data-id="${data}" data-url="career-delete"><i class="bi bi-trash"></i></button>`;
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
