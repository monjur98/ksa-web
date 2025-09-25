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
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/fav_icon.ico') }}">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap"
        rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/site.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
</head>

<body>
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{ route('home_page') }}" class="logo">
                            <img src="assets/images/Ksa-logo.png" alt="KSA">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="{{ route('home_page') }}"
                                    class="{{ request()->routeIs('home_page') ? 'active' : '' }}">Home</a></li>
                            <li><a href="{{ route('home_page') }}#services">Services</a>
                            </li>
                            <li><a href="{{ route('about_page') }}"
                                    class="{{ request()->routeIs('about_page') ? 'active' : '' }}">About KSA</a></li>
                            <li><a href="{{ route('project_gallery_page') }}"
                                    class="{{ request()->routeIs('project_gallery_page') ? 'active' : '' }}">Project
                                    Gallery</a></li>
                            <li><a href="{{ route('contact_page') }}"
                                    class="{{ request()->routeIs('contact_page') ? 'active' : '' }}">Contact Us</a>
                            </li>
                            <li><a href="{{ route('home_page') }}#quote">Get
                                    A Quote <i class="fa-regular fa-comment"></i></a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
    @yield('content')
    <!-- ***** Footer Area Start ***** -->
    <footer class="footer">
        <div class="container copyright text-center">
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
    <!-- ***** Footer Area End ***** -->
    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>

    <script src="{{ asset('assets/js/tabs.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script>
        var interleaveOffset = 0.5;

        var swiperOptions = {
            loop: true,
            speed: 1000,
            grabCursor: true,
            watchSlidesProgress: true,
            mousewheelControl: true,
            keyboardControl: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            on: {
                progress: function() {
                    var swiper = this;
                    for (var i = 0; i < swiper.slides.length; i++) {
                        var slideProgress = swiper.slides[i].progress;
                        var innerOffset = swiper.width * interleaveOffset;
                        var innerTranslate = slideProgress * innerOffset;
                        swiper.slides[i].querySelector(".slide-inner").style.transform =
                            "translate3d(" + innerTranslate + "px, 0, 0)";
                    }
                },
                touchStart: function() {
                    var swiper = this;
                    for (var i = 0; i < swiper.slides.length; i++) {
                        swiper.slides[i].style.transition = "";
                    }
                },
                setTransition: function(speed) {
                    var swiper = this;
                    for (var i = 0; i < swiper.slides.length; i++) {
                        swiper.slides[i].style.transition = speed + "ms";
                        swiper.slides[i].querySelector(".slide-inner").style.transition =
                            speed + "ms";
                    }
                }
            }
        };
        var swiper = new Swiper(".swiper-container", swiperOptions);
    </script>
    @yield('script')
</body>

</html>
