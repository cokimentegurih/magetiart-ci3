<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Data <?= $role['title']; ?></h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('Admin'); ?>">Home</a></li>
                <li class="breadcrumb-item">User</li>
                <li class="breadcrumb-item"><a href="<?= base_url('Role'); ?>">Role</a></li>
                <li class="breadcrumb-item active">Edit Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Data <?= $role['title']; ?></h5>

                        <!-- Horizontal Form -->
                        <form action="" method="post">
                            <input type="hidden" id="id" name="id" value="<?= $role['id']; ?>">
                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?= (form_error('title')) ? 'is-invalid' : ''; ?>" id="title" name="title" value=" <?= (set_value('title')) ? set_value('title') : $role['title']; ?>">
                                    <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form><!-- End Horizontal Form -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->