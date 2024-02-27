<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= $judulHalaman; ?></h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="row mx-2">

    <div class="col-lg-10">
        <!-- Default Card Example -->
        <div class="card mb-4">
            <div class="card-header">
                Form Tambah
            </div>
            <div class="card-body">
                <form action="<?= site_url('tambah-satuan'); ?>" method="post">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label for="namaSatuan" class="font-weight-bold">Nama Satuan</label>
                                <input type="text" name="satuan" class="form-control <?= session()->has('errors') ? 'is-invalid' : null ?>" id="namaSatuan" placeholder="Masukan Nama Satuan" autocomplete="off">
                                <?php if (session()->has('errors') && session('errors')['satuan']) : ?>
                                    <div class="mx-1 invalid-feedback">
                                        <p style="font-size: 1rem;">
                                            <?= session('errors')['satuan']; ?>
                                        </p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>

    </div>


</div>


<?= $this->endSection(); ?>