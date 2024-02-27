<?= $this->extend('layout/template'); ?>
<?= $this->section('konten'); ?>

<!-- Page Heading -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="d-inline-block"><?= $judulHalaman; ?></h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="row p-3">
    <div class="col-lg-12">
        <a href="" class="btn btn-warning d-inline-block"><i class="fas fa-users"></i><b> Transaksi Member</b></a>
    </div>
</div>

<div class="row p-3">

    <div class="col-lg-7">
        <!-- Default Card Example -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-line"></i> Penjualan Produk
                <div class="row mt-4">
                    <p class="mx-2 font-weight-bold">Tanggal : <span class="font-weight-normal"><?= $tanggal; ?></span></p>
                    <p class="mx-3 font-weight-bold">Waktu : <span class="font-weight-normal"><?= $waktu; ?></span></p>
                    <p class="mx-3 font-weight-bold">Kasir : <span class="font-weight-normal"><?= session()->get('nama_pengguna'); ?></span></p>
                    <p class="mx-3 font-weight-bold">No Faktur : <span class="font-weight-normal"><?= $noFaktur; ?></span></p>
                </div>
            </div>
            <div class="card-body">
                <form action="" method="post" id="formPenjualan">
                    <!-- <input type="hidden" class="form-control" name="id_produk" id="idProduk" autocomplete="off"> -->
                    <input type="hidden" class="form-control" name="no_faktur" id="nomorFaktur" autocomplete="off" value="<?= $noFaktur; ?>">
                    <!-- <input type="hidden" class="form-control" name="hargaProduk" id="hargaProduk" autocomplete="off"> -->
                    <!-- <input type="hidden" class="form-control" name="id_pelanggan" id="idPelanggan" autocomplete="off"> -->
                    <!-- <input type="hidden" class="form-control" name="id_enjualan" id="idPenjualan" autocomplete="off"> -->
                    <!-- <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Pelanggan</label>
                                    <input type="text" class="form-control" placeholder="Masukan Id Pelanggan" autocomplete="off" name="cariPelanggan" id="cariPelanggan">
                                </div> -->
                    <div class="form-group">
                        <label for="produk">Produk</label>
                        <select class="js-example-basic-single form-control" name="id_produk">
                            <option value="">--Cari Produk--</option>
                            <?php if (isset($listProduk)) :
                                foreach ($listProduk as $row) : ?>
                                    <option value="<?= $row['id_produk']; ?>"><?= $row['nama_produk']; ?> | <?= $row['stok']; ?> | <?= number_format($row['harga_jual'], 0, ',', '.'); ?></option>
                            <?php
                                endforeach;
                            endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="text" class="form-control" id="jumlah" placeholder="Masukan jumlah" name="jumlah" autocomplete="off">
                    </div>
                    <!-- <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Produk</label>
                                    <input type="text" class="form-control" placeholder="Masukan Kode Produk" name="cariProduk" id="cariProduk" autocomplete="off">
                                </div> -->
                    <!-- <div class="col-md-4 mb-3">
                                    <label for="validationCustomUsername">Jumlah</label>
                                    <input type="text" class="form-control" name="jumlah" placeholder="Msukan Jumlah" autocomplete="off">
                                </div> -->

                    <button type="submit" class="btn btn-primary mx-1"><i class="fas fa-cart-plus"></i> Simpan</button>
            </div>
            </form>
        </div>
    </div>

    <div class="col-lg-5">
        <h1 style="position:relative;" class="mb-3">Total : Rp.<span id="totalHargaSemuaBarang"></span></h1>
        <div class="card">
            <div class="card-header">
                <i class="fas fa-credit-card"></i> Pembayaran
            </div>
            <div class="card-body">
                <form action="" method="post" id="formPembayaran">
                    <div class="form-group">
                        <label for="bayar">Bayar</label>
                        <input type="text" name="jumlahBayar" class="form-control" id="jumlahPembayaran" placeholder="Jumlah Bayar" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="kembali">Kembali</label>
                        <input type="text" name="kembali" class="form-control" id="kembali" placeholder="Kembali" readonly>
                    </div>
                    <button type="submit" class="btn btn-success" id="btnPembayaran"><i class="ti ti-credit-card-pay"></i> Bayar</button>
                </form>
            </div>
        </div>
    </div>

</div>
<div class="row p-3">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fas ti ti-chart-candle"></i> Data Transaksi
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered" id="tabelPenjualan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row mt-4 mx-1">
    </div>
    </form>
</div>


</div>

<?= $this->endSection(); ?>