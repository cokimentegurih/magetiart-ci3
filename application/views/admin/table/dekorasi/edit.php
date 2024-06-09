<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Data <?= $decoration['type']; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('Admin'); ?>">Home</a></li>
                <li class="breadcrumb-item">Tabel</li>
                <li class="breadcrumb-item"><a href="<?= base_url('Dekorasi'); ?>">Dekorasi</a></li>
                <li class="breadcrumb-item active">Edit Data <?= $decoration['type']; ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body">
                        <a href="<?= base_url('Dekorasi'); ?>"><button type="button" class="btn btn-warning mt-4"><i class="bi bi-arrow-return-left"></i> Kembali ke Daftar</button></a>

                        <h5 class="card-title">Edit Data <?= $decoration['title']; ?></h5>

                        <!-- Horizontal Form -->
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="oldImage" id="oldImage" value="<?= $decoration['image']; ?>">
                            <input type="hidden" name="id" id="id" value="<?= $decoration['id']; ?>">
                            <?php if ($categories) : ?>
                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Judul</label>
                                    <div class="col-sm-9">
                                        <select id="title" name="title" class="form-select" aria-label="Default select example">
                                            <?php foreach ($categories as $category) : ?>
                                                <option <?= ($decoration['title'] == $category['title']) ? 'selected' : ''; ?> value="<?= $category['title']; ?>" <?= set_select('title', $category['title'], False); ?>><?= $category['title']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Judul</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control <?= (form_error('title')) ? 'is-invalid' : ''; ?>" id="title" name="title" value="<?= (set_value('title')) ? set_value('title') : $decoration['title']; ?>">
                                        <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (!($decoration['type'] == 'kategori' || $decoration['type'] == 'kategori')) : ?>
                                <div class="row mb-3">
                                    <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control <?= (form_error('description')) ? 'is-invalid' : ''; ?>" id="description" name="description" placeholder="Tulis deskripsi singkat."><?= (set_value('description')) ? set_value('description') : $decoration['description']; ?></textarea>
                                        <?= form_error('description', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Unggah Gambar</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img src="<?= base_url('public'); ?>/img/admin/dekorasi/<?= $decoration['image']; ?>" class="img-thumbnail img-preview" alt="Foto dekorasi">
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="file" id="image" name="image" onchange="previewImg()">
                                            <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5 mb-3 justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                                </div>
                            </div>

                        </form><!-- End Horizontal Form -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->