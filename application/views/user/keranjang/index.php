<!-- ======= Header ======= -->
<header id="header" class="header fixed-top ps-0" style="height: fit-content;">
    <div class="container-fluid">
        <div class="row  align-items-center">
            <div class="col-2 py-2 py-sm-3 py-md-4  text-center">
                <a href="<?= base_url('Produk'); ?>">
                    <img src="<?= base_url('public/img/template/back-arrow-red.svg'); ?>" class="img-fluid">
                </a>
            </div>
            <div class="col-8 py-2 py-sm-3 py-md-4 d-flex align-items-center" style="border-bottom: 0.8vh solid #C24332;">
                <div style="width: 15%;">
                    <img src="<?= base_url('public/img/template/navbar-logo.png'); ?>" class="img-fluid me-3">
                </div>
                <h5 class="fs-lg-4 ">Keranjang Belanja</h5>
            </div>
        </div>
    </div>

</header><!-- End Header -->
<?php $disabled = false; ?>

<!-- Hero start -->
<div style="padding: 20vh 0;">
    <section class="hero" id="hero">
        <div class="container">
            <div class="row">
                <div class="col">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center align-middle">
                                <th scope="col"></th>
                                <th scope="col">Produk</th>
                                <th scope="col">Harga Satuan</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($products)) : ?>
                                <tr>
                                    <td colspan="6" style="text-align:center;">Tidak ada produk di dalam keranjang belanja.</td>
                                </tr>
                            <?php else : ?>
                                <?php $i = 1;
                                foreach ($products as $product) : ?>
                                    <tr class="text-center align-middle">
                                        <th scope="row" style="width:10%"><?= $i; ?></th>
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
                                        <td style="width:10%; height: ;"><?= $product['price']; ?></td>
                                        <form action="<?= base_url('Keranjang/update'); ?>" method="post">
                                            <input type="hidden" id="product_id" name="product_id" value="<?= $product['id']; ?>">
                                            <td class="quantity">
                                                <button type="submit" name="minus" value="1" style="background-color: transparent;">
                                                    <img class="icon" src="<?= base_url('public/img/template/round-minus.svg'); ?>">
                                                </button>
                                                <span><?= $products_in_cart[$product['id']]; ?></span>
                                                <button <?= ($products_in_cart[$product['id']] > $product['quantity']) ? 'disabled' : $disabled = true; ?> type="submit" name="add" value="add" style="background-color: transparent;">
                                                    <img class="icon" src="<?= base_url('public/img/template/round-plus.svg'); ?>">
                                                </button>
                                            </td>
                                            <td style="width:15%;  color: #C24332;"><?= 'IDR ' . number_format("" . (float)intval(str_replace('.', '', trim($product['price'], "IDR"))) * (int)$products_in_cart[$product['id']] . "", 0, ",", "."); ?></td>
                                            <td style="width:10%">
                                                <button type="submit" name="delete" value="1" style="background-color: transparent;" onclick="return confirm('Produk akan dihapus dari keranjang?')">
                                                    <img class="icon" src="<?= base_url('public/img/template/trash-can.svg'); ?>">
                                                </button>
                                            </td>
                                        </form>
                                    </tr>
                                    <?php if ($products_in_cart[$product['id']] > $product['quantity']) : ?>
                                        <tr>
                                            <td colspan="6" style="text-align:center;">
                                                <small class="text-danger pl-3">Mohon maaf stok kurang. Silakan pilih produk lain!</small>
                                            </td>
                                        </tr>
                                    <?php
                                        $disabled = true;
                                    endif; ?>
                                <?php
                                    $i++;
                                endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php if ($this->session->flashdata('message')) : ?>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <!-- Default Card -->
                        <div class="card p-5">
                            <div class="card-body">
                                <p class="card-text text-danger mb-0">Tetap pada halaman ini selama Anda masih melanjutkan pemesanan! Klik tombol di bawah.</p>
                                <a class="btn btn-success mb-2" onclick="window.open(<?= $this->session->flashdata('whatsapp'); ?>)"><i class="bi bi-whatsapp"></i> Whatsapp</a>
                                <p class="card-text fw-semibold">Silakan lanjutkan pemesanan (Continue to Chat) melalui Whatsapp dengan nomor tertera. Apabila ada masalah hubungi juga nomor lain yang telah disajikan.</p>
                                <p class="card-text" style="text-align: justify;">
                                    <?= $this->session->flashdata('message'); ?>
                                </p>
                            </div>
                        </div><!-- End Default Card -->
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </section>
</div>

<!-- Hero end -->
<footer>
    <div class="container-fluid fixed-bottom py-4">
        <div class="row text-center">
            <div class="col-4 ">
                <h5>Produk Terpilih</h5>
                <p>
                    (
                    <?php if ($this->session->userdata('cart')) : ?>
                        <?= $items; ?>
                    <?php else : ?>
                        0
                    <?php endif; ?> )
                </p>
            </div>
            <div class="col-4">
                <h5>Total Pembayaran</h5>
                <p>
                    <?= 'IDR ' . number_format("" . $subtotal . "", 0, ",", "."); ?>
                </p>
            </div>
            <div class="col-4 py-2">
                <a <?= ($disabled) ? '' : 'href="' . base_url('Keranjang/checkout') . '"'; ?> class="btn" onclick="return confirm('Apakah produk sudah benar?')">Checkout Sekarang</a>

            </div>
        </div>
    </div>
</footer>