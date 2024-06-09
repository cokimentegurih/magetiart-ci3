<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Profil User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('Admin'); ?>">Home</a></li>
                <li class="breadcrumb-item">User</li>
                <?php if ($title === 'Akun - MagetiArt') : ?>
                    <li class="breadcrumb-item"><a href="<?= base_url('User/account'); ?>">Akun</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('User/detail/' . $user['username']); ?>">Detail</a></li>
                <?php else : ?>
                    <li class="breadcrumb-item"><a href="<?= base_url('User'); ?>">Profil</a></li>
                <?php endif; ?>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-10">


                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <?php if ($title === 'Akun - MagetiArt') : ?>
                                    <a href="<?= base_url('User/detail/' . $user['username']); ?>"><button type="button" class="btn btn-warning mt-4"><i class="bi bi-arrow-return-left"></i> Kembali ke detail</button></a>
                                <?php else : ?>
                                    <a href="<?= base_url('User'); ?>"><button type="button" class="btn btn-warning mt-4"><i class="bi bi-arrow-return-left"></i> Kembali ke profil</button></a>
                                <?php endif; ?>
                            </div>
                        </div>


                        <h5 class="card-title">Edit Profil <?= $user['name']; ?></h5>

                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="oldImage" id="oldImage" value="<?= $user['image']; ?>">
                            <input type="hidden" name="id" id="id" value="<?= $user['id']; ?>">
                            <div class="row mb-3">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?= (form_error('name')) ? 'is-invalid' : ''; ?>" id="name" name="name" value="<?= (set_value('name')) ? set_value('name') : $user['name']; ?>">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?= (form_error('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" value="<?= (set_value('username')) ? set_value('username') : $user['username']; ?>">
                                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control <?= (form_error('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= (set_value('email')) ? set_value('email') : $user['email']; ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone" class="col-sm-2 col-form-label <?= (form_error('phone')) ? 'is-invalid' : ''; ?>">NomorHP</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="phone" name="phone" value="<?= (set_value('phone')) ? set_value('phone') : $user['phone']; ?>">
                                    <?= form_error('phone', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="adress" class="col-sm-2 col-form-label <?= (form_error('adress')) ? 'is-invalid' : ''; ?>">Alamat</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="adress" name="adress" value="<?= (set_value('adress')) ? set_value('adress') : $user['adress']; ?>">
                                    <?= form_error('adress', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <?php if ($roles) : ?>
                                <div class="row mb-3">
                                    <label for="role" class="col-sm-2 col-form-label">Role</label>
                                    <div class="col-sm-9">
                                        <select id="role" name="role" class="form-select" aria-label="Default select example">
                                            <?php foreach ($roles as $role) : ?>
                                                <option <?= ($user['role_id'] == $role['id']) ? 'selected' : ''; ?> value="<?= $role['id']; ?>" <?= set_select('role', $role['id'], False); ?>><?= $role['title']; ?></option>
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
                                            <img src="<?= base_url('public'); ?>/img/admin/user/<?= $user['image']; ?>" class="img-thumbnail img-preview" alt="Foto user">
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="file" id="image" name="image" onchange="previewImg()">
                                            <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>


            </div>
        </div>
    </section>

</main><!-- End #main -->