<!-- ======= Header ======= -->
<header id="header" class="header fixed-top ps-0" style="height: fit-content;">
    <div class="container-fluid">
        <div class="row  align-items-center">
            <div class="col-2 py-2 py-sm-3 py-md-4  text-center">
                <a href="<?= base_url('Home'); ?>">
                    <img src="<?= base_url('public/img/template/back-arrow-red.svg'); ?>" class="img-fluid">
                </a>
            </div>
            <div class="col-8 py-2 py-sm-3 py-md-4 d-flex align-items-center" style="border-bottom: 0.8vh solid #C24332;">
                <div style="width: 15%;">
                    <img src="<?= base_url('public/img/template/navbar-logo.png'); ?>" class="img-fluid me-3">
                </div>
                <h5 class="fs-lg-4 ">Kustom Karya Seni</h5>
            </div>
        </div>
    </div>

</header><!-- End Header -->

<!-- Hero start -->
<section class="hero" id="hero">
    <div class="container-fluid">
        <div class="row mb-3 text">
            <div class="col">
                <h5 class="fs-3">Kustom Karya Kamu Disini!</h5>
                <p class="" style="color: black; ">
                    Kami menawarkan layanan pembuatan lukisan kustom sesuai dengan
                    permintaan dan keinginan kamu! Kamu dapat memilih ukuran, jenis
                    media, dan gaya lukisan yang diinginkan, serta memberikan gambar
                    atau referensi yang akan dijadikan acuan dalam pembuatan lukisan.
                </p>
            </div>
        </div>
        <div class="row row-card">
            <div class="col-md-4 mb-3">
                <div class="card text-center">
                    <div class="card-img d-flex align-items-end" style="background-image: url(<?= base_url('public/img/user/detail/kustom-potrait.jpg'); ?>); ">
                        <div class="bg-title w-100">
                            <h5 class="card-title m-0">Self Potrait</h5>
                        </div>
                    </div>

                    <ul class="list-group list-group-flush py-3">
                        <li class="list-group-item">
                            <h5>Sketsa Wajah Pensil</h5>
                            <h6>IDR 65.000-80.000</h6>
                        </li>
                        <li class="list-group-item">
                            <h5>Lukis Wajah Akrilik</h5>
                            <h6>IDR 200.000-1.000.000</h6>
                        </li>
                        <li class="list-group-item">
                            <h5>Digital Painting</h5>
                            <h6>IDR 65.000-100.000</h6>
                        </li>
                        <li class="list-group-item">
                            <a href="<?= base_url('Detail/detailKustom'); ?>" class="btn px-4">Lihat Semua</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card text-center">
                    <div class="card-img d-flex align-items-end" style="background-image: url(<?= base_url('public/img/user/detail/kustom-akrilik.jpg'); ?>); ">
                        <div class="bg-title w-100">
                            <h5 class="card-title m-0">Cat Akrilik</h5>
                        </div>

                    </div>

                    <ul class="list-group list-group-flush py-3">
                        <li class="list-group-item">
                            <h5>Mini Kanvas</h5>
                            <h6>IDR 1.500.000-2.000.000</h6>
                        </li>
                        <li class="list-group-item">
                            <h5>Regular Kanvas</h5>
                            <h6>IDR 2.500.000-7.000.000</h6>
                        </li>
                        <li class="list-group-item">
                            <h5>Large Kanvas</h5>
                            <h6>IDR 8.000.000</h6>
                        </li>
                        <li class="list-group-item">
                            <button class="btn px-4" disabled>Lihat Semua</button>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card text-center">
                    <div class="card-img d-flex align-items-end" style="background-image: url(<?= base_url('public/img/user/detail/kustom-minyak.jpg'); ?>); ">
                        <div class="bg-title w-100">
                            <h5 class="card-title m-0">Cat Minyak</h5>
                        </div>
                    </div>

                    <ul class="list-group list-group-flush py-3">
                        <li class="list-group-item">
                            <h5>Mini Kanvas</h5>
                            <h6>IDR 1.500.000-2.000.000</h6>
                        </li>
                        <li class="list-group-item">
                            <h5>Regular Kanvas</h5>
                            <h6>IDR 2.500.000-7.000.000</h6>
                        </li>
                        <li class="list-group-item">
                            <h5>Large Kanvas</h5>
                            <h6>IDR 8.000.000</h6>
                        </li>
                        <li class="list-group-item">
                            <button class="btn px-4" disabled>Lihat Semua</button>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero end -->