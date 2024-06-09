<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Data <?= $decoration['type']; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('Admin'); ?>/admin">Home</a></li>
                <li class="breadcrumb-item">Tabel</li>
                <li class="breadcrumb-item"><a href="<?= base_url('Dekorasi'); ?>">Dekorasi</a></li>
                <li class="breadcrumb-item active">Edit Data <?= $decoration['type']; ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body">
                        <a href="<?= base_url('Dekorasi'); ?>"><button type="button" class="btn btn-warning mt-4"><i class="bi bi-arrow-return-left"></i> Kembali ke Daftar</button></a>

                        <h5 class="card-title">Edit Data <?= $decoration['title']; ?></h5>

                        <!-- Horizontal Form -->
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id" value="<?= $decoration['id']; ?>">

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
                                    <?php if (empty($tables)) : ?>
                                        <tr>
                                            <td>0</td>
                                            <td>
                                                Tidak ada data MagetiArt yang bisa ditampilkan.
                                            </td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php foreach ($tables as $table) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <?php if ($decoration['type'] == 'seniman') : ?>
                                                <?php
                                                $title = 'name';
                                                $slug = 'email';
                                                ?>
                                            <?php else : ?>
                                                <?php
                                                $title = 'title';
                                                $slug = 'slug';
                                                ?>
                                            <?php endif; ?>
                                            <td><?= $table[$title]; ?></td>
                                            <td>
                                                <img src="<?= base_url('public'); ?>/img/admin/<?= $decoration['type']; ?>/<?= $table['image']; ?>" class="img-thumbnail" alt="img" style="width: 3rem; height: 3rem;">
                                            </td>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="slug" id="slug" value="<?= $table[$slug]; ?>" <?= ($decoration['slug'] == $table[$slug]) ? 'checked' : ''; ?> <?= set_checkbox('slug', $table[$slug], false); ?> />
                                                    <label class="form-check-label" for="slug">
                                                        <?= (strlen($table[$title]) < 10) ? $table[$title] : substr($table[$title], 0, 10) . '...'; ?>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $i++ ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- End Table with hoverable rows -->

                            <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="row mb-3 text-center">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                        </div>
                    </div>

                    </form><!-- End Horizontal Form -->

                </div>
            </div>

        </div>
        </div>
    </section>

</main><!-- End #main -->