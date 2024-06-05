@extends('layout.master')
@section('title', 'Harga Sampah')
@section('harga', 'active')

@section('konten')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Jual Sampahmu</h1>
        </div>
    </div>
    <!-- Page Header End -->
    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-bold text-primary">Kami Membantu Menjual Sampahmu</p>
                <h1 class="display-5 mb-5">Jemput Sampah dan Jadikan Cuan</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="img/service-1.jpg" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <img class="img-fluid" src="img/icon/icon-1.png" alt="Icon">
                            </div>
                            <h4 class="mb-3">Pilah Sampahmu</h4>
                            <p class="mb-4">Pilahlah sampahmu untuk menjadi point yang nantinya akan ditukar menjadi
                                hadiah menarik</p>
                            <a class="btn btn-sm" href=""><i class="fa fa-plus text-primary me-2"></i>Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="img/service-2.jpg" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <img class="img-fluid" src="img/icon/icon-2.png" alt="Icon">
                            </div>
                            <h4 class="mb-3">Daur Ulang</h4>
                            <p class="mb-4">Kami akan melakukan daur ulang sampah yang kamu pilah</p>
                            <a class="btn btn-sm" href=""><i class="fa fa-plus text-primary me-2"></i>Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="img/service-3.jpg" alt="">
                        </div>
                        <div class="service-text rounded p-5">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <img class="img-fluid" src="img/icon/icon-3.png" alt="Icon">
                            </div>
                            <h4 class="mb-3">Langkah Bumi Hijau</h4>
                            <p class="mb-4">Ini merupakan langkah awal untuk membangun kebiasaan baru, untuk membuat bumi
                                lebih hijau</p>
                            <a class="btn btn-sm" href=""><i class="fa fa-plus text-primary me-2"></i>Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- Product Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px">
                        <h1 class="display-5 mb-3">Jual Sampahmu</h1>
                        <p>Dapatkan Pointnya dan Tukarkan Menjadi Hadiah !</p>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        <li class="nav-item me-2">
                            <a id="anorganikBtn" class="btn btn-outline-primary border-2 active" data-bs-toggle="pill"
                                href="#tab-1">Anorganik</a>
                        </li>
                        <li class="nav-item me-2">
                            <a id="organikBtn" class="btn btn-outline-primary border-2" data-bs-toggle="pill"
                                href="#tab-2">Organik</a>
                        </li>
                    </ul>
                </div>


            </div>
        </div>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    @foreach ($produk as $row)
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp"
                            data-wow-delay="{{ ($loop->index % 4) * 0.2 }}s">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="img-fluid w-100" src="{{ asset('uploads/' . $row->gambar) }}"
                                        alt="{{ $row->nama }}">
                                    <div
                                        class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                        New
                                    </div>
                                </div>
                                <div class="text-center p-4">
                                    <h5 class="d-block h5 mb-2">
                                        {{ $row->nama }}
                                    </h5>
                                    <span class="text-primary me-1">Rp. {{ $row->harga }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('anorganikBtn').addEventListener('click', function() {
            fetchData('anorganik');
        });

        document.getElementById('organikBtn').addEventListener('click', function() {
            fetchData('organik');
        });

        function fetchData(jenis) {
            fetch('/produk?type=' + jenis)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    displayProducts(data.produk);
                })
                .catch(error => console.error('Error:', error));
        }

        function displayProducts(products) {
            const productsContainer = document.getElementById('productsContainer');
            productsContainer.innerHTML = ''; // Clear the container before adding new products

            products.forEach(product => {
                const productItem = document.createElement('div');
                productItem.className = 'col-xl-3 col-lg-4 col-md-6 wow fadeInUp';
                productItem.setAttribute('data-wow-delay', '0.2s');

                // Customize HTML based on your product structure
                productItem.innerHTML = `
                <div class="product-item">
                <div class="position-relative bg-light overflow-hidden">
                    <img class="img-fluid w-100" src="${assetUrl}/${product.gambar}" alt="${product.nama}">
                    <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                        New
                    </div>
                </div>
                <div class="text-center p-4">
                    <h5 class="d-block h5 mb-2">${product.nama}</h5>
                    <span class="text-primary me-1">Rp. ${product.harga}</span>
                </div>
            </div>
                `;

                productsContainer.appendChild(productItem);
            });
        }
    </script>

    @include('penggunas.testimoni')


@endsection
