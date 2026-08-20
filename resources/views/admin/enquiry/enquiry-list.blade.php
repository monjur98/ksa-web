@extends('admin.layout.main')
@section('content')
    <div class="pagetitle">
        <h1>Enquiry</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Enquiry List</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <!-- Card -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table datatable table-sm" id="enquiryLists">
                            <thead>
                                <tr>
                                    <th scope="col">SL.</th>
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
            getEnquiry();
        });

        function getEnquiry() {
            if ($.fn.DataTable.isDataTable('#enquiryLists')) {
                $('#enquiryLists').DataTable().clear().destroy();
            }

            $('#enquiryLists').DataTable({
                ajax: {
                    url: "{{ route('enquiry_all') }}",
                    type: "GET",
                    dataType: "json",
                },

                columns: [{
                        data: null,
                        name: "serial_number",
                        render: function(data, type, row, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        data: "name",
                        name: "name"
                    },
                    {
                        data: "status",
                        name: "status",
                        render: function(data) {
                            switch (Number(data)) {
                                case 0:
                                    return `
                                <span class="badge rounded-0 bg-warning-subtle text-warning-emphasis">
                                    <i class="bi bi-hourglass"></i> Pending
                                </span>`;
                                case 1:
                                    return `
                                <span class="badge rounded-0 bg-success-subtle text-success-emphasis">
                                    <i class="bi bi-check-circle"></i> Complete
                                </span>`;
                                case 2:
                                    return `
                                <span class="badge rounded-0 bg-danger-subtle text-danger-emphasis">
                                    <i class="bi bi-ban"></i> Reject
                                </span>`;
                                default:
                                    return '';
                            }
                        }
                    },
                    {
                        data: "id",
                        name: "actions",
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            let editUrl = `/enquiry-edit/${data}/edit`;
                            return `
                        <a href="${editUrl}" class="btn btn-link text-primary text-decoration-none btn-sm">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <button type="button" 
                            class="btn btn-link text-danger text-decoration-none btn-sm" 
                            data-bs-toggle="modal" 
                            data-bs-target="#deleteModal"
                            data-id="${data}" 
                            data-url="enquiry-delete">
                            <i class="bi bi-trash"></i>
                        </button>
                    `;
                        }
                    }
                ]
            });
        }
    </script>
@endsection
