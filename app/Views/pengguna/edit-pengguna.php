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
                <form action="<?= site_url('edit-pengguna/') . $listPengguna['id_user']; ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label for="namaLengkap" class="font-weight-bold">Nama Lengkap</label>
                                <input type="text" class="form-control <?= session()->has('errors') && array_key_exists('nama_lengkap', session('errors')) ? 'is-invalid' : null ?>" id="namaLengkap" placeholder="Masukan Nama Lengkap" autocomplete="off"  name="nama_lengkap" value="<?=(old('nama_lengkap')) ? old('nama_lengkap') : $listPengguna['nama_lengkap'];?>">
                                <?php if (session()->has('errors') && array_key_exists('nama_lengkap', session('errors'))) : ?>
                                    <div class="mx-1 invalid-feedback">
                                        <p style="font-size: 1rem;">
                                            <?= session('errors')['nama_lengkap']; ?>
                                        </p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="username" class="font-weight-bold">Username</label>
                                <input type="text" class="form-control <?= session()->has('errors') && array_key_exists('username', session('errors')) ? 'is-invalid' : null ?>" id="username" placeholder="Masukan Username" autocomplete="off" name="username" value="<?=(old('username')) ? old('username') : $listPengguna['username'];?> ">
                                <?php if (session()->has('errors') && array_key_exists('username', session('errors'))) : ?>
                                    <div class="mx-1 invalid-feedback">
                                        <p style="font-size: 1rem;">
                                            <?= session('errors')['username']; ?>
                                        </p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="password" class="font-weight-bold">Password</label>
                                <input type="password" class="form-control <?= session()->has('errors') && array_key_exists('password', session('errors')) ? 'is-invalid' : null ?>" id="password" placeholder="Masukan Password" autocomplete="off" name="password" value="<?=old('password');?>">
                                <?php if (session()->has('errors') && array_key_exists('password', session('errors'))) : ?>
                                    <div class="mx-1 invalid-feedback">
                                        <p style="font-size: 1rem;">
                                            <?= session('errors')['password']; ?>
                                        </p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="level" class="font-weight-bold">Level</label>
                                <select class="custom-select <?= session()->has('errors') && array_key_exists('level', session('errors')) ? 'is-invalid' : null ?>" id="level" name="level">
                                    <option value="">--pilih--</option>
                                    <?php foreach ($enumValues as $value) : ?>
                                        <option value="<?= $value ?>" <?= ($value == old('level')) ? 'selected' : '' ?> <?= ($value == $listPengguna['level']) ? 'selected' : '' ?>><?= $value ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?php if (session()->has('errors') && array_key_exists('level', session('errors'))) : ?>
                                    <div class="mx-1 invalid-feedback">
                                        <p style="font-size: 1rem;">
                                            <?= session('errors')['level']; ?>
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