<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kolkata Steel Associates</title>

    <!-- Favicons -->
    <link href="{{ asset('assets/admin/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/admin/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/46.1.1/ckeditor5.css" />
    <link href="https://cdn.jsdelivr.net/npm/datatables.net-bs5@1.13.6/css/dataTables.bootstrap5.min.css"
        rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/admin/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">

    <!-- Jquery JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>

    <!-- CK Text Editor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/46.1.1/ckeditor5.umd.js"></script>

    <!-- Data Table JS -->
    <script src="https://cdn.jsdelivr.net/npm/datatables.net@1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables.net-bs5@1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <!-- Axios JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.1.3/axios.min.js"
        integrity="sha512-0qU9M9jfqPw6FKkPafM3gy2CBAvUWnYVOfNPDYKVuRTel1PrciTj+a9P3loJB+j0QmN2Y0JYQmkBBS8W+mbezg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Notiflix JS -->
    <link href="https://cdn.jsdelivr.net/npm/notiflix@3.2.7/dist/notiflix-3.2.7.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/notiflix@3.2.7/dist/notiflix-aio-3.2.7.min.js"></script>
    <script>
        Notiflix.Notify.init({
            // options here
        });
        Notiflix.Confirm.init({
            // options here
        });
        Notiflix.Loading.init({
            // options here
        });
    </script>

</head>

<body>
    <!-- Header -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <i class="bi bi-list toggle-sidebar-btn me-4"></i>
            <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/admin/img/logo.png') }}" alt="KSA">
            </a>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('assets/admin/img/profile-img.png') }}" alt="Profile"
                            class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->name }}</h6>
                            <span>{{ Auth::user()->email }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item d-flex align-items-center" type="submit">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Sign Out</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                    <!-- End Profile Dropdown Items -->
                </li>
                <!-- End Profile Nav -->
            </ul>
        </nav>
        <!-- End Icons Navigation -->
    </header>
    <!-- End Header -->

    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('dashboard') }}">
                    <i class="bi bi-speedometer"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->
            <li class="nav-heading">Main</li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('home_banner_list') }}">
                    <i class="bi bi-images"></i>
                    <span>Home Banner</span>
                </a>
            </li><!-- End Home Banner Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('feature_list') }}">
                    <i class="bi bi-bookmark-star"></i>
                    <span>Feature</span>
                </a>
            </li><!-- End Feature Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('core_value_list') }}">
                    <i class="bi bi-fire"></i>
                    <span>Core Value</span>
                </a>
            </li><!-- End Core Value Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('service_list') }}">
                    <i class="bi bi-briefcase"></i>
                    <span>Service</span>
                </a>
            </li><!-- End Service Nav -->
        </ul>
    </aside>
    <!-- End Sidebar -->
    <!-- Main -->
    <main id="main" class="main">
        <!-- Display success message -->
        @if (session('success'))
            <div class="toast-container position-fixed end-0 pe-4">
                <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true"
                    data-bs-autohide="true" data-bs-delay="10000">
                    <div class="toast-header bg-success">
                        <strong class="me-auto text-white"><i class="bi bi-patch-check me-2"></i></i>
                            Notification</strong>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        @endif
        <!-- Display error message -->
        @if (session('error'))
            <div class="toast-container position-fixed end-0 pe-4">
                <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true"
                    data-bs-autohide="true" data-bs-delay="10000">
                    <div class="toast-header bg-danger">
                        <strong class="me-auto text-white"><i class="bi bi-patch-exclamation me-2"></i>
                            Notification</strong>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                            aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        {{ session('error') }}
                    </div>
                </div>
            </div>
        @endif
        <!-- Display content -->
        @yield('content')
    </main>
    <!-- /Main -->
    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <form id="deleteForm" action="" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-content rounded-1 border-0 overflow-hidden">
                    <div class="modal-body p-4 text-center">
                        <h5 class="text-danger">Confirm Deletion</h5>
                        Are you sure you want to delete? This action cannot be undone.
                    </div>
                    <div class="modal-footer flex-nowrap p-0">
                        <button type="submit"
                            class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 border-end text-danger">Yes,
                            delete</button>
                        <button type="button"
                            class="btn btn-lg btn-link fs-6 text-decoration-none col-6 py-3 m-0 rounded-0 text-secondary"
                            data-bs-dismiss="modal">No thanks</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy;
            <script>
                document.write(new Date().getFullYear());
            </script> <strong><span>Kolkata Steel Associates PVT. LTD.</span></strong> All Rights
            Reserved
        </div>
    </footer>
    <!-- End Footer -->
    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('assets/admin/js/main.js') }}"></script>
    <script>
        /* 
         * Global CKEditor Init
         */
        const {
            ClassicEditor,
            Essentials,
            Bold,
            Italic,
            Underline,
            Strikethrough,
            Subscript,
            Superscript,
            Font,
            Paragraph,
            Heading,
            Alignment,
            List,
            Indent,
            Link,
            BlockQuote,
            Code,
            CodeBlock,
            HorizontalLine,
            SpecialCharacters,
            SpecialCharactersEssentials,
            Table,
            TableToolbar
        } = CKEDITOR;

        ClassicEditor
            .create(document.querySelector('.editor'), {
                licenseKey: 'eyJhbGciOiJFUzI1NiJ9.eyJleHAiOjE3OTAzODA3OTksImp0aSI6IjUzYmJhMzg1LTU2OTgtNGI3ZS1iZDU5LWQ2OTUyMzY3MjdjMCIsImxpY2Vuc2VkSG9zdHMiOlsiMTI3LjAuMC4xIiwibG9jYWxob3N0IiwiMTkyLjE2OC4qLioiLCIxMC4qLiouKiIsIjE3Mi4qLiouKiIsIioudGVzdCIsIioubG9jYWxob3N0IiwiKi5sb2NhbCJdLCJ1c2FnZUVuZHBvaW50IjoiaHR0cHM6Ly9wcm94eS1ldmVudC5ja2VkaXRvci5jb20iLCJkaXN0cmlidXRpb25DaGFubmVsIjpbImNsb3VkIiwiZHJ1cGFsIl0sImxpY2Vuc2VUeXBlIjoiZGV2ZWxvcG1lbnQiLCJmZWF0dXJlcyI6WyJEUlVQIiwiRTJQIiwiRTJXIl0sInZjIjoiNWQxM2FhYjgifQ.UVDA-5bZYCDWLqbKSZbZ1rR5I779NdmQ7Qrl7gVUGPe-UeU8gE8I0tmvcb_qbd7kYHIhc7ySplrw7lrBf_glNA',
                plugins: [
                    Essentials,
                    Bold,
                    Italic,
                    Underline,
                    Strikethrough,
                    Subscript,
                    Superscript,
                    Font,
                    Paragraph,
                    Heading,
                    Alignment,
                    List,
                    Indent,
                    Link,
                    BlockQuote,
                    Code,
                    CodeBlock,
                    HorizontalLine,
                    SpecialCharacters,
                    SpecialCharactersEssentials,
                    Table,
                    TableToolbar
                ],
                toolbar: [
                    'undo', 'redo', '|',
                    'heading', '|',
                    'bold', 'italic', 'underline', 'strikethrough', 'subscript', 'superscript', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                    'alignment', '|',
                    'numberedList', 'bulletedList', 'outdent', 'indent', '|',
                    'link', 'blockQuote', 'code', 'codeBlock', '|',
                    'insertTable', '|',
                    'horizontalLine', 'specialCharacters'
                ],
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells'
                    ]
                }
            })
            .then(editor => console.log('CKEditor initialized:', editor))
            .catch(error => console.error(error));
        /* 
         * For Notification Alert 
         */
        document.addEventListener('DOMContentLoaded', function() {
            const toastElList = [].slice.call(document.querySelectorAll('.toast'));
            toastElList.map(function(toastEl) {
                const toast = new bootstrap.Toast(toastEl);
                toast.show();
            });
        });
        $(document).ready(function() {
            /* 
             * For (DELETE) Alert 
             */
            $('#deleteModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var deletedID = button.data('id');
                var deletedURL = button.data('url');
                $('#deleteForm').attr('action', '/admin/' + deletedURL + '/' + deletedID);
            });

            /* 
             * For (SHOW/HIDE) PAssword 
             */
            $('.toggle-password').on('click', function() {
                const $toggle = $(this);
                const $input = $toggle.siblings('.password-input');
                const $icon = $toggle.find('i');
                if (!$input.length) return;

                const isPassword = $input.attr('type') === 'password';
                $input.attr('type', isPassword ? 'text' : 'password');
                $icon.toggleClass('bi-eye bi-eye-slash');
            });
            $('.toggle-password').on('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    $(this).click();
                }
            });
        });
    </script>
    @yield('script')
</body>

</html>
