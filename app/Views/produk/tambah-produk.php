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

    <div class="col-lg-12">

        <!-- Default Card Example -->
        <div class="card mb-4">
            <div class="card-header">
                <b>Form Tambah</b>
            </div>
            <div class="card-body">
                <form action="<?= site_url('tambah-produk'); ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="kodeProduk" class="font-weight-bold">Kode Produk</label>
                                <input type="text" class="form-control" id="kodeProduk" placeholder="Masukan Kode Produk" autocomplete="off" value="<?= $kodeProduk; ?>" readonly name="kodeProduk">
                            </div>
                            <div class="form-group">
                                <label for="namaProduk" class="font-weight-bold">Nama Produk</label>
                                <input type="text" class="form-control <?= session()->has('errors') && array_key_exists('namaProduk', session('errors')) ? 'is-invalid' : null ?>" id="namaProduk" placeholder="Masukan Nama Produk" autocomplete="off" name="namaProduk" value="<?= old('namaProduk'); ?>">
                                <?php if (session()->has('errors') && array_key_exists('namaProduk', session('errors'))) : ?>
                                    <div class="mx-1 invalid-feedback">
                                        <p style="font-size: 1rem;">
                                            <?= session('errors')['namaProduk']; ?>
                                        </p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="hargaBeli">Harga Beli</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="text" class="form-control money <?= session()->has('errors') && array_key_exists('hargaBeli', session('errors')) ? 'is-invalid' : null ?>" id="hargaBeli" autocomplete="off" placeholder="Masukan Harga Beli" name="hargaBeli" value="<?= old('hargaBeli'); ?>">
                                    <?php if (session()->has('errors') && array_key_exists('hargaBeli', session('errors'))) : ?>
                                        <div class="mx-1 invalid-feedback">
                                            <p style="font-size: 1rem;">
                                                <?= session('errors')['hargaBeli']; ?>
                                            </p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label for="hargaJual">Harga Jual</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="text" class="form-control money <?= session()->has('errors') && array_key_exists('hargaJual', session('errors')) ? 'is-invalid' : null ?>" id="hargaJual" autocomplete="off" placeholder="Masukan Harga Jual" name="hargaJual" value="<?= old('hargaJual'); ?>">
                                    <?php if (session()->has('errors') && array_key_exists('hargaJual', session('errors'))) : ?>
                                        <div class="mx-1 invalid-feedback">
                                            <p style="font-size: 1rem;">
                                                <?= session('errors')['hargaJual']; ?>
                                            </p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="stok" class="font-weight-bold">Stok</label>
                                <input type="text" class="form-control money <?= session()->has('errors') && array_key_exists('stok', session('errors')) ? 'is-invalid' : null ?>" id="stok" autocomplete="off" placeholder="Masukan Stok Produk" name="stok" value="<?= old('stok'); ?>">
                                <?php if (session()->has('errors') && array_key_exists('stok', session('errors'))) : ?>
                                    <div class="mx-1 invalid-feedback">
                                        <p style="font-size: 1rem;">
                                            <?= session('errors')['stok']; ?>
                                        </p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label class="mr-sm-2 font-weight-bold" for="satuan">Satuan</label>
                                <select class="custom-select mr-sm-2 <?= session()->has('errors') && array_key_exists('satuan', session('errors')) ? 'is-invalid' : null ?>" id="satuan" name="satuan">
                                    <option value="">--Pilih--</option>
                                    <?php foreach ($listSatuan as $value) : ?>
                                        <option value="<?= $value['id_satuan'] ?>" <?= ($value['id_satuan'] == old('satuan')) ? 'selected' : '' ?>><?= $value['nama_satuan']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (session()->has('errors') && array_key_exists('satuan', session('errors'))) : ?>
                                    <div class="mx-1 invalid-feedback">
                                        <p style="font-size: 1rem;">
                                            <?= session('errors')['satuan']; ?>
                                        </p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label class="mr-sm-2 font-weight-bold" for="kategori">Kategori</label>
                                <select class="custom-select mr-sm-2 <?= session()->has('errors') && array_key_exists('kategori', session('errors')) ? 'is-invalid' : null ?>" id="kategori" name="kategori">
                                    <option value="">--Pilih--</option>
                                    <?php foreach ($listKategori as $value) : ?>
                                        <option value="<?= $value['id_kategori'] ?>" <?= ($value['id_kategori'] == old('kategori')) ? 'selected' : '' ?>> <?= $value['nama_kategori']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (session()->has('errors') && array_key_exists('kategori', session('errors'))) : ?>
                                    <div class="mx-1 invalid-feedback">
                                        <p style="font-size: 1rem;">
                                            <?= session('errors')['kategori']; ?>
                                        </p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mx-2">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

    </div>


</div>


<?= $this->endSection(); ?>