<main id="main" class="main">

    <div class="pagetitle">
        <h1>Detail Seniman MagetiArt</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('Admin'); ?>">Home</a></li>
                <li class="breadcrumb-item">Tabel</li>
                <li class="breadcrumb-item"><a href="<?= base_url('Seniman'); ?>">Seniman</a></li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body">

                        <a href="<?= base_url('Seniman'); ?>"><button type="button" class="btn btn-warning mt-4"><i class="bi bi-arrow-return-left"></i> Kembali ke daftar</button></a>

                        <h5 class="card-title">Detail Seniman <?= $artist['name']; ?></h5>
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
                                                <img src="<?= base_url('public/img/admin/seniman/' . $artist['cover']); ?>" class="card-img">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-11">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="rounded-circle overflow-hidden" style="height: 4rem; width: 4rem;">
                                                            <img src="<?= base_url('public/img/admin/seniman/' . $artist['image']); ?>" class="img-fluid">
                                                        </div>

                                                    </div>
                                                    <div class="col-8">
                                                        <h5 class="card-title"><?= $artist['name']; ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Card with an image on top -->
                            </div>
                            <div class="col-lg-8">
                                <!-- Default Card -->
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-center"><?= $artist['place']; ?></h5>
                                        <div class="row mb-2">
                                            <div class="col-sm-3">
                                                <p class="card-text">Instagram</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="card-text">: <?= $artist['ig']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3">
                                                <p class="card-text">Email</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="card-text">: <?= $artist['email']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3">
                                                <p class="card-text">Facebook</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="card-text">: <?= $artist['fb']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-sm-3">
                                                <p class="card-text">Profil Seniman</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="card-text">: <?= $artist['profile']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row mt-4 justify-content-end">
                                            <div class="col-sm-9 text-end">
                                                <a href="<?= base_url('Seniman/edit/' . $artist['email']); ?>" class="btn btn-secondary"><i class="bi bi-collection me-1"></i> Edit Data</a>
                                                <a href="<?= base_url('Seniman/delete/' . $artist['email']); ?>" class="btn btn-danger tombol-hapus"><i class="bi bi-exclamation-octagon me-1"></i> Hapus</a>
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