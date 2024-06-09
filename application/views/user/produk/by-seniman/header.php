<!-- ======= Header ======= -->
<header id="header" class="header fixed-top ps-0 d-flex">
    <div class="container-fluid">
        <div class="row align-items-center" style="background-image: url(<?= base_url('public/img/template/nav-bg.jpg'); ?>); background-repeat: no-repeat; background-size: cover;">
            <div class="col-2 py-2 py-sm-3 py-md-4 text-center">
                <a href="<?= base_url('Detail/seniman/' . $artist['email']); ?>">
                    <img src="<?= base_url('public/img/template/back-arrow.svg'); ?>" class="img-fluid">
                </a>
            </div>
            <div class="col-8 py-2 py-sm-3 py-md-4" style="background-color: #fff;">
                <div class="row">
                    <div class="col-6">
                        <i class="bi bi-list toggle-sidebar-btn"></i>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <a class="navbar-brand" href="<?= base_url('Produk'); ?>"><img src="<?= base_url('public'); ?>/img/template/navbar-logo.png" class="img-fluid" alt="Logo" /></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</header><!-- End Header -->