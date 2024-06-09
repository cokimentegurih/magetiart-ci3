<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tabel Daftar Dekorasi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('Admin'); ?>">Home</a></li>
                <li class="breadcrumb-item">Dekorasi</li>
                <li class="breadcrumb-item active">Home</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Daftar Dekorasi Halaman Home MagetiArt</h5>
                        <p class="card-text">Dengan sentuhan artistik yang khas, kami menghadirkan koleksi dekorasi yang menginspirasi dan memikat, membawa keindahan seni ke dalam setiap ruang. Temukan karya seni yang unik dan memukau, yang akan memberikan sentuhan istimewa. Jelajahi beragam pilihan dekorasi yang disesuaikan dengan gaya dan preferensi, dan buatlah ruang menjadi tempat yang menawan dengan MagetiArt.</p>
                        <div class="row mt-2">
                            <div class="col">
                                <?= $this->session->flashdata('message'); ?>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Karya Seni</h5>
                        <p class="card-text">Karya seni seleksi terbaik oleh MagetiArt yang berada di section 1 pada Halaman Utama.</p>


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

                                                <div class="row p-3">
                                                    <div class="col-2">
                                                        <h1><?= $i; ?></h1>
                                                    </div>
                                                    <div class="col-10">
                                                        <div class="mt-2">
                                                            <h5><?= $artwork['title']; ?></h5>
                                                            <p><?= $artwork['description']; ?>.</p>
                                                        </div>
                                                        <a href="<?= base_url('Dekorasi/edit/' . $artwork['slug']); ?>" class="btn btn-secondary mb-3">
                                                            <i class="bi bi-collection me-1"></i> Ubah Data
                                                        </a>
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

                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Koleksi</h5>
                        <p class="card-text">Koleksi karya seni berisi kategori pilihan yang berada di section 3 pada Halaman Utama.</p>
                        <?php foreach ($collections as $collection) : ?>
                            <div class="jumbotron jumbotron-fluid" style="background-image: url('<?= base_url('public/img/admin/dekorasi/' . $collection['image']); ?>'); background-size: cover; padding: 20px; margin:20px 0;">
                                <div class="container">
                                    <div class="card ">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $collection['title']; ?></h5>
                                            <p class="card-text"><?= $collection['description']; ?></p>
                                            <a href="<?= base_url('Dekorasi/edit/' . $collection['slug']); ?>" class="btn btn-secondary mb-3">
                                                <i class="bi bi-collection me-1"></i> Ubah Data
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Gaya Seni</h5>
                        <p class="card-text">Gaya seni pilihan sebagai top 3 dari daftar kategori MagetiArt yang berada di section 4 pada Halaman Utama.</p>
                        <div class="row">
                            <?php foreach ($artstyles as $artstyle) : ?>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="<?= base_url('public/img/admin/dekorasi/' . $artstyle['image']); ?>" class="card-img-top" alt="<?= $artstyle['title']; ?>">
                                        <div class="card-body text-center">
                                            <h5 class="card-title"><?= $artstyle['title']; ?></h5>
                                            <a href="<?= base_url('Dekorasi/edit/' . $artstyle['slug']); ?>" class="badge bg-secondary">
                                                <i class="bi bi-collection"></i> Ubah
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>

                    </div>
                </div>

                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Seniman</h5>
                        <p class="card-text">Seniman terpilih sebagai persona dari komunitas MagetiArt yang berada di section 5 pada Halaman Utama.</p>
                        <div class="row">
                            <?php foreach ($artists as $artist) : ?>
                                <div class="col-md-4">
                                    <div class="card">

                                        <img src="<?= base_url('public/img/admin/seniman/' . $artist['cover']); ?>" class="card-img-top" alt="<?= $artist['name']; ?>">
                                        <div class="card-body text-center">
                                            <div class="row align-items-center">
                                                <div class="col-3 col-lg-4 px-1 py-3">
                                                    <div class="rounded-circle overflow-hidden img-seniman ">
                                                        <img src="<?= base_url('public/img/admin/seniman/' . $artist['image']); ?>" class="img-fluid">
                                                    </div>

                                                </div>
                                                <div class="col-9 col-lg-8 mx-0">
                                                    <h5 class="card-title fs-4 fs-md-5 fs-lg-6">
                                                        <?= (strlen($artist['name']) < 5) ? $artist['name'] : substr($artist['name'], 0, 5) . '...'; ?>
                                                    </h5>
                                                </div>
                                            </div>
                                            <a href="<?= base_url('Dekorasi/editTable/' . $artist['email']); ?>" class="badge bg-secondary mt-4">
                                                <i class="bi bi-collection"></i> Ubah
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>

                    </div>
                </div>

                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Berita dan Event</h5>
                        <p class="card-text">Berita dan Event yang melibatkan kegiatan oleh komunitas MagetiArt berada di section 6 pada Halaman Utama.</p>
                        <div class="row">
                            <?php foreach ($newss as $news) : ?>
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="<?= base_url('public/img/admin/berita/' . $news['image']); ?>" class="card-img-top" alt="<?= $news['title']; ?>">
                                        <div class="card-body text-center">
                                            <h5 class="card-title" style="font-size: smaller;">
                                                <a href="<?= $news['link']; ?>" target="_blank"><?= (strlen($news['title']) < 17) ? $news['title'] : substr($news['title'], 0, 17) . '...'; ?></a>
                                            </h5>
                                            <a href="<?= base_url('Dekorasi/editTable/' . $news['slug']); ?>" class="badge bg-secondary">
                                                <i class="bi bi-collection"></i> Ubah
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->