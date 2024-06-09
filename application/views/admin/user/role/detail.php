<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tabel Daftar <?= $role['title']; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('Admin'); ?>">Home</a></li>
                <li class="breadcrumb-item">Tabel</li>
                <li class="breadcrumb-item"><a href="<?= base_url('Role'); ?>">Role</a></li>
                <li class="breadcrumb-item active"><?= $role['title']; ?></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="<?= base_url('Role'); ?>"><button type="button" class="btn btn-warning mt-4"><i class="bi bi-arrow-return-left me-1"></i> Kembali ke Daftar</button></a>
                            </div>
                            <div class="col-lg-6 text-end">
                                <a href="<?= base_url('Role/edit/' . $role['slug']); ?>" class="btn btn-secondary mt-4"><i class="bi bi-collection me-1"></i> Edit Role</a>
                                <a href="<?= base_url('Role/delete/' . $role['slug']); ?>" class="btn btn-danger mt-4 tombol-hapus"><i class="bi bi-exclamation-octagon me-1"></i> Hapus Role</a>
                            </div>
                        </div>

                        <h5 class="card-title">Daftar Akses <?= $role['title']; ?></h5>
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
                                    <th scope="col" class="text-center">Akses</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>

                                <?php foreach ($submenus as $submenu) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $submenu['title']; ?></td>

                                        <td class="text-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $submenu['id']); ?> data-role="<?= $role['id']; ?>" data-slug="<?= $role['slug']; ?>" data-submenu="<?= $submenu['id']; ?>" />
                                            </div>
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