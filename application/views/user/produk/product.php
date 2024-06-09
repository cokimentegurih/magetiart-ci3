<!-- Main start -->
<main class="main" id="main">
    <div class="row mt-5">
        <div class="col">
            <div class="row">

                <?php if (empty($products)) : ?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data kosong!</h5>
                            <p class="card-text">Tidak ada data yang bisa ditampilkan.</p>
                        </div>
                    </div>
                <?php endif; ?>

                <?php foreach ($products as $product) : ?>
                    <div class="col-md-4 col-sm-6 mt-3">
                        <?php if ($title == 'Daftar Seniman - MagetiArt') : ?>
                            <a href="<?= base_url('Detail/seniman/' . $product['email']); ?>" style="text-decoration: none; ">
                                <div class="card mb-3">
                                    <div class="image" style=" overflow-y: hidden;">
                                        <img src="<?= base_url('public'); ?>/img/admin/seniman/<?= $product['cover']; ?>" class="card-img-top" alt="<?= $product['name']; ?>">
                                    </div>
                                    <div class="card-body  py-2">
                                        <div class="row align-items-center">
                                            <div class="col-5 col-md-3 col-lg-4 d-flex justify-content-center">
                                                <div class="rounded-circle overflow-hidden profile">
                                                    <img src="<?= base_url('public/img/admin/seniman/' . $product['image']); ?>" class="img-fluid">
                                                </div>

                                            </div>
                                            <div class="col-7 col-md-9 col-lg-8 mx-0">
                                                <h5 class="card-title" style="font-weight: 700;">
                                                    <?= (strlen($product['name']) < 15) ? $product['name'] : substr($product['name'], 0, 15) . '...'; ?>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php else : ?>
                            <a style="color: black;" href="<?= $product['link']; ?>" target="_blank">
                                <div class="card mb-3">
                                    <div class="image" style=" overflow-y: hidden;">
                                        <img src="<?= base_url('public'); ?>/img/admin/berita/<?= $product['image']; ?>" class="card-img-top" alt="<?= $product['title']; ?>">
                                    </div>
                                    <div class="card-body text-center py-2">
                                        <h5 class="card-title">
                                            <?= (strlen($product['title']) < 50) ? $product['title'] : substr($product['title'], 0, 50) . '...'; ?>

                                        </h5>
                                    </div>
                                </div>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach ?>

            </div>
        </div>
    </div>

</main>
<!-- Hero end -->