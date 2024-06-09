<main id="main" class="main">

    <?php (isset($parent)) ? $parent = $parent : $parent = ''; ?>
    <div class="pagetitle">
        <h1>Tabel Daftar <?= ($parent) ? $parent['title'] : 'Kategori'; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('Admin'); ?>">Home</a></li>
                <li class="breadcrumb-item">Tabel</li>
                <?php if ($parent) : ?>
                    <li class="breadcrumb-item"><a href="<?= base_url('Kategori'); ?>">Kategori</a></li>
                    <li class="breadcrumb-item active"><?= $parent['title']; ?></li>
                <?php else : ?>
                    <li class="breadcrumb-item active">Kategori</li>
                <?php endif; ?>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body">
                        <?php if ($parent) : ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="<?= base_url('Kategori/add/' . $parent['slug']); ?>"><button type="button" class="btn btn-primary mt-4"><i class="bi bi-folder me-1"></i> Tambah Data Sub Kategori</button></a>
                                </div>
                                <div class="col-lg-6 text-end">
                                    <a href="<?= base_url('Kategori/edit/' . $parent['slug']); ?>" class="btn btn-secondary mt-4"><i class="bi bi-collection me-1"></i> Edit Data</a>
                                    <a href="<?= base_url('Kategori/delete/' . $parent['slug']); ?>" class="btn btn-danger mt-4 tombol-hapus"><i class="bi bi-exclamation-octagon me-1"></i> Hapus</a>
                                </div>
                            </div>

                        <?php else : ?>
                            <a href="<?= base_url('Kategori/add'); ?>"><button type="button" class="btn btn-primary mt-4"><i class="bi bi-folder me-1"></i> Tambah Data Kategori</button></a>
                        <?php endif; ?>

                        <h5 class="card-title">Daftar Kategori <?= ($parent) ? $parent['title'] : ''; ?></h5>
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
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php if (empty($categories)) : ?>
                                    <tr>
                                        <td>0</td>
                                        <td>
                                            Tidak ada data kategori MagetiArt yang bisa ditampilkan.
                                        </td>
                                    </tr>
                                <?php endif; ?>

                                <?php foreach ($categories as $category) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $category['title']; ?></td>
                                        <!-- <td><?= $category['link']; ?></td> -->
                                        <td class="text-center">
                                            <?php if ($parent) : ?>
                                                <a href="<?= base_url('Kategori/detail/' . $category['slug']); ?>" class="badge bg-info">
                                                    <i class="bi bi-info-circle me-1"></i> Lihat detail
                                                </a>
                                            <?php else : ?>
                                                <a href="<?= base_url('Kategori/sub_index/' . $category['slug']); ?>" class="badge bg-info">
                                                    <i class="bi bi-info-circle me-1"></i> Lihat sub
                                                </a>
                                            <?php endif; ?>

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