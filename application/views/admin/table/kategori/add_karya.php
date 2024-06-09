<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tambah Data Karya</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('Admin'); ?>">Home</a></li>
                <li class="breadcrumb-item">Tabel</li>
                <li class="breadcrumb-item"><a href="<?= base_url('Kategori'); ?>">Kategori</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('Kategori/sub_index/' . $parent['slug']); ?>"><?= $parent['title']; ?></a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('Kategori/detail/' . $category['slug']); ?>"><?= $category['title']; ?></a></li>
                <li class="breadcrumb-item active">Tambah Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Masukkan Data Baru</h5>

                        <!-- Horizontal Form -->
                        <form action="" method="post">
                            <!-- Table with hoverable rows -->
                            <table class="table table-hover datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col" class="text-center">Checklist</th>
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
                                            <td>
                                                <img src="<?= base_url('public'); ?>/img/admin/karya/<?= $art['image']; ?>" class="img-thumbnail" alt="img" style="width: 3rem; height: 3rem;">
                                            </td>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="art" name="art[]" value="<?= $art['id']; ?>" />
                                                    <label class="form-check-label" for="art">
                                                        <?= (strlen($art['title']) < 10) ? $art['title'] : substr($art['title'], 0, 10) . '...'; ?>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $i++ ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- End Table with hoverable rows -->

                            <?= form_error('art', '<small class="text-danger pl-3">', '</small>'); ?>


                            <div class="text-center">
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form><!-- End Horizontal Form -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->