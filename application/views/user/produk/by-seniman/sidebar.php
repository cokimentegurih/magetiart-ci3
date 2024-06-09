<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <div class="row mt-5">
            <div class="col">
                <div class="card">
                    <div class="card-body pb-2">
                        <h5 class="card-title">Seniman</h5>
                        <ul class="list-group">
                            <?php foreach ($artists as $a) : ?>
                                <li class="list-group-item border-0 my-2">
                                    <a class="me-2" href="<?= base_url('Produk/bySeniman/' . $a['email']); ?>">
                                        <?php if ($artist['id'] == $a['id']) : ?>
                                            <img src="<?= base_url('public/img/template/checked.svg'); ?>">
                                        <?php else : ?>
                                            <img src="<?= base_url('public/img/template/check.svg'); ?>">
                                        <?php endif; ?>



                                    </a>
                                    <label class="form-check-label" for="catCheck"><?= $a['name']; ?></label>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>



            </div>
        </div>
    </ul>
</aside>
<!-- End Sidebar-->