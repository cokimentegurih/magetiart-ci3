<section class="login" id="login">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <a href="<?= base_url('Home'); ?>">
                    <img src="<?= base_url('public/img/'); ?>user/login/login-illustration.jpg" class="img-fluid img-illustration" /></a>
            </div>
            <div class="col-md-6 p-5">
                <div class="card bg-white bg-opacity-75 border-0 ">
                    <div class="card-body">
                        <h2>Log In</h2>
                        <p class="card-text">Selamat datang kembali ke MagetiArt! Silakan masuk untuk mengakses dunia seni yang menginspirasi dari para seniman Magetan yang berbakat.</p>
                        <?= $this->session->flashdata('message'); ?>
                        <form action="" method="post">
                            <div class="my-4">
                                <div class="mb-2">
                                    <label for="email" class="form-label">Email/Username</label>
                                    <input type="text" class="form-control <?= (form_error('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= set_value('email'); ?>" />
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="mb-2">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control <?= (form_error('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" />
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-6">
                                        <a href="<?= base_url('Home'); ?>" class="form-check-label">Kembali</a>
                                    </div>
                                    <div class="col-6 text-end">
                                        <a href="<?= base_url('Auth/forgotPassword'); ?>" class="form-check-label" for="exampleCheck1">Lupa password?</a>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn mt-4 mb-2">Login</button>

                            <div class="row row-signup">
                                <div class="col-6">
                                    <p>Belum punya akun?</p>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="<?= base_url('Auth/register'); ?>">
                                        Sign Up
                                    </a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>