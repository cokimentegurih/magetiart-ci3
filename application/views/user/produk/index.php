<!-- Main start -->
<main class="main" id="main">
    <div class="row mt-5">
        <div class="col">
            <div class="row">

                <?php if (empty($arts)) : ?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data kosong!</h5>
                            <p class="card-text">Tidak ada karya yang bisa ditampilkan.</p>
                        </div>
                    </div>
                <?php endif; ?>

                <?php foreach ($arts as $art) : ?>
                    <div class="col-md-4 col-sm-6 mt-3">
                        <a href="<?= base_url('Detail/karya/' . $art['slug']); ?>" style="text-decoration: none; ">
                            <div class="card mb-3">
                                <div style="max-height: 30vh; overflow-y: hidden;">
                                    <img src="<?= base_url('public'); ?>/img/admin/karya/<?= $art['image']; ?>" class="card-img-top" alt="<?= $art['title']; ?>">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title pb-1"><?= $art['title']; ?></h5>
                                    <p class="card-text mb-0"><?= $art['material']; ?></p>
                                    <p class="card-text mb-0"><?= ($art['quantity'] > 0) ? 'Jumlah : ' . $art['quantity'] : 'Sold Out'; ?></p>
                                    <div class="row">
                                        <div class="col-10">
                                            <p class="card-text fs-5 price"><?= $art['price']; ?></p>
                                        </div>
                                        <div class="col-2 text-end">
                                            <form action="<?= base_url('Keranjang/update'); ?>" method="post">
                                                <input type="hidden" id="product_id" name="product_id" value="<?= $art['id']; ?>">
                                                <button <?= ($art['quantity'] <= 0) ? 'disabled' : ''; ?> type="submit" name="add" value="1" onclick="return confirm('Produk akan ditambahkan ke keranjang?')" class="border-0" style="background-color: transparent;">
                                                    <img src="<?= base_url('public/img/template/shopping-cart.svg'); ?>">
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                <?php endforeach ?>

            </div>
        </div>
    </div>

</main>
<!-- Hero end -->