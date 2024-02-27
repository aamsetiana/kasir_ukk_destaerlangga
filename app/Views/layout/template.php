<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <style>
        .pointer {
            cursor: pointer;
        }

        .pesan {
            font-size: 1rem;
        }
    </style>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/chart.js/chart.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/select2/css/select2.min.css'); ?>">

    <link href="<?= base_url('plugins/datatables/datatables.min.css') ?>" rel="stylesheet">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/css/adminlte.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/icon/tabler-icons.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/jquery-autocomplete/css/jquery-ui.css'); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- cdn jquery -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <!-- Navbar -->
    <?= $this->include('layout/header'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?= $this->include('layout/sidebar'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 797px;">
        <!-- Content Header (Page header) -->

        <!-- /.content-header -->

        <!-- Main content -->
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <?= $this->renderSection('konten');?>
        </div>
        <!-- ./col -->
    </div>
    </div><!-- /.container-fluid -->
    <!-- /.content -->
    </div>

    <!-- ./wrapper -->
    <?= $this->include('layout/js'); ?>
    <!-- render Javascript disini -->
    <?= $this->renderSection('js'); ?>

    <!-- AdminLTE for demo purposes -->

    <!-- Modal box untuk konfirmasi logout -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Anda yakin ingin logout?</p>
                </div>
                <div class="modal-footer">
                    <!-- Tombol untuk konfirmasi logout -->
                    <button type="button" class="btn btn-primary" id="confirmLogout" data-dismiss="modal">Ya</button>
                    <!-- Tombol untuk membatalkan logout -->
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // menu active
        $(document).ready(function() {
            let currentUrl = window.location.href;

            $('.nav-link').each(function() {

                let linkUrl = $(this).attr('href');

                if (currentUrl.indexOf(linkUrl) !== -1) {
                    $(this).addClass('active');
                }
            });
        });

        // table
        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true
            });
        });

        // logout
        document.getElementById('confirmLogout').addEventListener('click', function() {
            window.location.href = "<?= site_url('logout') ?>";
        });

        // input nomer
        $('.money').mask('000.000.000.000.000', {
            reverse: true
        });

        // input %
        $('.percent').mask('##0%', {
            reverse: true
        }).on('keyup', function() {
            var value = parseInt($(this).cleanVal());
            if (value > 100) {
                $(this).val('100%');
            }
        });

        // // cari pelanggan
        // $(document).ready(function() {
        //     $("#cariPelanggan").autocomplete({
        //         source: function(request, response) {
        //             $.ajax({
        //                 url: "<?= ('cari-pelanggan'); ?>",
        //                 type: 'post',
        //                 dataType: "json",
        //                 data: {
        //                     cariPelanggan: request.term
        //                 },
        //                 success: function(data) {
        //                     console.log("Data yang diterima dari server:", data);
        //                     if (data.length === 0) {
        //                         // Jika data tidak ditemukan, kirimkan pesan "Produk tidak ditemukan"
        //                         response([{
        //                             nama_pelanggan: 'Pelanggan tidak ditemukan',
        //                             id_pelanggan: ''
        //                         }]);
        //                     } else {
        //                         // Jika data ditemukan, tampilkan hasil pencarian
        //                         response(data);
        //                     }
        //                 }
        //             });
        //         },
        //         minLength: 1, // minimum length of the input for autocomplete to start
        //         select: function(event, ui) {
        //             // Memasukkan nama produk ke dalam input
        //             $('#cariPelanggan').val(ui.item.nama_pelanggan);

        //             $('#idPelanggan').val(ui.item.id_pelanggan);

        //             // Mengambil informasi tambahan tentang produk
        //             $.ajax({
        //                 url: "<?= site_url('info-pelanggan'); ?>",
        //                 type: 'post',
        //                 dataType: "json",
        //                 data: {
        //                     cariPelanggan: ui.item.nama_pelanggan
        //                 },
        //                 success: function(data) {
        //                     console.log("Informasi pelanggan:", data);
        //                     // Lakukan sesuatu dengan informasi produk yang diterima dari server
        //                 }
        //             });

        //             return false; // Mencegah perilaku default dari Autocomplete, yaitu mengisi input dengan nilai item yang dipilih
        //         }
        //     }).autocomplete("instance")._renderItem = function(ul, item) {
        //         return $("<li>")
        //             .append("<div>" + item.nama_pelanggan + "</div>")
        //             .appendTo(ul);
        //     };
        // });

        // // cari produk
        // $(document).ready(function() {
        //     $("#cariProduk").autocomplete({
        //         source: function(request, response) {
        //             $.ajax({
        //                 url: "<?= ('cari-produk'); ?>",
        //                 type: 'post',
        //                 dataType: "json",
        //                 data: {
        //                     cariProduk: request.term
        //                 },
        //                 success: function(data) {
        //                     console.log("Data yang diterima dari server:", data);
        //                     if (data.length === 0) {
        //                         // Jika data tidak ditemukan, kirimkan pesan "Produk tidak ditemukan"
        //                         response([{
        //                             nama_produk: 'Produk tidak ditemukan',
        //                             kode_produk: ''
        //                         }]);
        //                     } else {
        //                         // Jika data ditemukan, tampilkan hasil pencarian
        //                         response(data);
        //                     }
        //                 }
        //             });
        //         },
        //         minLength: 2, // minimum length of the input for autocomplete to start
        //         select: function(event, ui) {
        //             // Memasukkan nama produk ke dalam input
        //             $('#cariProduk').val(ui.item.nama_produk);

        //             $('#idProduk').val(ui.item.id_produk);

        //             $('#hargaProduk').val(ui.item.harga_jual);

        //             // Mengambil informasi tambahan tentang produk
        //             $.ajax({
        //                 url: "<?= site_url('info-produk'); ?>",
        //                 type: 'post',
        //                 dataType: "json",
        //                 data: {
        //                     cariProduk: ui.item.nama_produk
        //                 },
        //                 success: function(data) {
        //                     console.log("Informasi produk:", data);
        //                     // Lakukan sesuatu dengan informasi produk yang diterima dari server
        //                 }
        //             });

        //             return false; // Mencegah perilaku default dari Autocomplete, yaitu mengisi input dengan nilai item yang dipilih
        //         }
        //     }).autocomplete("instance")._renderItem = function(ul, item) {
        //         return $("<li>")
        //             .append("<div>" + item.nama_produk + "</div>")
        //             .appendTo(ul);
        //     };
        // });

        // periksa pk dan fk
        document.addEventListener('DOMContentLoaded', function() {

            periksaKeterkaitanDataSatuan();
            periksaKeterkaitanDataKategori();

            // Periksa keterkaitan satuan
            function periksaKeterkaitanDataSatuan() {
                let daftarIdData = [];
                let buttons = document.querySelectorAll('#hapusSatuan');
                buttons.forEach(function(button) {
                    daftarIdData.push(button.dataset.id);
                });

                daftarIdData.forEach(function(idData) {
                    let xhr = new XMLHttpRequest();
                    xhr.open('GET', '<?= site_url('cek-satuan-digunakan/'); ?>' + idData, true);
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4) {
                            if (xhr.status === 200) {

                                // Respons berhasil diterima
                                let response = JSON.parse(xhr.responseText);

                                if (response.has_keterkaitan) {
                                    let tombol = document.querySelector('#hapusSatuan[data-id="' + idData + '"]');
                                    tombol.disabled = true;

                                    let pesan = document.createElement('span');
                                    pesan.classList.add('pesan-error');
                                    pesan.textContent = 'Data sudah digunakan dan tidak bisa dihapus';

                                    pesan.style.display = 'inline-block';
                                    pesan.style.color = 'red';
                                    pesan.style.marginLeft = '10px';
                                    pesan.style.backgroundColor = 'rgba(255, 0, 0, 0.1)';

                                    tombol.parentNode.insertBefore(pesan, tombol.nextSibling);
                                }
                            } else {
                                // Respons gagal
                                console.error('Terjadi kesalahan saat melakukan permintaan AJAX');
                            }
                        }
                    };
                    xhr.send();
                });
            }

            // Periksa keterkaitan kategori
            function periksaKeterkaitanDataKategori() {
                let daftarIdData = [];
                let buttons = document.querySelectorAll('#hapusKategori');
                buttons.forEach(function(button) {
                    daftarIdData.push(button.dataset.id);
                });

                daftarIdData.forEach(function(idData) {
                    let xhr = new XMLHttpRequest();
                    xhr.open('GET', '<?= site_url('cek-kategori-digunakan/'); ?>' + idData, true);
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === 4) {
                            if (xhr.status === 200) {

                                // Respons berhasil diterima
                                let response = JSON.parse(xhr.responseText);

                                if (response.has_keterkaitan) {
                                    let tombol = document.querySelector('#hapusKategori[data-id="' + idData + '"]');
                                    tombol.disabled = true;

                                    let pesan = document.createElement('span');
                                    pesan.classList.add('pesan-error');
                                    pesan.textContent = 'Data sudah digunakan dan tidak bisa dihapus';

                                    pesan.style.display = 'inline-block';
                                    pesan.style.color = 'red';
                                    pesan.style.marginLeft = '10px';
                                    pesan.style.backgroundColor = 'rgba(255, 0, 0, 0.1)';

                                    tombol.parentNode.insertBefore(pesan, tombol.nextSibling);
                                }
                            } else {
                                // Respons gagal
                                console.error('Terjadi kesalahan saat melakukan permintaan AJAX');
                            }
                        }
                    };
                    xhr.send();
                });
            }
        });

        $(document).ready(function() {
            $('#formPenjualan').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "<?= site_url('tambah-penjualan'); ?>",
                    data: $('#formPenjualan').serialize(),
                    success: function(response) {
                        perbaruiTabelPenjualan();
                    }
                });
            });
        });

        // function perbaruiTabelPenjualan() {
        //     nomorFaktur = $('#nomorFaktur').val();
        //     let tbody = $('#tabelPenjualan tbody');
        //     tbody.empty(); // Kosongkan isi tabel sebelum menambahkan data baru

        //     $.ajax({
        //         type: "GET",
        //         url: "<?= site_url('ambil-data-penjualan/') ?>" + nomorFaktur,
        //         success: function(response) {
        //             let transaksi = {}; // Objek untuk menyimpan data transaksi yang diolah
        //             let nomor = 1;
        //             let totalHarga = 0;
        //             let totalHargaSemuaBarang = 0;
        //             $.each(response, function(index, item) {
        //                 let key = item.id_produk; // Gunakan id_produk sebagai kunci dalam objek transaksi
        //                 if (!transaksi[key]) {
        //                     // Jika item belum ada dalam objek transaksi, tambahkan item baru
        //                     transaksi[key] = {
        //                         nomor: nomor++,
        //                         id_produk: item.id_produk,
        //                         jumlah: parseInt(item.qty),
        //                         nama_produk: item.nama_produk,
        //                         harga_jual: parseFloat(item.harga_jual),
        //                         total: parseFloat(item.total_harga),
        //                     };
        //                 } else {
        //                     // Jika item sudah ada dalam objek transaksi, tambahkan jumlahnya
        //                     transaksi[key].jumlah += parseInt(item.qty);
        //                     transaksi[key].total += parseFloat(item.total_harga);
        //                 }
        //                 // Tambahkan grand total untuk setiap item
        //                 totalHarga += parseFloat(item.total_harga);
        //                 totalHargaSemuaBarang += parseFloat(item.total_harga);
        //             });

        //             // Tampilkan data transaksi ke dalam tabel
        //             $.each(transaksi, function(key, item) {
        //                 let row = '<tr>' +
        //                     '<td>' + item.nomor + '</td>' +
        //                     '<td>' + item.nama_produk + '</td>' +
        //                     '<td>' + item.jumlah + '</td>' +
        //                     '<td>' + item.harga_jual + '</td>' +
        //                     '<td>' + item.total + '</td>' +
        //                     '</tr>';
        //                 tbody.append(row);
        //             });
        //             // Tampilkan total harga semua barang di luar loop
        //             $('#totalHargaSemuaBarang').text(totalHargaSemuaBarang);
        //         },
        //         error: function(xhr, status, error) {
        //             // Tangani kesalahan jika terjadi
        //             console.error("Error:", error);
        //         }
        //     });
        // }

        function perbaruiTabelPenjualan() {
            var nomorFaktur = $('#nomorFaktur').val();
            var tbody = $('#tabelPenjualan tbody');
            tbody.empty(); // Kosongkan isi tabel sebelum menambahkan data baru

            $.ajax({
                type: "GET",
                url: "<?= site_url('ambil-data-penjualan/') ?>" + nomorFaktur,
                success: function(response) {
                    var transaksi = {}; // Objek untuk menyimpan data transaksi yang diolah
                    var totalHargaSemuaBarang = 0;
                    $.each(response, function(index, item) {
                        var key = item.id_produk; // Gunakan id_produk sebagai kunci dalam objek transaksi
                        if (!transaksi[key]) {
                            // Jika item belum ada dalam objek transaksi, tambahkan item baru
                            transaksi[key] = {
                                id_produk: item.id_produk,
                                id_detail: item.id_detail,
                                nama_produk: item.nama_produk,
                                jumlah: parseInt(item.qty),
                                harga_jual: parseFloat(item.harga_jual),
                                total: parseFloat(item.total_harga),
                            };
                        } else {
                            // Jika item sudah ada dalam objek transaksi, perbarui jumlah dan total harga
                            transaksi[key].jumlah += parseInt(item.qty);
                            transaksi[key].total += parseFloat(item.total_harga.toString().replace('.', ','));
                        }
                        // Tambahkan total harga semua barang
                        totalHargaSemuaBarang += parseFloat(item.total_harga);
                    });

                    // Tampilkan data transaksi ke dalam tabel
                    var nomor = 1;
                    $.each(transaksi, function(key, item) {
                        var row = '<tr>' +
                            '<td>' + (nomor++) + '</td>' +
                            '<td>' + item.nama_produk + '</td>' +
                            '<td class="jumlah">' + item.jumlah + '</td>' +
                            '<td>' + item.harga_jual + '</td>' +
                            '<td class="total-harga">' + item.total + '</td>' +
                            '<td><button class="btn btn-danger hapus" data-id="' + item.id_detail + '"><i class="far fa-trash-alt"></i></button></td>' +
                            '</tr>';
                        tbody.append(row);
                    });
                    // Tampilkan total harga semua barang di luar loop
                    $('#totalHargaSemuaBarang').text(totalHargaSemuaBarang.toFixed(2).toString().replace('.', ','));


                    // Tambahkan event listener untuk tombol hapus
                    $('.hapus').click(function() {
                        let id_detail = $(this).data('id');
                        let row = $(this).closest('tr')

                        $.ajax({
                            type: "POST",
                            url: "<?= site_url('hapus-penjualan/'); ?>" + id_detail,
                            data: id_detail,
                            success: function(response) {
                                row.remove();
                                perbaruiTotalHarga();
                            }
                        });
                        console.log('Hapus item dengan id_produk: ' + id_detail);
                    });
                },
                error: function(xhr, status, error) {
                    // Tangani kesalahan jika terjadi
                    console.error("Error:", error);
                }
            });
        }

        function perbaruiTotalHarga() {
            var totalHargaSemuaBarang = 0;
            $('.total-harga').each(function() {
                totalHargaSemuaBarang += parseFloat($(this).text().replace(',', '.')); // Ambil nilai total harga setiap item dan tambahkan ke total harga semua barang
            });
            $('#totalHargaSemuaBarang').text(totalHargaSemuaBarang.toFixed(2).toString().replace('.', ','));
        }


        // function perbaruiTabelPenjualan() {
        //     $(document).ready(function() {
        //         var noFaktur = $('#nomorFaktur').val(); // Ganti dengan ID penjualan yang sesuai
        //         var transaksi = {};
        //         var nomor = 1;
        //         let totalHarga = 0;
        //         let totalHargaSemuaBarang = 0;

        //         $.ajax({
        //             url: "<?= site_url('ambil-data-penjualan/') ?>" + noFaktur,
        //             type: "GET",
        //             dataType: "json",
        //             success: function(response) {
        //                 if (response.length > 0) {
        //                     $.each(response, function(index, item) {
        //                         let key = item.id_produk; // Gunakan id_produk sebagai kunci dalam objek transaksi
        //                         if (!transaksi[key]) {
        //                             // Jika item belum ada dalam objek transaksi, tambahkan item baru
        //                             transaksi[key] = {
        //                                 nomor: nomor++,
        //                                 qty: parseInt(item.qty),
        //                                 nama_produk: item.nama_produk,
        //                                 harga_jual: parseFloat(item.harga_jual),
        //                                 total_harga: parseFloat(item.total_harga),
        //                                 id_detail: item.id_detail,
        //                             };
        //                         } else {
        //                             // Jika item sudah ada dalam objek transaksi, tambahkan jumlahnya
        //                             transaksi[key].qty += parseInt(item.qty);
        //                             transaksi[key].total_harga += parseFloat(item.total_harga);
        //                         }
        //                         // Tambahkan grand total untuk setiap item
        //                         totalHargaSemuaBarang += parseFloat(item.total_harga);
        //                     });

        //                     // Tampilkan data transaksi ke dalam tabel
        //                     $.each(transaksi, function(key, item) {
        //                         let row = '<tr>' +
        //                             '<td>' + item.nomor + '</td>' +
        //                             '<td>' + item.nama_produk + '</td>' +
        //                             '<td>' + item.qty + '</td>' +
        //                             '<td>' + item.harga_jual + '</td>' +
        //                             '<td>' + item.total_harga + '</td>' +
        //                             '<td><a href="" class="btn btn-primary hapus-data" data-id="' + item.id_detail + '">Hapus</a></td>' +
        //                             '</tr>';
        //                         $('#tabelPenjualan tbody').append(row);
        //                     });

        //                     // Tampilkan total harga barang
        //                     $('#totalHargaSemuaBarang').text(totalHargaSemuaBarang);
        //                 } else {
        //                     $('#tabelPenjualan tbody').html('<tr><td colspan="5">Data tidak ditemukan</td></tr>');
        //                 }
        //             },
        //             error: function(xhr, status, error) {
        //                 console.error(xhr.responseText);
        //             }
        //         });
        //     });
        // }
        // Mengatur status tombol pembayaran berdasarkan total bayar
        function aturStatusPembayaran() {
            let totalBayar = parseFloat($('#jumlahPembayaran').val());
            let totalHargaSemuaBarang = parseFloat($('#totalHargaSemuaBarang').text());

            if (totalBayar >= totalHargaSemuaBarang) {
                $('#btnPembayaran').prop('disabled', false);
            } else {
                $('#btnPembayaran').prop('disabled', true);
            }
        }

        // Ketika nilai pembayaran berubah, hitung jumlah kembali dan perbarui tampilan
        $('#jumlahPembayaran').on('input', function() {
            let totalBayar = parseFloat($(this).val());
            let totalHargaSemuaBarang = parseFloat($('#totalHargaSemuaBarang').text());
            let kembali = totalBayar - totalHargaSemuaBarang;

            $('#kembali').val(kembali.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }));

            // Memanggil fungsi untuk mengatur status pembayaran setiap kali nilai berubah
            aturStatusPembayaran();
        });

        // Saat formulir pembayaran diserahkan, lakukan pembayaran
        $('#formPembayaran').submit(function(e) {
            e.preventDefault();

            let totalBayar = parseFloat($('#jumlahPembayaran').val());
            let totalHargaSemuaBarang = parseFloat($('#totalHargaSemuaBarang').text());

            if (totalBayar >= totalHargaSemuaBarang) {
                let kembali = totalBayar - totalHargaSemuaBarang;
                alert('Pembayaran berhasil! Kembali: ' + kembali.toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }));

                $.ajax({
                    type: "POST",
                    url: "<?= site_url('pembayaran'); ?>",
                    data: $('#formPembayaran').serialize(),
                    success: function(response) {
                        console.log(response)
                    }
                });

                location.reload();
            } else {
                alert('Pembayaran kurang! Jumlah yang dibayarkan harus lebih besar atau sama dengan total harga semua barang.');
            }
        });

        // Memanggil fungsi untuk mengatur status pembayaran saat dokumen dimuat
        $(document).ready(function() {
            aturStatusPembayaran();
        });




        // select2
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });

        // function formatRupiah(angka) {
        //     return angka.toLocaleString('id-ID', {
        //         style: 'currency',
        //         currency: 'IDR'
        //     });
        // }
    </script>

</body>

</html>