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

<div class="container-fluid mx-1">
    <div class="row p-1">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-briefcase"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Jumlah Produk</span>
                    <span class="info-box-number">
                        <?= $totalProduk; ?>
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Pendapatan Bulan ini</span>
                    <span class="info-box-number"><?= 'Rp.' . number_format($pendapatanBulanIni, 2, ',', '.'); ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-shopping-cart"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Pendapatan Hari Ini</span>
                    <span class="info-box-number"><?= 'Rp.' . number_format($pendapatanHariIni, 2, ',', '.'); ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Pengguna</span>
                    <span class="info-box-number"><?= $totalPengguna; ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
</div>

<!-- <div class="container-fluid mx-1">
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>

                    <p>Jumlah Produk</p>
                </div>
                <div class="icon">
                    <i class="fas fa-briefcase"></i>
                </div>

            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>53</h3>

                    <p>Total Penjualan</p>
                </div>
                <div class="icon">
                    <i class="ti ti-shopping-cart"></i>
                </div>

            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>44</h3>

                    <p>Total Pembelian</p>
                </div>
                <div class="icon">
                    <i class="ti ti-shopping-cart-plus"></i>
                </div>

            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>65</h3>

                    <p>Pengguna</p>
                </div>
                <div class="icon">
                    <i class="ti ti-user"></i>
                </div>

            </div>
        </div>
    </div>
</div> -->

<div class="row p-3">
    <!-- /.col (LEFT) -->
    <div class="col-md-12">
        <!-- LINE CHART -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Grafik Pendapatan Perbulan</h3>
            </div>
            <div class="card-body">
                <div class="chart">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="myChart" width="600" height="150"></canvas>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.card -->

    </div>
    <!-- /.col (RIGHT) -->
</div>
<?= $this->endSection(); ?>
<!-- /.row -->

<?= $this->section('js'); ?>
<script>
    // Ambil data dari controller
    var chartData = <?= json_encode($chartData) ?>;

    // Daftar bulan untuk label chart
    var months = chartData.months;

    // Data pendapatan bulanan
    var incomeData = chartData.monthlyIncome;

    // Buat grafik menggunakan Chart.js
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: months,
            datasets: [{
                label: 'Chart Example',
                data: incomeData,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<?= $this->endSection(); ?>