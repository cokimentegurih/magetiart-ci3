<!-- ======= Header ======= -->
<header id="header" class="header fixed-top ps-0" style="height: fit-content;">
    <div class="container-fluid">
        <div class="row  align-items-center">
            <div class="col-2 py-2 py-sm-3 py-md-4  text-center">
                <a href="<?= base_url('Home'); ?>">
                    <img src="<?= base_url('public/img/template/back-arrow-red.svg'); ?>" class="img-fluid">
                </a>
            </div>
            <div class="col-8 py-2 py-sm-3 py-md-4 d-flex align-items-center" style="border-bottom: 0.8vh solid #C24332;">
                <div style="width: 15%;">
                    <img src="<?= base_url('public/img/template/navbar-logo.png'); ?>" class="img-fluid me-3">
                </div>
                <h5 class="fs-lg-4 ">Notifikasi</h5>
            </div>
        </div>
    </div>

</header><!-- End Header -->

<div class="container">
    <div class="row" style="padding: 20vh 10vw;">
        <div class="col">
            <!-- Card with an image on left -->
            <?php if (!isset($notifs)) : ?>
                <div class="card mb-3">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="row py-3 g-0 justify-content-center align-items-center">
                        <div class="col-md-2">
                            <img src="<?= base_url('public/img/template/no-notif.png'); ?>" class="img-fluid rounded-start">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h5 class="card-title">Tidak ada pesan!</h5>
                                <p class="card-text">Anda tidak menerima pesan notifikasi dari MagetiArt.</p>
                                <p class="card-text"><small class="text-body-secondary"><?= date('m/d/Y h:i:s a', time()); ?></small></p>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <a type="button" class="btn-close"></a>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="row my-3 py-2 justify-content-end border-bottom">
                    <div class="col-4 text-end">
                        <a href="<?= base_url('Home/deleteNotif'); ?>">Tandai semua sudah dibaca</a>
                    </div>
                </div>
                <?php foreach ($notifs as $notif) : ?>
                    <div class="card mb-3">
                        <div class="row py-3 g-0 justify-content-center align-items-center">
                            <div class="col-md-2">
                                <img src="<?= base_url('public/img/template/' . $notif['image']); ?>" class="img-fluid rounded-start">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $notif['title']; ?></h5>
                                    <p class="card-text"><?= $notif['text']; ?></p>
                                    <p class="card-text"><small class="text-body-secondary"><?= $notif['date']; ?></small></p>
                                </div>
                            </div>
                            <!-- <div class="col-md-1">
                                <a href="<?= base_url('Home/deleteKey/' . array_keys($notifs)); ?>" type="button" class="btn-close"></a>
                            </div> -->
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div><!-- End Card with an image on left -->
    </div>
</div>
</div>