<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kolkata Steel Associates</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Header Area Start -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div
            class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
            <a href="{{ route('home_page') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/Ksa-logo.png') }}" alt="KSA">
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('home_page') }}"
                            class="{{ request()->routeIs('home_page') ? 'active' : '' }}">Home</a></li>
                    <li><a href="{{ route('home_page') }}#services">Services</a></li>
                    <li><a href="{{ route('about_page') }}"
                            class="{{ request()->routeIs('about_page') ? 'active' : '' }}">About KSA</a></li>
                    <li><a href="{{ route('project_gallery_page') }}"
                            class="{{ request()->routeIs('project_gallery_page') ? 'active' : '' }}">Projects
                        </a></li>
                    <li><a href="{{ route('company_gallery_page') }}"
                            class="{{ request()->routeIs('company_gallery_page') ? 'active' : '' }}">Gallery
                        </a></li>
                    <li><a href="{{ route('career_page') }}"
                            class="{{ request()->routeIs('career_page') ? 'active' : '' }}">Career
                        </a></li>
                    <li><a href="{{ route('contact_page') }}"
                            class="{{ request()->routeIs('contact_page') ? 'active' : '' }}">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>

    <!-- Display success message -->
    @if (session('success'))
        <div class="toast-container position-fixed bottom-0 end-0 pb-4 pe-4 z-1050">
            <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true"
                data-bs-delay="10000">
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
        <div class="toast-container position-fixed bottom-0 end-0 pb-4 pe-4 z-1050">
            <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true"
                data-bs-delay="10000">
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
    <main class="main">
        @yield('content')
    </main>
    <!-- Footer Area Start -->
    @php
        $contact = contactInfo();
    @endphp
    <footer id="footer" class="footer position-relative light-background">
        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <div class="footer-contact pt-3">
                        <h3><i class="bi bi-geo-alt icon"></i></h3>
                        <p>{{ $contact->address ?? '' }}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 footer-about">
                    <div class="footer-contact pt-3">
                        <h3><i class="bi bi-telephone"></i></h3>
                        <p>+91 {{ $contact->phone ?? '' }}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 footer-about">
                    <div class="footer-contact pt-3">
                        <h3><i class="bi bi-envelope-at"></i></h3>
                        <p>{{ $contact->email ?? '' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>&copy; <span>
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                </span> <strong class="px-1 sitename">Kolkata Steel Associates PVT. LTD.</strong> <span>All Rights
                    Reserved</span></p>
            <div class="credits">
                Developed by <a href="https://codebuzz.in/" target="_blank"><img style="height: 14px"
                        src="https://codebuzz.in/codebuzz.png" alt="CodeBuzz"></a>
            </div>
        </div>
    </footer>

    <!-- Floting BTN -->
    <div class="fab-container">
        <div class="fab shadow">
            <div class="fab-content">
                <span class="material-icons">
                    <img src="{{ asset('assets/img/helpdesk.png') }}" alt="Help Desk">
                </span>
            </div>
        </div>
        <div class="sub-button">
            <a href="{{ route('home_page') }}#quote">
                <span class="material-icons"><i class="bi bi-chat-left-quote"></i></span>
            </a>
        </div>
        <div class="sub-button">
            <a href="javascript:void(0)" target="_blank">
                <span class="material-icons"><i class="bi bi-facebook"></i></span>
            </a>
        </div>
        <div class="sub-button">
            <a href="javascript:void(0)" target="_blank">
                <span class="material-icons"><i class="bi bi-linkedin"></i></span>
            </a>
        </div>
    </div>
    <!-- Scroll Top -->
    <a href="javascript:void(0)" id="scroll-top"
        class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @yield('script')
</body>

</html>
