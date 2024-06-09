<section class="login" id="login">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <a href="<?= base_url(); ?>">
                    <img src="<?= base_url('public/img/'); ?>user/login/login-illustration.jpg" class="img-fluid img-illustration" /></a>
            </div>
            <div class="col-md-6 p-5">
                <div class="card bg-white bg-opacity-75 border-0 ">
                    <div class="card-body">
                        <h2>Lupa Password</h2>
                        <p>Silakan isi password yang baru!</p>
                        <?= $this->session->flashdata('message'); ?>

                        <form action="" method="post">
                            <div class="my-4">
                                <div class="mb-2">
                                    <label for="password" class="form-label">Password Baru</label>
                                    <input type="password" class="form-control <?= (form_error('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" />
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="mb-2">
                                    <label for="konfirmasiPassword" class="form-label">Konfirmasi Password</label>
                                    <input type="password" class="form-control <?= (form_error('konfirmasiPassword')) ? 'is-invalid' : ''; ?>" id="konfirmasiPassword" name="konfirmasiPassword" />
                                    <?= form_error('konfirmasiPassword', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <button type="submit" class="btn mt-4 mb-2">Change Password</button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>