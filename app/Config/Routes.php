<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


// Auth
$routes->get('/', 'Auth::index');
$routes->post('/proses-login', 'Auth::prosesLogin');
$routes->get('/logout', 'Auth::logout');
$routes->get('/lupa-password', 'Auth::lupaPassword');
$routes->post('kirim-reset-link', 'Auth::sendResetLink');
$routes->get('reset-password/(:segment)', 'Auth::resetPassword/$1');
$routes->post('update-password', 'Auth::updatePassword');

// Pengguna
$routes->get('list-pengguna', 'Pengguna::index',['filter'=>'otentifikasi']);
$routes->get('/tambah-pengguna', 'Pengguna::tambahPengguna',['filter'=>'otentifikasi']);
$routes->post('/tambah-pengguna', 'Pengguna::prosesTambah');
$routes->get('/edit-pengguna/(:num)', 'Pengguna::editPengguna/$1',['filter'=>'otentifikasi']);
$routes->post('/edit-pengguna/(:num)', 'Pengguna::prosesEdit/$1');
$routes->post('/hapus-pengguna/(:num)', 'Pengguna::hapusPengguna/$1');

// Pelanggan
$routes->get('list-pelanggan', 'Pelanggan::index',['filter'=>'otentifikasi']);
$routes->get('tambah-pelanggan', 'Pelanggan::tambahPelanggan',['filter'=>'otentifikasi']);
$routes->post('tambah-pelanggan', 'Pelanggan::prosesTambah',['filter'=>'otentifikasi']);
$routes->get('edit-pelanggan/(:num)', 'Pelanggan::editPelanggan/$1',['filter'=>'otentifikasi']);
$routes->post('edit-pelanggan/(:num)', 'Pelanggan::prosesEdit/$1',['filter'=>'otentifikasi']);
$routes->post('hapus-pelanggan/(:num)', 'Pelanggan::hapusPelanggan/$1',['filter'=>'otentifikasi']);

// Admin
$routes->get('/halaman-admin', 'Admin::index',['filter'=>'otentifikasi']);

// Produk
$routes->get('/list-produk', 'Produk::index',['filter'=>'otentifikasi']);
$routes->get('/tambah-produk', 'Produk::tambahProduk',['filter'=>'otentifikasi']);
$routes->post('/tambah-produk', 'Produk::prosesSimpan');
$routes->get('/edit-produk/(:num)', 'Produk::editProduk/$1');
$routes->post('/edit-produk/(:num)', 'Produk::prosesEdit/$1');
$routes->post('/hapus-produk/(:num)', 'Produk::hapusProduk/$1');

// Satuan
$routes->get('/list-satuan', 'Satuan::index',['filter'=>'otentifikasi']);
$routes->get('/tambah-satuan', 'Satuan::tambahSatuan',['filter'=>'otentifikasi']);
$routes->post('/tambah-satuan', 'Satuan::prosesSimpan');
$routes->get('/edit-satuan/(:num)', 'Satuan::editSatuan/$1',['filter'=>'otentifikasi']);
$routes->post('/edit-satuan/(:num)', 'Satuan::prosesEdit/$1');
$routes->post('/hapus-satuan/(:num)', 'Satuan::hapusSatuan/$1');
$routes->get('/cek-satuan-digunakan/(:segment)', 'Satuan::cek_keterkaitan_data/$1');

// Kategori
$routes->get('/list-kategori', 'Kategori::index',['filter'=>'otentifikasi']);
$routes->get('/tambah-kategori', 'Kategori::tambahKategori',['filter'=>'otentifikasi']);
$routes->post('/tambah-kategori', 'Kategori::prosesSimpan');
$routes->get('/edit-kategori/(:num)', 'Kategori::editKategori/$1',['filter'=>'otentifikasi']);
$routes->post('/edit-kategori/(:num)', 'Kategori::prosesEdit/$1');
$routes->get('/hapus-kategori/(:num)', 'Kategori::hapusKategori/$1');
$routes->get('/cek-kategori-digunakan/(:segment)', 'Kategori::cek_keterkaitan_data/$1');

// Penjualan
$routes->get('/penjualan', 'Penjualan::index',['filter'=>'otentifikasi']);
$routes->post('/tambah-penjualan', 'Penjualan::simpanPenjualan',['filter'=>'otentifikasi']);
$routes->post('/pembayaran', 'Penjualan::simpanPembayaran',['filter'=>'otentifikasi']);
$routes->get('/ambil-data-penjualan/(:segment)', 'Penjualan::ambilTerbaru/$1',['filter'=>'otentifikasi']);
$routes->post('/hapus-penjualan/(:num)', 'Penjualan::hapus/$1',['filter'=>'otentifikasi']);

// Laporan
$routes->get('/laporan-stok', 'LaporanStok::index');
$routes->get('/laporan-penjualan', 'LaporanPenjualan::index');
$routes->get('/pdf-stok', 'LaporanStok::generatePdf');
$routes->post('/laporan-penjualan', 'LaporanPenjualan::generate_laporan');

// Cari Pelanggan
$routes->post('/cari-pelanggan', 'Pelanggan::cariPelanggan');
$routes->post('/info-pelanggan', 'Pelanggan::getInfoPelanggan');

// Cari Produk
$routes->post('/cari-produk', 'Produk::cariProduk');
$routes->post('/info-produk', 'Produk::getInfoProduk');

$routes->post('/simpan-keranjang', 'Penjualan::prosesTambahPenjualan');