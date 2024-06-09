<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Data Berita MagetiArt</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('Admin'); ?>">Home</a></li>
                <li class="breadcrumb-item">Tabel</li>
                <li class="breadcrumb-item"><a href="<?= base_url('Berita'); ?>">Berita</a></li>
                <li class="breadcrumb-item active">Tambah Data</li>
            </ol>
        </nav>
    </div>

    <!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Masukkan Data Baru</h5>

                        <!-- Horizontal Form -->
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Judul Berita</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?= (form_error('title')) ? 'is-invalid' : ''; ?>" id="title" name="title" value="<?= set_value('title'); ?>">
                                    <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="link" class="col-sm-2 col-form-label">Tautan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control <?= (form_error('link')) ? 'is-invalid' : ''; ?>" id="link" name="link" placeholder="Tulis tautan berita."><?= set_value('link'); ?></textarea>
                                    <?= form_error('link', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Unggah Gambar</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img src="<?= base_url('public'); ?>/img/template/blank-profile-picture.jpg" class="img-thumbnail img-preview" alt="Foto karya">
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="file" id="image" name="image" onchange="previewImg()" required>
                                            <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form><!-- End Horizontal Form -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->