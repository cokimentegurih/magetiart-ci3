<!-- ======= Header ======= -->
<header id="header" class="header fixed-top ps-0 d-flex bg-transparent shadow-none" style="height: fit-content;">
    <div class="container-fluid">
        <div class="row align-items-center" style="background-image: url(<?= base_url('public/img/template/nav-bg.jpg'); ?>);">
            <div class="col-4 col-md-2 py-2 py-sm-3 py-md-4  text-center">
                <a href="<?= base_url('Produk/seniman'); ?>">
                    <img src="<?= base_url('public/img/template/back-arrow.svg'); ?>" class="img-fluid">
                </a>
            </div>
        </div>
    </div>
</header><!-- End Header -->
<!-- style="background-image: url(<?= base_url('public/img/template/nav-bg.jpg'); ?>); height: 40vh;" -->

<div class="nav-hero">
    <!-- Navbar start -->
    <!-- <nav class="navbar navbar-expand">
        <div class="a-svg">
            <a href="<?= base_url('Produk/seniman'); ?>">
                <img src="<?= base_url('public/img/template/back-arrow.svg'); ?>" class="img-fluid">
            </a>
        </div>
    </nav> -->
    <!-- Navbar end -->

    <!-- Hero start -->
    <section class="hero" id="hero">
        <div class="container-fluid">
            <div class="card shadow-none mb-3">
                <div class="row align-items-center nav-bg" style="background-image: url(<?= base_url('public/img/template/nav-bg.jpg'); ?>); background-repeat: no-repeat;">
                    <div class="col-lg-4 d-flex justify-content-center ">
                        <img src="<?= base_url('public/img/admin/seniman/' . $artist['image']); ?>" class="img-fluid rounded-circle" alt="<?= $artist['name']; ?>" />
                    </div>
                    <div class="col-lg-8">
                        <div class="card-body pb-0">
                            <div class="row py-4 profile-data">
                                <div class="col-6">
                                    <h5 class="card-title fs-1 py-1 name"><?= $artist['name']; ?></h5>
                                    <p class="card-text place"><?= $artist['place']; ?></p>
                                </div>

                                <div class="col-6">
                                    <p class="card-text"><i class="bi bi-instagram"></i> @<?= $artist['ig']; ?></p>
                                    <p class="card-text">
                                        <i class="bi bi-envelope"></i> <?= $artist['email']; ?>
                                    </p class="card-text">
                                    <p class="card-text"><i class="bi bi-facebook"></i> <?= $artist['fb']; ?></p>
                                </div>
                            </div>
                            <div class="row py-4">
                                <div class="col profile">
                                    <h5 class="card-title fs-5">Profil</h5>
                                    <p class="card-text">
                                        <span><?= $artist['name']; ?> </span>
                                        <?= $artist['profile']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero end -->
</div>

<!-- Koleksi start -->
<section class="koleksi" id="koleksi">
    <div class="container">
        <div class="row">
            <div class="col">
                <h5>Koleksi</h5>
            </div>
        </div>
        <div class="row row-cols-lg-2">
            <?php if (empty($collections)) : ?>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data kosong!</h5>
                            <p class="card-text">Tidak ada data karya dari seniman <?= $artist['name']; ?> yang bisa ditampilkan.</p>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <?php foreach ($collections as $collection) : ?>
                <div class=" col-md-6  mt-3">
                    <div class="card mb-3">
                        <div class="row g-0 align-items-center">
                            <div class="col-md-5">
                                <div class="image">
                                    <img src="<?= base_url('public'); ?>/img/admin/karya/<?= $collection['image']; ?>" class="img-fluid rounded-start" alt="<?= $collection['title']; ?>">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h5 class="card-title pb-1"><?= $collection['title']; ?></h5>
                                    <p class="card-text mb-0"><?= $collection['material']; ?></p>
                                    <p class="card-text fs-5 price"><?= $collection['price']; ?></p>
                                    <a href="<?= base_url('Produk/bySeniman/' . $artist['email']); ?>" class="btn btn-detail">Lihat Semua</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
<!-- Koleksi end -->