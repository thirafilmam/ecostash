@extends('layout.master')
@section('title', 'About')
@section('about', 'active')

@section('konten')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('img/carousel-1.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <h1 class="display-1 text-white mb-5 animated slideInDown">Angkut Sampahmu dengan Mudah
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('img/carousel-2.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <h1 class="display-1 text-white mb-5 animated slideInDown">Bersihkan Sampah Dari Rumah
                                        Lebih Mudah Dengan E-Trash
                                    </h1>
                                    <a href="" class="btn btn-primary py-sm-3 px-sm-4">Explore More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('img/carousel-3.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <h1 class="display-1 text-white mb-5 animated slideInDown">Dapatkan Point Dengan Menukar
                                        Sampah</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-end">
                <div class="col-lg-3 col-md-5 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid rounded" data-wow-delay="0.1s" src="img/about-1.jpg">
                </div>
                <div class="col-lg-6 col-md-7 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="display-1 text-primary mb-0">5</h1>
                    <p class="text-primary mb-4">Tahun Berpengalaman</p>
                    <h1 class="display-5 mb-4">Kami Mengolah Limbahmu Dengan Baik</h1>
                    <p class="mb-4">Dalam moto "Berikan Limbahmu, Kami Berikan Penanganan yang Bijak," kami memastikan
                        setiap jenis limbah mendapat perlakuan yang sesuai dengan standar keamanan dan keberlanjutan.</p>
                    <a class="btn btn-primary py-3 px-4" href="/jemput">Explore More</a>
                </div>
                <div class="col-lg-3 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row g-5">
                        <div class="col-12 col-sm-6 col-lg-12">
                            <div class="border-start ps-4">
                                <i class="fa fa-award fa-3x text-primary mb-3"></i>
                                <h4 class="mb-3">Inovasi yang Mendapat Pengakuan</h4>
                                <span>Kami bangga menjadi peraih berbagai penghargaan yang menandai keunggulan dan dedikasi
                                    kami dalam mewujudkan standar tertinggi.</span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-12">
                            <div class="border-start ps-4">
                                <i class="fa fa-users fa-3x text-primary mb-3"></i>
                                <h4 class="mb-3">Ketulusan dalam Pelayanan</h4>
                                <span>Kami percaya bahwa kebersamaan adalah kunci keberhasilan, dan tim kami mencerminkan
                                    harmoni dalam berjuang bersama.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Facts Start -->
    <div class="container-fluid facts my-5 py-5" data-parallax="scroll" data-image-src="img/back-about.jpg">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                    <h1 class="display-4 text-white" data-toggle="counter-up">380</h1>
                    <span class="fs-5 fw-semi-bold text-light">Happy Clients</span>
                </div>
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                    <h1 class="display-4 text-white" data-toggle="counter-up">150.870</h1>
                    <span class="fs-5 fw-semi-bold text-light">Sampah Terdaur Ulang (KG)</span>
                </div>
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-4 text-white" data-toggle="counter-up">38</h1>
                    <span class="fs-5 fw-semi-bold text-light">Dedicated Staff</span>
                </div>
                <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                    <h1 class="display-4 text-white" data-toggle="counter-up">190</h1>
                    <span class="fs-5 fw-semi-bold text-light">Awards Achieved</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->
    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-bold text-primary">Our Team</p>
                <h1 class="display-5 mb-5">Dedicated & Experienced Team Members</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded">
                        <img class="img-fluid" src="img/team-1.jpeg" alt="">
                        <div class="team-text">
                            <h4 class="mb-0">Rastama Hanin Berlyan</h4>
                            <p class="text-primary">Supervisor</p>
                            <div class="team-social d-flex">
                                <a class="btn btn-square rounded-circle me-2" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item rounded">
                        <img class="img-fluid" src="img/team-2.png" alt="">
                        <div class="team-text">
                            <h4 class="mb-0">Tegar Putra Pradana</h4>
                            <p class="text-primary">Supervisor</p>
                            <div class="team-social d-flex">
                                <a class="btn btn-square rounded-circle me-2" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item rounded">
                        <img class="img-fluid" src="img/team-3.jpg" alt="">
                        <div class="team-text">
                            <h4 class="mb-0">Thirafi Ilmam</h4>
                            <p class="text-primary">Supervisor</p>
                            <div class="team-social d-flex">
                                <a class="btn btn-square rounded-circle me-2" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-square rounded-circle me-2" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

@endsection
