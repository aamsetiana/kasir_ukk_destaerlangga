<aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <div class="mt-3 user-panel text-center text-white">
                <h3 class="font-weight-bold">Kasir UKK</h3>
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <?php if (session()->get('level') == 'admin') : ?>
                            <li class="nav-item ">
                                <a href="<?= site_url('halaman-admin'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-header">MENU</li>
                        <?php if (session()->get('level') == 'admin') : ?>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-cube px-1"></i>
                                    <p>
                                        Master Data
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= site_url('list-satuan'); ?>" class="nav-link">
                                            <i class="fas fa-balance-scale nav-icon"></i>
                                            <p>Satuan</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= site_url('list-kategori'); ?>" class="nav-link">
                                            <i class="fa fa-list nav-icon"></i>
                                            <p>Kategori</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= site_url('list-produk'); ?>" class="nav-link">
                                            <i class="fas fa-shopping-bag nav-icon"></i>
                                            <p>Produk</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= site_url('list-pengguna'); ?>" class="nav-link">
                                            <i class="fas fa-users px-1"></i>
                                            <p>Pengguna</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-wallet px-1"></i>
                                <p>
                                    Master Transaksi
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= site_url('penjualan'); ?>" class="nav-link">
                                        <i class="fas fa-chart-line nav-icon"></i>
                                        <p>Penjualan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-file-alt px-1"></i>
                                <p>
                                    Laporan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= site_url('laporan-stok'); ?>" class="nav-link">
                                        <i class="fas ti ti-chart-pie nav-icon"></i>
                                        <p>Stok</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= site_url('laporan-penjualan'); ?>" class="nav-link">
                                        <i class="fas ti ti-stairs-up nav-icon"></i>
                                        <p>Penjualan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php if (session()->get('level') == 'admin') : ?>
                            <li class="nav-item">
                                <a href="<?= site_url('list-pelanggan'); ?>" class="nav-link">
                                    <i class="fas fa-users px-1"></i>
                                    <p>
                                        Pelanggan
                                    </p>
                                </a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link pointer" id="logoutBtn" data-toggle="modal" data-target="#confirmationModal">
                                <i class="fa fa-sign-out-alt px-1"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>