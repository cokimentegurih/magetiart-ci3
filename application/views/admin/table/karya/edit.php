<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Data Karya MagetiArt</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('Admin'); ?>/admin">Home</a></li>
                <li class="breadcrumb-item">Tabel</li>
                <li class="breadcrumb-item"><a href="<?= base_url('Karya'); ?>">Karya</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('Karya/detail/' . $art['slug']); ?>">Detail</a></li>
                <li class="breadcrumb-item active">Edit Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body">
                        <a href="<?= base_url('Karya/detail/' . $art['slug']); ?>"><button type="button" class="btn btn-warning mt-4"><i class="bi bi-arrow-return-left"></i> Kembali ke detail</button></a>
                        <h5 class="card-title">Edit Data <?= $art['title']; ?></h5>

                        <!-- Horizontal Form -->
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="oldImage" id="oldImage" value="<?= $art['image']; ?>">
                            <input type="hidden" name="id" id="id" value="<?= $art['id']; ?>">

                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?= (form_error('title')) ? 'is-invalid' : ''; ?>" id="title" name="title" value="<?= (set_value('title')) ? set_value('title') : $art['title']; ?>">
                                    <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="artist" class="col-sm-2 col-form-label">Seniman</label>
                                <div class="col-sm-9">
                                    <select id="artist" name="artist" class="form-select" aria-label="Default select example">
                                        <option value="">Pilih Seniman</option>
                                        <?php foreach ($artists as $artist) : ?>
                                            <option <?= ($art['seniman_id'] == $artist['id']) ? 'selected' : ''; ?> value="<?= $artist['id']; ?>" <?= set_select('artist', $artist['id'], False); ?>><?= $artist['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('artist', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="year" class="col-sm-2 col-form-label">Tahun</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?= (form_error('year')) ? 'is-invalid' : ''; ?>" id="year" name="year" value="<?= (set_value('year')) ? set_value('year') : $art['year']; ?>">
                                    <?= form_error('year', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-sm-2 col-form-label">Deksripsi</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control <?= (form_error('description')) ? 'is-invalid' : ''; ?>" id="description" name="description" placeholder="Tulis deskripsi singkat."><?= (set_value('description')) ? set_value('description') : $art['description']; ?></textarea>
                                    <?= form_error('description', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="material" class="col-sm-2 col-form-label">Material</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?= (form_error('material')) ? 'is-invalid' : ''; ?>" id="material" name="material" value="<?= (set_value('material')) ? set_value('material') : $art['material']; ?>">
                                    <?= form_error('material', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Ukuran (cm)</label>
                                <div class="col-sm-2">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control <?= (form_error('width')) ? 'is-invalid' : ''; ?>" id="width" name="width" placeholder="50" value="<?= (set_value('width')) ? set_value('width') : $art['width']; ?>">
                                        <?= form_error('width', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <label for="width">Panjang</label>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control <?= (form_error('height')) ? 'is-invalid' : ''; ?>" id="height" name="height" placeholder="50" value="<?= (set_value('height')) ? set_value('height') : $art['height']; ?>">
                                        <?= form_error('height', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <label for="height">Lebar</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="quantity" class="col-sm-2 col-form-label">Jumlah</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control <?= (form_error('quantity')) ? 'is-invalid' : ''; ?>" id="quantity" name="quantity" min=0 oninput="validity.valid||(value='');" value="<?= (set_value('quantity')) ? set_value('quantity') : $art['quantity']; ?>">
                                    <?= form_error('quantity', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="price" class="col-sm-2 col-form-label">Harga</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control <?= (form_error('price')) ? 'is-invalid' : ''; ?>" id="price" name="price" value="<?= (set_value('price')) ? set_value('price') : $art['price']; ?>">
                                    <?= form_error('price', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Unggah Gambar</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img src="<?= base_url('public'); ?>/img/admin/karya/<?= $art['image']; ?>" class="img-thumbnail img-preview" alt="Foto karya">
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="file" id="image" name="image" onchange="previewImg()">
                                            <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
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

<script>
    var dengan_rupiah = document.getElementById('price');
    dengan_rupiah.addEventListener('keyup', function(e) {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });

    /* Fungsi */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'IDR ' + rupiah : '');
    }
</script>