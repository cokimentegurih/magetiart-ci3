<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Data User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('Admin'); ?>">Home</a></li>
                <li class="breadcrumb-item">User</li>
                <li class="breadcrumb-item"><a href="<?= base_url('User/account'); ?>">Akun</a></li>
                <li class="breadcrumb-item active">Tambah Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Masukkan Data Baru</h5>

                        <!-- Horizontal Form -->
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?= (form_error('name')) ? 'is-invalid' : ''; ?>" id="name" name="name" value="<?= set_value('name'); ?>">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?= (form_error('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= set_value('username'); ?>">
                                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control <?= (form_error('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone" class="col-sm-2 col-form-label <?= (form_error('phone')) ? 'is-invalid' : ''; ?>">NomorHP</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="phone" name="phone" value="<?= set_value('phone'); ?>">
                                    <?= form_error('phone', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="adress" class="col-sm-2 col-form-label <?= (form_error('adress')) ? 'is-invalid' : ''; ?>">NomorHP</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="adress" name="adress" value="<?= set_value('adress'); ?>">
                                    <?= form_error('adress', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <?php if ($roles) : ?>
                                <div class="row mb-3">
                                    <label for="role" class="col-sm-2 col-form-label">Role</label>
                                    <div class="col-sm-9">
                                        <select id="role" name="role" class="form-select" aria-label="Default select example">
                                            <option value="">Pilih Role</option>
                                            <?php foreach ($roles as $role) : ?>
                                                <option value="<?= $role['id']; ?>" <?= set_select('role', $role['id'], False); ?>><?= $role['title']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('role', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Unggah Foto</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img src="<?= base_url('public'); ?>/img/template/blank-profile-picture.jpg" class="img-thumbnail img-preview" alt="Foto user">
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="form-control img-input" type="file" id="image" name="image" onchange="previewImg()" required>
                                            <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control <?= (form_error('password')) ? 'is-invalid' : ''; ?>" id="password" name="password">
                                    <i class="far fa-eye" id="togglePassword" style="cursor: pointer; z-index: 100;"></i>
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="konfirmasiPassword" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control <?= (form_error('konfirmasiPassword')) ? 'is-invalid' : ''; ?>" id="konfirmasiPassword" name="konfirmasiPassword">
                                    <?= form_error('konfirmasiPassword', '<small class="text-danger pl-3">', '</small>'); ?>
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