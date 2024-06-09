<main id="main" class="main">

    <div class="pagetitle">
        <h1>Detail Berita MagetiArt</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('Admin'); ?>">Home</a></li>
                <li class="breadcrumb-item">Tabel</li>
                <li class="breadcrumb-item"><a href="<?= base_url('Berita'); ?>">Berita</a></li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body">

                        <a href="<?= base_url('Berita'); ?>"><button type="button" class="btn btn-warning mt-4"><i class="bi bi-arrow-return-left"></i> Kembali ke daftar</button></a>

                        <h5 class="card-title">Detail Berita</h5>
                        <div class="row mt-2">
                            <div class="col">
                                <?= $this->session->flashdata('message'); ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <!-- Card with an image on top -->
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-11">
                                                <img src="<?= base_url('public/img/admin/berita/' . $news['image']); ?>" class="card-img-top">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="card-footer"> -->
                                    <div class="row mb-4 justify-content-center">
                                        <div class="col-lg-10">
                                            <h5 class="card-title text-center"><?= $news['title']; ?></h5>
                                        </div>
                                    </div>
                                    <!-- </div> -->
                                </div><!-- End Card with an image on top -->
                            </div>
                            <div class="col-lg-8">
                                <!-- Default Card -->
                                <div class="card">
                                    <div class="card-body">
                                        <h5 id="place" class="card-title text-center">Sumber Berita</h5>
                                        <div class=" row mb-2">
                                            <div class="col-sm-3">
                                                <p class="card-text">Tautan</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="card-text">: <a href="<?= $news['link']; ?>" target="_blank"><?= $news['link']; ?></a></p>
                                            </div>
                                        </div>
                                        <div class="row mt-4 justify-content-end">
                                            <div class="col-sm-9 text-end">
                                                <a href="<?= base_url('Berita/edit/' . $news['slug']); ?>" class="btn btn-secondary"><i class="bi bi-collection me-1"></i> Edit Data</a>
                                                <a href="<?= base_url('Berita/delete/' . $news['slug']); ?>" class="btn btn-danger tombol-hapus"><i class="bi bi-exclamation-octagon me-1"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Default Card -->
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->