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
                <form action="<?= site_url('laporan-penjualan'); ?>" method="post">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label for="namaSatuan" class="font-weight-bold">Penjualan Berdasarkan Bulan</label>
                                <select name="bulan" id="bulan" class="form-control">
                                    <option value="" selected>--pilih bulan--</option>
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="namaSatuan" class="font-weight-bold">Penjualan Berdasarkan Tahun</label>
                                <input type="number" name="tahun" id="tahun" min="2022" max="2050" value="<?php echo date('Y'); ?>" class="form-control">
                            </div>
                            <div class="form-group">
                            <label for="namaSatuan" class="font-weight-bold">Jenis Laporan</label>
                                <select name="jenis_laporan" id="jenis_laporan" class="form-control">
                                    <option value="bulanan">Bulanan</option>
                                    <option value="tahunan">Tahunan</option>
                                </select>
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