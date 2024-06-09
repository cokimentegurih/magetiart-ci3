<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tabel Role User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('Admin'); ?>">Home</a></li>
                <li class="breadcrumb-item">User</li>
                <li class="breadcrumb-item active">Role</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body">

                        <a href="<?= base_url('Role/add'); ?>"><button type="button" class="btn btn-primary mt-4"><i class="bi bi-folder me-1"></i> Tambah Data Role</button></a>

                        <h5 class="card-title">Daftar Role User</h5>
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
                                <?php if (empty($roles)) : ?>
                                    <tr>
                                        <td>0</td>
                                        <td>
                                            Tidak ada data akun user yang bisa ditampilkan.
                                        </td>
                                    </tr>
                                <?php endif; ?>

                                <?php foreach ($roles as $role) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $role['title']; ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('Role/detail/' . $role['slug']); ?>" class="badge bg-info">
                                                <i class="bi bi-info-circle me-1"></i> Lihat akses
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