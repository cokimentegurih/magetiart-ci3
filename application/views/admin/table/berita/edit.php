<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Data Berita MagetiArt</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('Admin'); ?>">Home</a></li>
                <li class="breadcrumb-item">Tabel</li>
                <li class="breadcrumb-item"><a href="<?= base_url('Berita'); ?>">Berita</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('Berita/detail/' . $news['slug']); ?>">Detail</a></li>
                <li class="breadcrumb-item active">Edit Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body">
                        <a href="<?= base_url('Berita/detail/' . $news['slug']); ?>"><button type="button" class="btn btn-warning mt-4"><i class="bi bi-arrow-return-left"></i> Kembali ke detail</button></a>

                        <h5 class="card-title">Masukkan Data Baru</h5>

                        <!-- Horizontal Form -->
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="oldImage" id="oldImage" value="<?= $news['image']; ?>">
                            <input type="hidden" name="id" id="id" value="<?= $news['id']; ?>">
                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Judul Berita</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?= (form_error('title')) ? 'is-invalid' : ''; ?>" id="title" name="title" value="<?= (set_value('title')) ? set_value('title') : $news['title']; ?>">
                                    <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="link" class="col-sm-2 col-form-label">Tautan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control <?= (form_error('link')) ? 'is-invalid' : ''; ?>" id="link" name="link" placeholder="Tulis deskripsi singkat."><?= (set_value('link')) ? set_value('link') : $news['link']; ?></textarea>
                                    <?= form_error('link', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Unggah Gambar</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img src="<?= base_url('public'); ?>/img/admin/berita/<?= $news['image']; ?>" class="img-thumbnail img-preview" alt="Foto berita">
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="file" id="image" name="image" onchange="previewImg()">
                                            <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form><!-- End Horizontal Form -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->