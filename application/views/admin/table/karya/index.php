<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tabel Daftar Karya</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('Admin'); ?>">Home</a></li>
                <li class="breadcrumb-item">Tabel</li>
                <li class="breadcrumb-item active">Karya</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body">

                        <a href="<?= base_url('Karya/add'); ?>"><button type="button" class="btn btn-primary mt-4"><i class="bi bi-folder me-1"></i> Tambah Data Karya</button></a>

                        <h5 class="card-title">Daftar Karya MagetiArt</h5>
                        <div class="row mt-2">
                            <div class="col">
                                <?= $this->session->flashdata('message'); ?>
                            </div>
                        </div>
                        <!-- Table with hoverable rows -->
                        <table class="table table-hover datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Seniman</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php if (empty($arts)) : ?>
                                    <tr>
                                        <td>0</td>
                                        <td>
                                            Tidak ada data karya MagetiArt yang bisa ditampilkan.
                                        </td>
                                    </tr>
                                <?php endif; ?>

                                <?php foreach ($arts as $art) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $art['title']; ?></td>
                                        <td><?= $art['name']; ?></td>
                                        <td>
                                            <img src="<?= base_url('public'); ?>/img/admin/karya/<?= $art['image']; ?>" class="img-thumbnail" alt="img" style="width: 3rem; height: 3rem;">
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= base_url('Karya/detail/' . $art['slug']); ?>" class="badge bg-info">
                                                <i class="bi bi-info-circle me-1"></i> Detail
                                            </a>

                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- End Table with hoverable rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->