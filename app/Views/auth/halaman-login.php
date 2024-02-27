<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>

    <style>
        .pointer {
            cursor: pointer;
        }
    </style>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/css/adminlte.min.css'); ?>">
</head>

<body class="login-page" style="min-height: 600px; background-color: #D8E1FA;">
    <?php if (session('pesan')) : ?>
        <?= session('pesan') ?>
    <?php endif; ?>
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h1><b>Kasir UKK</b></h1>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Silahkan login terlebih dahulu</p>

                <form action="<?= site_url('proses-login'); ?>" method="post">
                    <div class="form-group">
                        <label for="username" class="font-weight-bold">Username</label>
                        <input type="text" class="form-control <?= session()->has('errors') && array_key_exists('username', session('errors')) ? 'is-invalid' : null ?>" id="username" placeholder="Masukan Username" autocomplete="off" name="username" value="<?= old('username'); ?>">
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
                        <input type="password" class="form-control <?= session()->has('errors') && array_key_exists('password', session('errors')) ? 'is-invalid' : null ?>" id="password" placeholder="Masukan Password" autocomplete="off" name="password" value="<?= old('password'); ?>">
                        <?php if (session()->has('errors') && array_key_exists('password', session('errors'))) : ?>
                            <div class="mx-1 invalid-feedback">
                                <p style="font-size: 1rem;">
                                    <?= session('errors')['password']; ?>
                                </p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-8 mt-1">
                            <a href="<?= base_url('lupa-password'); ?>">Lupa Password</a>
                        </div>

                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <p class="mb-1">
                    </p>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('plugins/jquery/jquery.min.js'); ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/js/adminlte.min.js'); ?>"></script>


</body>

</html>