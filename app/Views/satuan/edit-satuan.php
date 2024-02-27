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
                Form Edit
            </div>
            <div class="card-body">
                <form action="<?= site_url('edit-satuan/') . $listSatuan['id_satuan']; ?>" method="post">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label for="namaSatuan" class="font-weight-bold">Nama Satuan</label>
                                <input type="text" class="form-control" id="namaSatuan" placeholder="Masukan Nama Satuan" autocomplete="off" name="satuan" value="<?= $listSatuan['nama_satuan']?>">
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