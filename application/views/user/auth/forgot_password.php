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
                        <p>Silakan isi email aktif yang sudah terdaftar!</p>
                        <?= $this->session->flashdata('message'); ?>

                        <form action="" method="post">
                            <div class="my-4">
                                <div class="mb-2">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control <?= (form_error('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= set_value('email'); ?>" />
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <button type="submit" class="btn mt-4 mb-2">Send</button>
                            <div class="row row-signup">
                                <div class="col-6">
                                    <a href="<?= base_url('Auth'); ?>">
                                        Kembali
                                    </a>
                                </div>
                                <!-- <div class="col-6 text-end">
                                    <a href="<?= base_url('Auth/register'); ?>">
                                        Sign Up
                                    </a>
                                </div> -->
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>