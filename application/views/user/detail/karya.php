<!-- ======= Header ======= -->
<header id="header" class="header fixed-top ps-0 d-flex" style="height: fit-content;">
    <div class="container-fluid px-0">
        <div class="w-100">
            <img src="<?= base_url('public/img/template/nav-bg.jpg'); ?>" class="w-100" style="height: 5vh;">
        </div>
        <div class="row align-items-center">
            <div class="col-4 col-md-2 py-2 py-sm-3 py-md-4 text-center">
                <a href="<?= base_url('Produk'); ?>">
                    <img src="<?= base_url('public/img/template/back-arrow-red.svg'); ?>" class="img-fluid">
                </a>
            </div>
        </div>
    </div>

</header><!-- End Header -->

<main class="px-5">
    <!-- Karya start -->
    <section class="karya" id="karya" style="margin-top: 8rem;">
        <div class="container">
            <div class="card shadow-none mb-3">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="row ">
                            <div class="col">
                                <img src="<?= base_url('public/img/admin/karya/' . $art['image']); ?>" class="img-fluid" alt="<?= $art['title']; ?>" />
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-6 col-xl-4">
                                <div class="w-100 h-100 p-3 text-end" style="background-image: url(<?= base_url('public/img/user/produk/frame-wall.jpg'); ?>); background-repeat: no-repeat; background-size: cover;">
                                    <img src="<?= base_url('public/img/admin/karya/' . $art['image']); ?>" class=" border-0 bg-transparent w-50" />
                                </div>
                            </div>
                            <div class="col-6 col-xl-4">
                                <div class="w-100 h-100 p-2 text-end" style="background-image: url(<?= base_url('public/img/user/produk/frame-full.png'); ?>); background-repeat: no-repeat; background-size: cover; background-position: center;">
                                    <img src="<?= base_url('public/img/admin/karya/' . $art['image']); ?>" class=" border-0 bg-transparent w-75" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-deskripsi">
                        <div class="card-body">
                            <h5 class="card-title fs-1"><?= $art['title']; ?></h5>
                            <p class="card-text">
                                Seniman: <span><?= $art['name']; ?></span> <br />
                                Tahun: <?= $art['year']; ?> <br />
                                Material: <?= $art['material']; ?> <br />
                                Ukuran: <?= $art['width']; ?> x <?= $art['height']; ?> cm <br />
                                Jumlah: <?= ($art['quantity'] > 0) ? $art['quantity'] : 'Sold Out'; ?>
                            </p>
                            <p class="price fs-4"><?= $art['price']; ?></p>
                            <div class="row row-button">
                                <div class="col-sm-7 col-md-12 col-lg-7 col-xxl-6 mb-3 px-xs-0">
                                    <form action="<?= base_url('Keranjang/update'); ?>" method="post">
                                        <input type="hidden" id="product_id" name="product_id" value="<?= $art['id']; ?>">
                                        <button <?= ($art['quantity'] <= 0) ? 'disabled' : ''; ?> type="submit" name="add" value="1" class="btn btn-keranjang" onclick="return confirm('Produk akan ditambahkan ke keranjang?')" style="background-color: transparent;">
                                            <img src="<?= base_url('public/img/template/shopping-cart.svg'); ?>">
                                            Masukkan Keranjang</button>
                                </div>
                                </form>

                                <div class="col-sm-5 col-md-12 col-lg-5 col-xxl-6 mb-3"><a <?= ($art['quantity'] > 0) ? 'href="' . base_url('Detail/checkout/' . $art['slug']) . '"' : ''; ?> class="btn btn-beli">Beli Sekarang</a></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Karya end -->

    <!-- Deskripsi start -->
    <section class="deskripsi pt-5" id="deskripsi">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="mb-3">Deskripsi</h2>
                    <p style="text-align: justify;">
                        <?= $art['description']; ?>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Deskripsi end -->

    <!-- Koleksi start -->
    <section class="koleksi pt-5" id="koleksi">
        <div class="container">
            <div class="row ">
                <div class="col">
                    <h2 class="mb-3">Koleksi</h2>
                </div>
            </div>
            <div class="row">
                <?php foreach ($collections as $collection) : ?>
                    <div class="col-md-4 col-sm-6 mt-3">
                        <a href="<?= base_url('Detail/karya/' . $collection['slug']); ?>" style="text-decoration: none;">
                            <div class="card mb-3">
                                <div style="max-height: 45vh; overflow-y: hidden;">
                                    <img src="<?= base_url('public'); ?>/img/admin/karya/<?= $collection['image']; ?>" class="card-img-top" alt="<?= $collection['title']; ?>">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title pb-1"><?= $collection['title']; ?></h5>
                                    <p class="card-text mb-0"><?= $collection['material']; ?></p>
                                    <div class="row">
                                        <div class="col-10">
                                            <p class="card-text fs-5 price"><?= $collection['price']; ?></p>
                                        </div>
                                        <div class="col-2 text-end">
                                            <form method="post">
                                                <input type="hidden" id="product_id" name="product_id" value="<?= $collection['id']; ?>">
                                                <button type="submit" name="tambah" onclick="return confirm('Produk akan ditambahkan ke keranjang?')" class="border-0" style="background-color: transparent;">
                                                    <img src="<?= base_url('public/img/template/shopping-cart.svg'); ?>">
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>
</main>

<!-- Koleksi end -->