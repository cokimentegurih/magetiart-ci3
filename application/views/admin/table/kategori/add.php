<main id="main" class="main">

    <?php (isset($parent)) ? $parent = $parent : $parent = ''; ?>
    <div class="pagetitle">
        <h1>Tambah Data <?= ($parent) ? $parent['title'] : 'Kategori MagetiArt'; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('Admin'); ?>">Home</a></li>
                <li class="breadcrumb-item">Tabel</li>
                <?php if ($parent) : ?>
                    <li class="breadcrumb-item"><a href="<?= base_url('Kategori'); ?>">Kategori</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('Kategori/sub_index/' . $parent['slug']); ?>"><?= $parent['title']; ?></a></li>
                <?php else : ?>
                    <li class="breadcrumb-item"><a href="<?= base_url('Kategori'); ?>">Kategori</a></li>
                <?php endif; ?>
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
                            <?php if ($parent) : ?>
                                <div class="row mb-3">
                                    <label for="parent" class="col-sm-2 col-form-label">Dari</label>
                                    <div class="col-sm-9">
                                        <select id="parent" name="parent" class="form-select" aria-label="Default select example">
                                            <option value="<?= $parent['id']; ?>"><?= $parent['title']; ?></option>
                                        </select>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Judul <?= ($parent) ? 'Sub' : ''; ?> Kategori</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?= (form_error('title')) ? 'is-invalid' : ''; ?>" id="title" name="title" value="<?= set_value('title'); ?>" autofocus>
                                    <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>


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