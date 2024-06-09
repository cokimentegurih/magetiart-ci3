<?php
$cats = array();
$subcat = array();
foreach ($categories as $category) {
    if (empty($category['parent_id'])) {
        $cats[$category['id']][] = $category['title'];
    } else {
        $subcat[$category['parent_id']][$category['slug']][] = $category['title'];
    }
}
?>


<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <div class="row mt-5">
            <div class="col">
                <div class="card">
                    <div class="card-body pb-0">
                        <h5 class="card-title"><a href="<?= base_url('Produk'); ?>">Produk</a></h5>
                        <form action="" method="post" class="d-flex mb-3" role="search">

                            <input class="form-control me-2" type="search" placeholder="Cari" aria-label="Search" name="keyword">
                            <button class="btn btn-outline-danger" type="submit"><i class="bi bi-search p-1"></i></button>
                        </form>
                    </div>
                </div>

                <?php foreach ($cats as $cat => $value) { ?>
                    <div class="card">
                        <div class="card-body pb-2">
                            <h5 class="card-title"><?= $value[0]; ?></h5>
                            <ul class="list-group">
                                <?php
                                if (isset($subcat[$cat])) {
                                    foreach ($subcat[$cat] as $sub => $value) { ?>
                                        <li class="list-group-item border-0 my-2">
                                            <a class="me-2" href="<?= base_url('Produk/category/' . $sub); ?>"><?php if (isset($subcategory)) {
                                                                                                                    if ($sub == $subcategory) { ?>
                                                        <img src="<?= base_url('public/img/template/checked.svg'); ?>">

                                                    <?php } else { ?>
                                                        <img src="<?= base_url('public/img/template/check.svg'); ?>">

                                                    <?php }
                                                                                                                } else { ?>
                                                    <img src="<?= base_url('public/img/template/check.svg'); ?>">

                                                <?php }
                                                ?></a>
                                            <label class="form-check-label" for="catCheck"><?= $value[0]; ?></label>
                                        </li>
                                <?php }
                                } ?>
                            </ul>
                        </div>
                    </div>


                <?php
                } ?>

                <div class="card">
                    <div class="card-body pb-0">
                        <h5 class="card-title"><a href="<?= base_url('Produk/seniman'); ?>">Seniman</a></h5>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body pb-0">
                        <h5 class="card-title"><a href="<?= base_url('Produk/berita'); ?>">Berita dan Event</a></h5>
                    </div>
                </div>

            </div>
        </div>
    </ul>
</aside>
<!-- End Sidebar-->