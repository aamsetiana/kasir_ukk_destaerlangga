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
                <form action="<?= site_url('tambah-pelanggan'); ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label for="namaLengkap" class="font-weight-bold">Nama Lengkap</label>
                                <input type="text" class="form-control <?= session()->has('errors') && array_key_exists('nama_lengkap', session('errors')) ? 'is-invalid' : null ?>" id="namaLengkap" placeholder="Masukan Nama Lengkap" autocomplete="off" name="nama_lengkap" value="<?=old('nama_lengkap');?>">
                                <?php if (session()->has('errors') && array_key_exists('nama_lengkap', session('errors'))) : ?>
                                    <div class="mx-1 invalid-feedback">
                                        <p style="font-size: 1rem;">
                                            <?= session('errors')['nama_lengkap']; ?>
                                        </p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="alamat" class="font-weight-bold">Alamat</label>
                                <input type="text" class="form-control <?= session()->has('errors') && array_key_exists('alamat', session('errors')) ? 'is-invalid' : null ?>" id="alamat" placeholder="Masukan Alamat" autocomplete="off" name="alamat" value="<?=old('alamat');?>">
                                <?php if (session()->has('errors') && array_key_exists('alamat', session('errors'))) : ?>
                                    <div class="mx-1 invalid-feedback">
                                        <p style="font-size: 1rem;">
                                            <?= session('errors')['alamat']; ?>
                                        </p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="no_telp" class="font-weight-bold">Nomor Telepon</label>
                                <input type="text" class="form-control <?= session()->has('errors') && array_key_exists('no_telp', session('errors')) ? 'is-invalid' : null ?>" id="no_telp" placeholder="Masukan Nomor Telepon" autocomplete="off" name="no_telp" value="<?=old('no_telp');?>">
                                <?php if (session()->has('errors') && array_key_exists('no_telp', session('errors'))) : ?>
                                    <div class="mx-1 invalid-feedback">
                                        <p style="font-size: 1rem;">
                                            <?= session('errors')['no_telp']; ?>
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