<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Data Seniman MagetiArt</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('Admin'); ?>">Home</a></li>
                <li class="breadcrumb-item">Tabel</li>
                <li class="breadcrumb-item"><a href="<?= base_url('Seniman'); ?>">Seniman</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('Seniman/detail/' . $artist['email']); ?>">Detail</a></li>
                <li class="breadcrumb-item active">Edit Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body">
                        <a href="<?= base_url('Seniman/detail/' . $artist['email']); ?>"><button type="button" class="btn btn-warning mt-4"><i class="bi bi-arrow-return-left"></i> Kembali ke detail</button></a>

                        <h5 class="card-title">Edit Data <?= $artist['name']; ?></h5>

                        <!-- Horizontal Form -->
                        <form action="<?= base_url('Seniman/edit/' . $artist['email']); ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="oldImage" id="oldImage" value="<?= $artist['image']; ?>">
                            <input type="hidden" name="oldCover" id="oldCover" value="<?= $artist['cover']; ?>">
                            <input type="hidden" name="id" id="id" value="<?= $artist['id']; ?>">
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?= (form_error('name')) ? 'is-invalid' : ''; ?>" id="name" name="name" value="<?= (set_value('name')) ? set_value('name') : $artist['name']; ?>">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="place" class="col-sm-2 col-form-label">Asal Seniman</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?= (form_error('place')) ? 'is-invalid' : ''; ?>" id="place" name="place" value="<?= (set_value('place')) ? set_value('place') : $artist['place']; ?>">
                                    <?= form_error('place', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="profile" class="col-sm-2 col-form-label">Profil Seniman</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control <?= (form_error('profile')) ? 'is-invalid' : ''; ?>" id="profile" name="profile" placeholder="Tulis deskripsi singkat."><?= (set_value('profile')) ? set_value('profile') : $artist['profile']; ?></textarea>
                                    <?= form_error('profile', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="ig" class="col-sm-2 col-form-label">Instagram</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?= (form_error('ig')) ? 'is-invalid' : ''; ?>" id="ig" name="ig" value="<?= (set_value('ig')) ? set_value('ig') : $artist['ig']; ?>">
                                    <?= form_error('ig', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control <?= (form_error('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= (set_value('email')) ? set_value('email') : $artist['email']; ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="fb" class="col-sm-2 col-form-label">Facebook</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?= (form_error('fb')) ? 'is-invalid' : ''; ?>" id="fb" name="fb" value="<?= (set_value('fb')) ? set_value('fb') : $artist['fb']; ?>">
                                    <?= form_error('fb', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Unggah Foto</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img src="<?= base_url('public'); ?>/img/admin/seniman/<?= $artist['image']; ?>" class="img-thumbnail img-preview" alt="Foto seniman">
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="file" id="image" name="image" onchange="previewImg()">
                                            <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="cover" class="col-sm-2 col-form-label">Unggah Sampul</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img src="<?= base_url('public'); ?>/img/admin/seniman/<?= $artist['cover']; ?>" class="img-thumbnail img-cover" alt="Foto cover">
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="file" id="cover" name="cover" onchange="previewCover()">
                                            <?= form_error('cover', '<small class="text-danger pl-3">', '</small>'); ?>
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