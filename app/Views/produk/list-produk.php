<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>

<!-- Page Heading -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"><?= $judulHalaman; ?></h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="row">
    <div class="mx-4">
        <a href="<?= site_url('tambah-produk'); ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Data Produk</a>
    </div>
</div>

<div class="row">
    <div class="col-lg-5 mx-3 mt-4"><?php if (session('success')) : ?>
            <?= session('success') ?>
        <?php endif; ?></div>
</div>

<div class="row p-3">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <p></p>
            </div>
            <div class="card-body">
                <table id="myTable" class="display table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Satuan</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($listProduk)) {
                            $no = null;
                            foreach ($listProduk as $p) {
                                $no++;
                        ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $p['kode_produk']; ?></td>
                                    <td><?= $p['nama_produk']; ?></td>
                                    <td><?= $p['harga_beli']; ?></td>
                                    <td><?= $p['harga_jual']; ?></td>
                                    <td><?= $p['nama_satuan']; ?></td>
                                    <td><?= $p['nama_kategori']; ?></td>
                                    <td><?= $p['stok']; ?></td>
                                    <td>
                                        <a href=<?= site_url('/edit-produk/' . $p['id_produk']); ?> class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                        <form action="<?= site_url('hapus-produk/') . $p['id_produk']; ?>" method="post" class="d-inline-block">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="far fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>


<?= $this->endSection(); ?>