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
        <a href="<?= site_url('tambah-pengguna'); ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah Data Pengguna</a>
    </div>
</div>

<div class="row">
    <div class="col-lg-5 mx-3 mt-4"><?php if (session('success')) : ?>
            <?= session('success') ?>
        <?php endif; ?></div>
</div>

<div class="row">
    <div class="col-lg-12 mx-auto">
        <div class="card">
            <div class="card-header">
                <p></p>
            </div>
            <div class="card-body">
                <table id="myTable" class="display responsive table table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width: 3%;">No</th>
                            <th>Nama Pengguna</th>
                            <th>Password</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($listPengguna)) {
                            $no = null;
                            foreach ($listPengguna as $p) {
                                $no++;
                        ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $p['username']; ?></td>
                                    <td><?= $p['password']; ?></td>
                                    <td><?= $p['level']; ?></td>
                                    <td>
                                        <a href=<?= site_url('/edit-pengguna/' . $p['id_user']); ?> class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                        <form action="<?= site_url('hapus-pengguna/') . $p['id_user']; ?>" method="post" class="d-inline-block">
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