<main id="main" class="main">

    <div class="pagetitle">
        <h1>Profil User <?= $user['name']; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('Admin'); ?>">Home</a></li>
                <li class="breadcrumb-item">User</li>
                <li class="breadcrumb-item"><a href="<?= base_url('User/account'); ?>">Akun</a></li>
                <li class="breadcrumb-item active">Detail</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-10">
                <div class="card mb-3">

                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?= base_url('public'); ?>/img/admin/user/<?= $user['image']; ?>" class="img-fluid rounded-start" alt="Foto <?= $user['name']; ?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <a href="<?= base_url('User/account'); ?>"><button type="button" class="btn btn-warning mt-4"><i class="bi bi-arrow-return-left"></i> Kembali ke daftar</button></a>

                                <h5 class="card-title"><?= $user['name']; ?></h5>
                                <div class="row">
                                    <div class="col">
                                        <?= $this->session->flashdata('message'); ?>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <p class="card-text">Username</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="card-text">: <?= $user['username']; ?></p>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <p class="card-text">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="card-text">: <?= $user['email']; ?></p>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <p class="card-text">Nomor HP</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="card-text">: <?= $user['phone']; ?></p>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <p class="card-text">Alamat</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="card-text">: <?= $user['adress']; ?></p>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <p class="card-text"><small class="text-body-secondary">Password</small></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="card-text"><small class="text-body-secondary">: <a href="<?= base_url('User/changePassword/' . $user['username']); ?>" class="badge bg-secondary"><i class="bi bi-pencil-square"></i> ubah password</a></small></p>

                                    </div>
                                </div>

                                <div class="row mt-3 justify-content-end">
                                    <div class="col-sm-9">
                                        <a href="<?= base_url('User/edit/' . $user['username']); ?>"><button type="button" class="btn btn-secondary"><i class="bi bi-folder me-1"></i> Edit Data</button></a>
                                        <a href="<?= base_url('User/delete/' . $user['username']); ?>" class="btn btn-danger tombol-hapus"><i class="bi bi-exclamation-octagon me-1"></i> Hapus</a>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->