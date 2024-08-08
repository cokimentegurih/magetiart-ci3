<!-- ======= Header ======= -->
<header id="header" class="header fixed-top " style="height: fit-content; margin: 0 10%;">
    <div class="container">
        <div class="row py-1 py-sm-2 py-md-3 align-items-center">
            <div class="col">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <div>
                                <img src="<?= base_url('public/img/template/navbar-logo.png'); ?>" class="img-fluid me-2">
                            </div>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvasLg" aria-controls="navbarOffcanvasLg" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="navbarOffcanvasLg" aria-labelledby="navbarOffcanvasLgLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">MagetiArt</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body align-items-center justify-content-between px-5 px-lg-0">
                                <form action="<?= base_url('Produk'); ?>" method="post" class="d-flex my-3" role="search">
                                    <input class="form-control me-2" type="search" placeholder="Cari produk" aria-label="Search" name="keyword">
                                    <button class="btn btn-outline-danger" type="submit"><i class="bi bi-search p-2"></i></button>
                                </form>
                                <div class="row me-2">
                                    <div class="col">
                                        <ul class="navbar-nav align-items-center">
                                            <li class="nav-item mx-2 mb-2">
                                                <a class="nav-link active" href="<?= base_url('Produk'); ?>">Produk</a>
                                            </li>
                                            <li class="nav-item mx-2 mb-2">
                                                <?php if ($this->session->userdata('cart')) : ?>
                                                    <span class="ms-3 ms-lg-4 rounded-circle text-center" style="position: absolute; background-color: #C24332; background-position: center; height: 15px; width: 15px; font-size: x-small; color: white;">
                                                        <?= $items; ?>
                                                    </span>
                                                <?php endif; ?>
                                                <a class="nav-link" href="<?= base_url('Keranjang'); ?>">
                                                    <img src="<?= base_url('public/img/template/shopping-cart.svg'); ?>">
                                                    <span class="d-lg-none ms-3">Keranjang</span>
                                                </a>
                                            </li>
                                            <li class="nav-item mx-2 mb-2" style="position: relative;">
                                                <?php if ($this->session->userdata('notifs')) : ?>
                                                    <span class="ms-3 ms-lg-4 rounded-circle text-center" style="position: absolute; background-color: #C24332; left: 2px; top: 4px;  height: 15px; width: 15px; font-size: x-small; color: white;">
                                                        <?= count($this->session->userdata('notifs')); ?>
                                                    </span>
                                                <?php endif; ?>
                                                <a class="nav-link" href="<?= base_url('Home/notification'); ?>">
                                                    <img src="<?= base_url('public/img/template/bell.svg'); ?>">
                                                    <span class="d-lg-none ms-3">Notifikasi</span>
                                                </a>
                                            </li>
                                            <li class="nav-item mx-2 mb-4 mb-lg-2 d-flex align-items-center">
                                                <div class="rounded-circle overflow-hidden" style="height: 3vw; width: 3vw; min-height: 3rem; min-width: 3rem;">
                                                    <?php if ($user) : ?>
                                                        <a class="nav-link p-0 " href="<?= base_url('Admin'); ?>" target="_blank">
                                                            <img class="img-fluid" src="<?= base_url('public/img/admin/user/' . $user['image']); ?>">
                                                        </a>
                                                    <?php else : ?>
                                                        <img class="img-fluid" src="<?= base_url('public/img/template/blank-profile-picture.jpg'); ?>">
                                                    <?php endif; ?>

                                                </div>
                                                <span class="d-lg-none ms-3"> Profil Akun</span>
                                            </li>

                                            <?php if (!$user) : ?>
                                                <li class="nav-item mb-2">
                                                    <div class="rounded-pill px-3" style="background-color: #c24332;">
                                                        <a class="nav-link" href="<?= base_url('Auth'); ?>" style="color: white;"><i class="bi bi-box-arrow-right"></i> Login</a>
                                                    </div>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>




                        </div>

                    </div>
                </nav>
            </div>
        </div>
    </div>

</header><!-- End Header -->

<div class="container-fluid hero" style="background-image: url(<?= base_url('public/img/user/home/hero-bg.jpg'); ?>); background-repeat: no-repeat; background-size: cover; background-position: center;">
    <div class="row" style="padding: 0 10vw;">
        <div class="col-lg-6 pe-lg-5">
            <img src="<?= base_url('public/img/user/home/hero.png'); ?>" class="img-fluid">
            <p class="py-4" style="color: black; text-align: justify;">Dalam rangka membantu Komunitas Seniman Magetan untuk terus produktif dan menjangkau ke pasar yang lebih luas</p>
        </div>
        <div class="col-lg-6">
            <!-- Slides with captions -->
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $i = 1;
                    foreach ($artworks as $artwork) :
                    ?>
                        <div <?php if ($i == 1) { ?> class="carousel-item active" <?php } else { ?> class="carousel-item" <?php } ?>>
                            <div class="row">
                                <div class="col-10">
                                    <img src="<?= base_url('public/img/admin/dekorasi/' . $artwork['image']); ?>" class="img-fluid" alt="<?= $artwork['title']; ?>">
                                    <div class="row py-5 px-2">
                                        <div class="col-2">
                                            <h1><?= $i; ?></h1>
                                        </div>
                                        <div class="col-7">
                                            <div class="mt-2">
                                                <h5><?= $artwork['title']; ?></h5>
                                                <p><?= $artwork['description']; ?>.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php
                        $i++;
                    endforeach; ?>
                </div>
                <button class="carousel-control-next " style="filter: invert(100%);" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>

            </div><!-- End Slides with captions -->
        </div>
    </div>
</div>

<div class="container-fluid kustom" style="background-color: #C24332; padding: 10vh 0;">
    <div class="row w-100 align-items-center justify-content-center">
        <div class="col-5 col-lg-3 col-xxl-4 text-center">
            <img src="<?= base_url('public/img/user/home/kustom-art.png'); ?>" class="img-fluid">
        </div>
        <div class="col-6 col-lg-4 col-xxl-5">
            <img src="<?= base_url('public/img/user/home/kustom.png'); ?>" class="img-fluid">
            <p class="py-3 ms-3">Buat lukisan sesuai dengan keinginan kamu dengan sekali klik!</p>
            <a href="<?= base_url('Detail/kustom'); ?>" class="btn btn-light ms-3">Lihat Selengkapnya</a>
        </div>
    </div>
</div>

<div class="container koleksi" style="padding: 10vh 5vw;">

    <div class="row">
        <div class="col">
            <?php $i = 1; ?>
            <?php foreach ($collections as $collection) : ?>
                <div class="jumbotron jumbotron-fluid py-5 my-5 " style="background-image: url('<?= base_url('public/img/admin/dekorasi/' . $collection['image']); ?>'); background-size: cover; ">
                    <div class="container px-5">
                        <div class="row <?= ($i % 2 == 1) ? 'justify-content-lg-end' : '';  ?>">
                            <div class="col-lg-6">
                                <div class="card" style="background-color: #C24332;">
                                    <div class="card-body p-4">
                                        <h5 class="card-title"><?= $collection['title']; ?></h5>
                                        <p class="card-text"><?= $collection['description']; ?></p>
                                        <a href="<?= base_url('Produk/category/' . $collection['slug']); ?>" class="btn btn-light">Lihat Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $i++; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="container gayaseni" style="padding: 0 5vw;">
    <div class="row mb-3 justify-content-between">
        <div class="col-4 col-sm-2">
            <h5>Gaya Seni</h5>
        </div>
        <div class="col-4 col-sm-2 text-end">
            <a class="see" href="<?= base_url('Produk'); ?>">Lihat semua</a>
        </div>
    </div>
    <div class="row mb-3 justify-content-between">
        <?php foreach ($artstyles as $artstyle) : ?>
            <div class="col-md-4 mb-3">
                <a href="<?= base_url('Produk/category/' . $artstyle['slug']); ?>">
                    <div class="card">
                        <img src="<?= base_url('public/img/admin/dekorasi/' . $artstyle['image']); ?>" class="card-img-top" alt="<?= $artstyle['title']; ?>">
                        <div class="card-body pb-0 text-center">
                            <h5 class="card-title"><?= $artstyle['title']; ?></h5>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="container seniman" style="padding: 0 5vw;">
    <div class="row mb-3 justify-content-between">
        <div class="col-4 col-sm-2">
            <h5>Seniman</h5>
        </div>
        <div class="col-4 col-sm-2 text-end">
            <a class="see" href="<?= base_url('Produk/seniman'); ?>">Lihat semua</a>
        </div>
    </div>
    <div class="row mb-3 justify-content-between">
        <?php foreach ($artists as $artist) : ?>
            <div class="col-md-4 mb-3">
                <a href="<?= base_url('Detail/seniman/' . $artist['email']); ?>" style="text-decoration: none; ">
                    <div class="card">
                        <img src="<?= base_url('public/img/admin/seniman/' . $artist['cover']); ?>" class="card-img-top" alt="<?= $artist['name']; ?>">
                        <div class="card-body p-0 text-center">
                            <div class="row py-2 justify-content-center">
                                <div class="col col-lg-10 justify-content-center d-inline-flex align-items-center">
                                    <div class="rounded-circle overflow-hidden image">
                                        <img src="<?= base_url('public/img/admin/seniman/' . $artist['image']); ?>" class="img-fluid">
                                    </div>
                                    <h5 class="card-title px-4 px-md-2 px-lg-4">
                                        <?= (strlen($artist['name']) < 20) ? $artist['name'] : substr($artist['name'], 0, 20) . '...'; ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="container berita" style="padding: 0 5vw;">
    <div class="row mb-3 justify-content-between">
        <div class="col-4 col-sm-2">
            <h5>Berita</h5>
        </div>
        <div class="col-4 col-sm-2 text-end">
            <a class="see" href="<?= base_url('Produk/berita'); ?>">Lihat semua</a>
        </div>
    </div>
    <div class="row mb-3 justify-content-between">
        <?php foreach ($newss as $news) : ?>
            <div class="col-md-4 mb-3">
                <a style="color: black;" href="<?= $news['link']; ?>" target="_blank">
                    <div class="card">
                        <img src="<?= base_url('public/img/admin/berita/' . $news['image']); ?>" class="card-img-top" alt="<?= $news['title']; ?>">
                        <div class="card-body p-0 text-center">
                            <h5 class="card-title px-3" style="font-size: smaller;">

                                <?= (strlen($news['title']) < 75) ? $news['title'] : substr($news['title'], 0, 75) . '...'; ?>

                            </h5>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>



<!-- Footer start -->
<footer style="background-image: url(<?= base_url('public/img/template/footer-bg.jpg'); ?>); background-size: cover; background-position: center; padding: 5vh 0;">
    <div class="container" style="padding: 0 5vw;">
        <div class="row py-3">
            <div class="col-4">
                <img src="<?= base_url('public/img/template/footer-logo.jpg'); ?>" alt="logo footer MagetiArt" class="img-fluid">
            </div>
        </div>

        <div class="row">
            <div class="col-8">
                <p>Jl. Jaksa Agung Suprapto No.6, Dusun Magetan, Magetan, Kec. Magetan, Kabupaten Magetan, Jawa Timur 63361</p>
                <a href="magetiart@gmail.com"><i class="bi bi-envelope"></i> magetiart@gmail.com</a>
                <p><i class="bi bi-instagram"></i> @magetiart</p>
            </div>
            <div class="col-4 text-end">
                <img src="<?= base_url('public/img/template/footer-bank.png'); ?>" alt="pilihan Bank" class="img-fluid">
            </div>
        </div>
    </div>
</footer>
<!-- Footer end -->