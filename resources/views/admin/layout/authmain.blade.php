<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kolkata Steel Associates</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="{{ asset('assets/admin/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/admin/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <main class="login-bg">
        <!-- Display success message -->
        @if (session('success'))
            <div class="toast-container position-fixed end-0 pt-3 pe-3">
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
            <div class="toast-container position-fixed end-0 pt-3 pe-3">
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
        @yield('content')
    </main>

    <!-- Jquery JS -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/admin/js/main.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toastElList = [].slice.call(document.querySelectorAll('.toast'));
            toastElList.map(function(toastEl) {
                const toast = new bootstrap.Toast(toastEl);
                toast.show();
            });
        });
        $(document).ready(function() {
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
    <!-- Pages Script -->
    @yield('script')
</body>
