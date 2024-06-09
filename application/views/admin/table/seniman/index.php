<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tabel Daftar Seniman</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('Admin'); ?>">Home</a></li>
                <li class="breadcrumb-item">Tabel</li>
                <li class="breadcrumb-item active">Seniman</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body">

                        <a href="<?= base_url('Seniman/add'); ?>"><button type="button" class="btn btn-primary mt-4"><i class="bi bi-folder me-1"></i> Tambah Data Seniman</button></a>

                        <h5 class="card-title">Daftar Seniman MagetiArt</h5>
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
                                    <th scope="col">Nama</th>
                                    <th scope="col" class="hidden">Asal</th>
                                    <th scope="col">Foto</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php if (empty($artists)) : ?>
                                    <tr>
                                        <td>0</td>
                                        <td>
                                            Tidak ada data seniman MagetiArt yang bisa ditampilkan.
                                        </td>
                                    </tr>
                                <?php endif; ?>

                                <?php foreach ($artists as $artist) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $artist['name']; ?></td>
                                        <td class="d-none d-sm-table-cell"><?= $artist['place']; ?></td>
                                        <td>
                                            <img src="<?= base_url('public'); ?>/img/admin/seniman/<?= $artist['image']; ?>" class="rounded-circle" alt="img" style="width: 3rem; height: 3rem;">
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= base_url('Seniman/detail/' . $artist['email']); ?>" class="badge bg-info">
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