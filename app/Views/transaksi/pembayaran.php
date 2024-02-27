<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>

<!-- Page Heading -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= $judulHalaman; ?></h1>
                <h1>Selamat datang</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>


<div class="row p-3">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                Pembayaran
            </div>
            <div class="card-body">
                <form id="formPembayaran">
                    <div class="form-group">
                        <label for="bayar">Total</label>
                        <input type="text" name="totalHarga" class="form-control" id="jumlahPembayaran" placeholder="Total Harga">
                    </div>
                    <div class="form-group">
                        <label for="bayar">Bayar</label>
                        <input type="text" name="jumlahBayar" class="form-control" id="jumlahPembayaran" placeholder="Jumlah Bayar">
                    </div>
                    <div class="form-group">
                        <label for="kembali">Kembali</label>
                        <input type="text" name="jumlahBayar" class="form-control" id="kembali" placeholder="Kembali" readonly>
                    </div>
                    <button type="button" class="btn btn-success" onclick="prosesPembayaran()">Pembayaran</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>