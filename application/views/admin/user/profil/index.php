<main id="main" class="main">

    <div class="pagetitle">
        <h1>Profil Saya</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('Admin'); ?>">Home</a></li>
                <li class="breadcrumb-item">User</li>
                <li class="breadcrumb-item active">Profil</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-10">
                <div class="card mb-3">

                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?= base_url('public'); ?>/img/admin/user/<?= $currentUser['image']; ?>" class="img-fluid rounded-start" alt="Foto <?= $currentUser['name']; ?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $currentUser['name']; ?></h5>
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
                                        <p class="card-text">: <?= $currentUser['username']; ?></p>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <p class="card-text">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="card-text">: <?= $currentUser['email']; ?></p>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <p class="card-text">Nomor HP</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="card-text">: <?= $currentUser['phone']; ?></p>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <p class="card-text">Alamat</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="card-text">: <?= $currentUser['adress']; ?></p>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <p class="card-text"><small class="text-body-secondary">Password</small></p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="card-text"><small class="text-body-secondary">: <a href="<?= base_url('User/changePassword/' . $currentUser['username']); ?>" class="badge bg-secondary"><i class="bi bi-pencil-square"></i> ubah password</a></small></p>

                                    </div>
                                </div>

                                <div class="row mt-3 justify-content-end">
                                    <div class="col-sm-9">
                                        <a href="<?= base_url('User/edit/' . $currentUser['username']); ?>"><button type="button" class="btn btn-primary"><i class="bi bi-folder me-1"></i> Edit Data Profil</button></a>

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