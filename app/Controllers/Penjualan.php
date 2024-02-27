<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Penjualan extends BaseController
{
    public function index()
    {
        // $idPenjualan = '2';
        $data = [
            'title' => 'Halaman Penjualan',
            'judulHalaman' => 'Transaksi Penjualan',
            'noFaktur' => $this->penjualan->generateNomerFaktur(),
            'tanggal' => $this->penjualan->generateTanggal(),
            'waktu' => $this->penjualan->generateWaktu(),
            'listProduk' => $this->produk->findAll(),
            // 'tes' => $this->hitungTotalHarga($idPenjualan)
        ];

        return view('transaksi/penjualan', $data);
    }

    // public function simpanPenjualan()
    // {
    //     // ambil detail barang yang dijual
    //     $where = ['id_produk' => $this->request->getPost('id_produk')];

    //     $cekBarang = $this->produk->where($where)->findAll();
    //     $hargaJual = $cekBarang[0]['harga_jual'];

    //     // Ambil nomor faktur
    //     $nomorFaktur = $this->request->getPost('no_faktur');

    //     // Jika nomor faktur tidak disediakan, berikan nomor faktur baru
    //     if (empty($nomorFaktur)) {
    //         $nomorFaktur = $this->penjualan->generateNomerFaktur();
    //     }

    //     // // Jika ID pelanggan tidak tersedia, isi dengan NULL
    //     // $idPelanggan = $this->request->getPost('idPelanggan') ?: null;

    //     // Cek apakah nomor faktur sudah ada di tabel penjualan
    //     $existingPenjualan = $this->penjualan->where('no_faktur', $nomorFaktur)->first();

    //     if (!$existingPenjualan) {
    //         // Jika nomor faktur belum ada, buat entri baru di tabel penjualan
    //         $dataPenjualan = [
    //             'no_faktur' => $nomorFaktur,
    //             'tgl_penjualan' =>  date('Y-m-d H:m=i:s'),
    //             'grand_total' => 0,
    //             'id_user' => session()->get('id_user'),
    //             'id_pelanggan' => null,
    //         ];

    //         $this->penjualan->insert($dataPenjualan);

    //         // Ambil ID penjualan yang baru saja dibuat
    //         $idPenjualan = $this->penjualan->insertID;
    //     } else {
    //         // Jika nomor faktur sudah ada, gunakan ID penjualan yang sudah ada
    //         $idPenjualan = $existingPenjualan['id_penjualan'];
    //     }

    //     $dataDetailPenjualan = [
    //         'id_penjualan' => $idPenjualan,
    //         'id_produk' => $this->request->getPost('id_produk'),
    //         'qty' => $this->request->getPost('jumlah'),
    //         'total_harga' => $hargaJual * $this->request->getPost('jumlah')
    //     ];

    //     $this->detailpenjualan->insert($dataDetailPenjualan);
    // }

    // public function simpanPenjualan()
    // {
    //     // ambil detail barang yang dijual
    //     $where = ['id_produk' => $this->request->getPost('id_produk')];

    //     $cekBarang = $this->produk->where($where)->findAll();
    //     $hargaJual = $cekBarang[0]['harga_jual'];


    //     $idPenjualan = session()->get('IdPenjualan');
    //     if (!$idPenjualan) {
    //         // 1 nampung data penjualan
    //         $dataPenjualan = [
    //             'no_faktur' => $this->request->getPost('no_faktur'),
    //             'tgl_penjualan' => date('Y-m-d H:m=i:s'),
    //             'grand_total' => 0,
    //             'id_user' => session()->get('id_user'),
    //             'id_pelanggan' => null,
    //         ];

    //         //2 simpan ke tabel penjualan
    //         $this->penjualan->insert($dataPenjualan);

    //         //3 nyiapin data baut nyimpen detail
    //         $dataDetailPenjualan = [
    //             'id_penjualan' => $this->penjualan->insertID(),
    //             'id_produk' => $this->request->getPost('id_produk'),
    //             'qty' => $this->request->getPost('jumlah'),
    //             'total_harga' => $hargaJual * $this->request->getPost('jumlah')
    //         ];

    //         //4 simpan ke detail penjualan
    //         $this->detailpenjualan->insert($dataDetailPenjualan);


    //         // 5 membuat session penualan
    //         session()->set('IdPenjualan', $this->penjualan->insertID());
    //     } else {

    //         //3 nyiapin data baut nyimpen detail
    //         $dataDetailPenjualan = [
    //             'id_penjualan' => session()->get('IdPenjualan'),
    //             'id_produk' => $this->request->getPost('id_produk'),
    //             'qty' => $this->request->getPost('jumlah'),
    //             'total_harga' => $hargaJual * $this->request->getPost('jumlah')
    //         ];

    //         //4 simpan ke detail penjualan
    //         $this->detailpenjualan->insert($dataDetailPenjualan);

    //         return json_encode(['status' => 'success']);
    //     }
    // }

    // public function simpanPenjualan()
    // {
    //     // ambil detail barang yang dijual
    //     $where = ['id_produk' => $this->request->getPost('id_produk')];
    //     $cekBarang = $this->produk->where($where)->findAll();
    //     $hargaJual = $cekBarang[0]['harga_jual'];

    //     if (session()->get('IdPenjualan') == null) {
    //         // 1. Menyiapkan data penjualan
    //         date_default_timezone_set('Asia/Jakarta');
    //         // Mendapatkan waktu saat ini dalam zona waktu yang telah diatur
    //         $tanggal_sekarang = date('Y-m-d H:i:s');

    //         $dataPenjualan = [
    //             'no_faktur' => $this->request->getPost('no_faktur'),
    //             'tgl_penjualan' => $tanggal_sekarang, // Perbaiki format tanggal
    //             'grand_total' => 0,
    //             'id_user' => session()->get('id_user'),
    //             'id_pelanggan' => null,
    //         ];

    //         // 2. Menyimpan data ke dalam tabel penjualan
    //         $this->penjualan->insert($dataPenjualan);

    //         // 3. Menyiapkan data untuk menyimpan detail penjualan
    //         $idPenjualanBaru = $this->penjualan->insertID();
    //         // Mendapatkan ID penjualan baru
    //         $dataDetailPenjualan = [
    //             'id_penjualan' => $idPenjualanBaru,
    //             'id_produk' => $this->request->getPost('id_produk'),
    //             'qty' => $this->request->getPost('jumlah'),
    //             'total_harga' => $hargaJual * $this->request->getPost('jumlah')
    //         ];
    //         // 4. Menyimpan data ke dalam tabel detail penjualan
    //         $this->detailpenjualan->insert($dataDetailPenjualan);

    //         // 5. Membuat session untuk penjualan baru
    //         session()->set('IdPenjualan', $idPenjualanBaru);
    //     } else {
    //         // Jika ada ID penjualan yang sudah tersimpan di sesi, gunakan ID itu untuk menyimpan detail penjualan
    //         $idPenjualanSaatIni = session()->get('IdPenjualan');

    //         $dataDetailPenjualan = [
    //             'id_penjualan' => $idPenjualanSaatIni,
    //             'id_produk' => $this->request->getPost('id_produk'),
    //             'qty' => $this->request->getPost('jumlah'),
    //             'total_harga' => $hargaJual * $this->request->getPost('jumlah')
    //         ];

    //         // Simpan data ke dalam tabel detail penjualan
    //         $this->detailpenjualan->insert($dataDetailPenjualan);
    //     }

    //     return json_encode(['status' => 'success']);
    // }

    public function simpanPenjualan()
    {
        // Ambil detail barang yang dijual
        $id_produk = $this->request->getPost('id_produk');
        $qty = $this->request->getPost('jumlah');
        $where = ['id_produk' => $id_produk];
        $barang = $this->produk->where($where)->first();

        if ($barang) {
            $hargaJual = $barang['harga_jual'];

            // Mendapatkan ID penjualan dari sesi
            $idPenjualan = session()->get('IdPenjualan');

            if ($idPenjualan == null) {
                // Jika belum ada ID penjualan dalam sesi, buat penjualan baru
                $idPenjualanBaru = $this->buatPenjualanBaru();
                $this->buatDetailPenjualan($idPenjualanBaru, $id_produk, $qty, $hargaJual);
                session()->set('IdPenjualan', $idPenjualanBaru);
            } else {
                // Jika ada ID penjualan yang tersimpan di sesi, gunakan itu
                $this->buatDetailPenjualan($idPenjualan, $id_produk, $qty, $hargaJual);
            }

            return json_encode(['status' => 'success']);
        } else {
            return json_encode(['status' => 'error', 'message' => 'Produk tidak ditemukan']);
        }
    }

    private function buatPenjualanBaru()
    {
        // Menyiapkan data penjualan baru
        date_default_timezone_set('Asia/Jakarta');
        $tanggal_sekarang = date('Y-m-d H:i:s');
        $dataPenjualan = [
            'no_faktur' => $this->request->getPost('no_faktur'),
            'tgl_penjualan' => $tanggal_sekarang,
            'grand_total' => 0,
            'id_user' => session()->get('id_user'),
            'id_pelanggan' => null,
        ];

        // Menyimpan data penjualan ke dalam tabel penjualan
        $this->penjualan->insert($dataPenjualan);

        // Mendapatkan ID penjualan baru
        return $this->penjualan->insertID();
    }

    private function buatDetailPenjualan($idPenjualan, $id_produk, $qty, $hargaJual)
    {
        // Mencari detail penjualan dengan barang yang sama dalam penjualan yang sama
        $where = [
            'id_penjualan' => $idPenjualan,
            'id_produk' => $id_produk
        ];
        $detailExisting = $this->detailpenjualan->where($where)->first();

        if ($detailExisting != null) {
            // Jika sudah ada detail penjualan dengan barang yang sama, update qty-nya
            $data = [
                'qty' => $detailExisting['qty'] + $qty,
                'total_harga' => $detailExisting['total_harga'] + ($hargaJual * $qty)
            ];
            $this->detailpenjualan->update($detailExisting['id_detail'], $data);
        } else {
            // Jika tidak ada, buat entri baru untuk detail penjualan
            $data = [
                'id_penjualan' => $idPenjualan,
                'id_produk' => $id_produk,
                'qty' => $qty,
                'total_harga' => $hargaJual * $qty
            ];
            $this->detailpenjualan->insert($data);
        }
    }


    public function simpanPembayaran()
    {
        session()->remove('IdPenjualan');
        // return redirect()->to('penjualan');
        return json_encode(['status' => 'success']);
    }

    public function prosesPembayaran($penjualanId)
    {
        // Hitung total harga semua produk
        $totalHargaSemuaProduk = $this->detailpenjualan->where('id_penjualan', $penjualanId)->sum('total_harga');

        // Update grand total dengan total harga semua produk
        $this->penjualan->update($penjualanId, ['grand_total' => $totalHargaSemuaProduk]);

        // Redirect ke halaman pembayaran
        return redirect()->to('/transaksi/pembayaran/' . $penjualanId);
    }

    public function ambilTerbaru($nomorFaktur)
    {

        $db = \Config\Database::connect();
        $penjualan = $db->table('tbl_penjualan');

        $result = $penjualan->select('tbl_penjualan.*, tbl_detail_penjualan.id_produk, tbl_detail_penjualan.id_detail, tbl_detail_penjualan.qty, tbl_detail_penjualan.total_harga, tbl_produk.nama_produk, tbl_produk.harga_jual')
            ->join('tbl_detail_penjualan', 'tbl_detail_penjualan.id_penjualan = tbl_penjualan.id_penjualan', 'left')
            ->join('tbl_produk', 'tbl_produk.id_produk = tbl_detail_penjualan.id_produk', 'left') // Join ke tabel produk
            ->where('tbl_penjualan.no_faktur', $nomorFaktur)
            ->orderBy('tbl_penjualan.id_penjualan', 'DESC')
            ->get()
            ->getResultArray();


        // Mengirim hasil query sebagai respons JSON
        return $this->response->setJSON($result);
    }

    public function hapus($id_detail)
    {
        $this->detailpenjualan->delete($id_detail);

        return json_encode(['status' => 'success']);
    }
}
