<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <title>@yield('title', 'E-Trash')</title>
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


    <!-- Libraries Stylesheet -->
    <link href="{{ asset('resources/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('resources/lib/owlcarousel/assets/owl.theme.default.min.css') }}" rel="stylesheet">

    <link href="{{ asset('resources/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('resources/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('resources/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('resources/css/profil.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/css/elegant-icons.css') }}" type="text/css">

    <!-- Add Owl Carousel CSS -->
    <link rel="stylesheet" href="resources/lib/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="resources/lib/owlcarousel/assets/owl.theme.default.min.css">
    <!-- Link ke library WOW.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="/home" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h1 class="m-0">E-Trash</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="/home" class="nav-item nav-link @yield('home-active')">Home</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Layanan</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="/jemput" class="dropdown-item @yield('jemput-active')">Jemput Sampah</a>
                        <a href="{{ url('layanan-harga-sampah') }}" class="dropdown-item @yield('harga-active')">Harga
                            Sampah</a>
                    </div>
                </div>
                <a href="/about" class="nav-item nav-link @yield('about-active')">About</a>
                <a href="/contact" class="nav-item nav-link @yield('contact-active')">Contact</a>
            </div>
            <a href="{{ route('user.profile') }}"
                class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">Akun</a>
            {{-- @auth
                <!-- User is authenticated -->

            @else
                <!-- User is not authenticated -->
                <a href="/login" class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">Akun<i
                        class="fa fa-arrow-right ms-3"></i></a>
            @endauth
            {{-- <a href="/login" class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">Akun<i
                    class="fa fa-arrow-right ms-3"></i></a> --}}
        </div>
    </nav>
    <!-- Navbar End -->

    @yield('konten')

    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h1 class="fw-bold text-primary mb-4">E<span class="text-secondary"> - </span>Trash</h1>
                    <p>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed
                        stet lorem sit clita</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-0" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p><i class="fa fa-map-marker-alt me-3"></i>Jl. Veteran No. 10</p>
                    <p><i class="fa fa-phone-alt me-3"></i>08135555555</p>
                    <p><i class="fa fa-envelope me-3"></i>E-Trash@gmail.com</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Layanan</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Ingin Menggunakan Layanan Kami ?</h4>
                    <p>Sign In Sekarang</p>
                    <div class="position-relative mx-auto" style="max-width: 400px">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text"
                            placeholder="Your email" />
                        <button type="button"
                            class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">&copy; <a href="#">E-Trash</a>,
                        All Right Reserved.</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- jQuery and Popper.js (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/font/bootstrap-icons.css">


    <!-- Template Javascript -->
    <script src="{{ asset('resources/js/main.js') }}"></script>
    <script src="{{ asset('resources/js/produkmain.js') }}"></script>
    <script src="{{ asset('resources/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('resources/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('resources/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('resources/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('resources/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('resources/lib/parallax/parallax.min.js') }}"></script>
    <script src="{{ asset('resources/lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('resources/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script>
        new WOW().init();
    </script>
</body>

</html>
