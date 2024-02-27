<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Halaman Admin',
            'judulHalaman' => 'Dashboard Admin',
            'totalPengguna' => $this->user->getTotalPengguna(),
            'totalProduk' => $this->produk->getTotalProduk(),
            'pendapatanHariIni' => $this->detailpenjualan->pendapatanHarian(),
            'pendapatanBulanIni' => $this->detailpenjualan->pendapatanBulanan(),
            'chartData' => $this->detailpenjualan->getMonthlyIncome()
        ];
        // ];

        return view('admin/dashboard', $data);
    }
}
