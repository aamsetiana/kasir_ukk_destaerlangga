<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>

<!-- Page Heading -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0"><?= $judulHalaman; ?></h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="row p-3">
    <div class="col-lg-12">
        <p class="font-weight-bold">Jenis Laporan : <span class="font-weight-normal"><?= $jenis_laporan == 'bulanan' ? 'Bulanan' : 'Tahunan' ?></span></p>
        <p class="font-weight-bold">Bulan : <span class="font-weight-normal"><?= ($bulan == '' ? '' : $bulan); ?></span></p>
        <p class="font-weight-bold">Tahun: <span class="font-weight-normal"><?= $tahun ?></span></p>
    </div>
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
                            <th>Nama Produk</th>
                            <th>Jumlah</th>
                            <th>Harga Jual</th>
                            <th>Harga Beli</th>
                            <th>Total Harga</th>
                            <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($detail_penjualan as $row) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['nama_produk'] ?></td>
                                <td><?= $row['qty'] ?></td>
                                <td><?= $row['harga_jual'] ?></td>
                                <td><?= $row['harga_beli'] ?></td>
                                <td><?= $row['total_harga'] ?></td>
                                <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
                            </tr>
                        <?php endforeach; ?>
                    <tfoot>
                        <tr>
                            <td colspan="5">Total Penjualan:</td>
                            <td><?= $total_penjualan ?></td>
                        </tr>
                        <tr>
                            <td colspan="5">Total Keuntungan:</td>
                            <td><?= $total_keuntungan ?></td>
                        </tr>
                    </tfoot>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>



<?= $this->endSection(); ?>