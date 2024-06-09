<!-- ======= Header ======= -->
<header id="header" class="header fixed-top ps-0" style="height: fit-content;">
    <div class="container-fluid">
        <div class="row  align-items-center">
            <div class="col-2 py-2 py-sm-3 py-md-4  text-center">
                <a href="<?= base_url('Detail/karya/' . $product['slug']); ?>">
                    <img src="<?= base_url('public/img/template/back-arrow-red.svg'); ?>" class="img-fluid">
                </a>
            </div>
            <div class="col-8 py-2 py-sm-3 py-md-4 d-flex align-items-center" style="border-bottom: 0.8vh solid #C24332;">
                <div style="width: 15%;">
                    <img src="<?= base_url('public/img/template/navbar-logo.png'); ?>" class="img-fluid me-3">
                </div>
                <h5 class="fs-lg-4 ">Checkout</h5>
            </div>
        </div>
    </div>

</header><!-- End Header -->

<!-- End Page Title -->
<section class="section" style="padding: 20vh 0;">
    <div class="container hero">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Masukkan Data Diri Anda</h5>

                        <!-- Horizontal Form -->
                        <form action="" method="post">
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?= (form_error('name')) ? 'is-invalid' : ''; ?>" id="name" name="name" value="<?php
                                                                                                                                                            if (set_value('name')) {
                                                                                                                                                                echo set_value('name');
                                                                                                                                                            } else {
                                                                                                                                                                echo ($user) ? $user['name'] : $user;
                                                                                                                                                            }
                                                                                                                                                            ?>">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email aktif</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control <?= (form_error('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?php
                                                                                                                                                                if (set_value('email')) {
                                                                                                                                                                    echo set_value('email');
                                                                                                                                                                } else {
                                                                                                                                                                    echo ($user) ? $user['email'] : $user;
                                                                                                                                                                }
                                                                                                                                                                ?>">
                                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone" class="col-sm-2 col-form-label <?= (form_error('phone')) ? 'is-invalid' : ''; ?>">Nomor WA</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="phone" name="phone" value="<?php
                                                                                                            if (set_value('phone')) {
                                                                                                                echo set_value('phone');
                                                                                                            } else {
                                                                                                                echo ($user) ? $user['phone'] : $user;
                                                                                                            }
                                                                                                            ?>">
                                    <?= form_error('phone', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control <?= (form_error('address')) ? 'is-invalid' : ''; ?>" id="address" name="address" placeholder="Tulis alamat lengkap."><?php
                                                                                                                                                                                        if (set_value('adress')) {
                                                                                                                                                                                            echo set_value('adress');
                                                                                                                                                                                        } else {
                                                                                                                                                                                            echo ($user) ? $user['adress'] : $user;
                                                                                                                                                                                        }
                                                                                                                                                                                        ?></textarea>
                                    <?= form_error('address', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form><!-- End Horizontal Form -->

                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Produk dipesan</h5>
                        <p class="card-text">Nikmati detail lengkap pemesanan Anda, memberikan gambaran yang jelas tentang pengalaman berharga membeli karya seni langsung dari komunitas seni Magetan di MagetiArt.</p>
                        <table class="table table-hover">
                            <thead>
                                <tr class="text-center align-middle">
                                    <th scope="col"></th>
                                    <th scope="col">Produk</th>
                                    <th scope="col">Harga Satuan</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>


                                <tr class="text-center align-middle">
                                    <th scope="row" style="width:10%">1</th>
                                    <td style="width:40%; text-align: left;">
                                        <div class="row align-items-center">
                                            <div class="col-md-6 mb-3">
                                                <img src="<?= base_url('public/img/admin/karya/' . $product['image']); ?>" class="img-fluid" />
                                            </div>
                                            <div class="col-md-6">
                                                <h5>
                                                    <?= $product['title']; ?>
                                                </h5>
                                            </div>
                                        </div>

                                    </td>
                                    <td style="width:20%; height: ;"><?= $product['price']; ?></td>
                                    <td>
                                        <span><?= $products_in_cart; ?></span>
                                    </td>
                                    <td style="width:20%;  color: #C24332;"><?= $product['price']; ?></td>
                                </tr>

                            </tbody>
                        </table>
                        <div class="row justify-content-end">
                            <div class="col-3 text-center">
                                <h5 class="card-title">Total Pembayaran</h5>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-3 text-center">
                                <p class="card-text"><?= $product['price']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>