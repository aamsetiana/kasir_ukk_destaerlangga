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
    <div class="col-lg-5 mx-3 mt-3"><?php if (session('success')) : ?>
            <?= session('success') ?>
        <?php endif; ?></div>
</div>

<div class="row p-3">
    <div class="col-lg-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <p></p>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div>
                        <a href="<?= site_url('pdf-stok'); ?>" class="btn btn-danger">Download PDF<i class="fas fa-file-pdf mx-2"></i></a>
                    </div>
                </div>
                <table id="myTable" class="display table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width: 3%;">No</th>
                            <th>Nama Produk</th>
                            <th>Harga Jual</th>
                            <th>Stok</th>
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
                                    <td><?= $p['nama_produk']; ?></td>
                                    <td><?= $p['harga_jual']; ?></td>
                                    <td style="background-color: <?= $p['stok'] == 0 ? '#ffcccc' : 'transparent'; ?>"><?= $p['stok']; ?></td>
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