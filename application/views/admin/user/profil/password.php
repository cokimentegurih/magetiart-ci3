<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Password User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('Admin'); ?>/admin">Home</a></li>
                <li class="breadcrumb-item">User</li>
                <?php if ($title === 'Akun - MagetiArt') : ?>
                    <li class="breadcrumb-item"><a href="<?= base_url('User/account'); ?>">Akun</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('User/detail/' . $user['username']); ?>">Akun</a></li>
                <?php else : ?>
                    <li class="breadcrumb-item"><a href="<?= base_url('User'); ?>">Profil</a></li>
                <?php endif; ?>
                <li class="breadcrumb-item active">Edit Password</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Password User</h5>
                        <div class="row">
                            <div class="col">
                                <?= $this->session->flashdata('message'); ?>
                            </div>
                        </div>
                        <!-- Horizontal Form -->
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id" value="<?= $user['id']; ?>">
                            <div class="row mb-3">
                                <label for="passwordLama" class="col-sm-2 col-form-label">Password Lama</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control <?= (form_error('passwordLama')) ? 'is-invalid' : ''; ?>" id="passwordLama" name="passwordLama">
                                    <?= form_error('passwordLama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-sm-2 col-form-label">Password Baru</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control <?= (form_error('password')) ? 'is-invalid' : ''; ?>" id="password" name="password">
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

                            <!-- <div class="text-center">
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div> -->
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form><!-- End Horizontal Form -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->