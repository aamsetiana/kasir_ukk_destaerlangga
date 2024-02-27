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
    <?php if (session()->has('error')) : ?>
        <p style="color: red;"><?= session('error') ?></p>
    <?php endif; ?>

    <?php if (session('pesan')) : ?>
        <?= session('pesan') ?>
    <?php endif; ?>
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h3>Reset Password</h3>
            </div>
            <div class="card-body">

                <form action="<?= site_url('kirim-reset-link'); ?>" method="post">
                    <div class="form-group">
                        <label for="email" class="font-weight-bold pointer">Email</label>
                        <input type="email" class="form-control" placeholder="Masukan Email Anda" id="email" name="email" autocomplete="off">
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <p class="mb-1">
                                <a href="<?= base_url('/'); ?>">Kembali</a>
                            </p>
                        </div>

                        <!-- /.col -->
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block">Kirim Permintaan</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.col -->
            </div>

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