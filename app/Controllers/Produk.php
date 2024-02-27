<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Produk extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'List Produk',
            'judulHalaman' => 'List Produk',
            'listProduk' => $this->produk->getProduk(),
        ];

        return view('produk/list-produk', $data);
    }

    public function tambahProduk()
    {
        $data = [
            'title' => 'Tambah Data',
            'judulHalaman' => 'Tambah Data Produk',
            'listSatuan' => $this->satuan->findAll(),
            'listKategori' => $this->kategori->findAll(),
            'kodeProduk' => $this->produk->generateProductCode()
        ];
        return view('produk/tambah-produk', $data);
    }

    public function prosesSimpan()
    {
        helper(['form']);
        $validation = \Config\Services::validation();

        $rules = [
            'kodeProduk' => 'required|is_unique[tbl_produk.kode_produk]',
            'namaProduk' => 'required|is_unique[tbl_produk.nama_produk]',
            'hargaBeli' => 'required',
            'hargaJual' => 'required|checkHargaValid[hargaBeli,hargaJual]',
            'stok' => 'required|greater_than[0]',
            'satuan' => 'required',
            'kategori' => 'required',
        ];

        $messages = [
            'kodeProduk' => [
                'required' => 'Tidak boleh kosong!',
                'is_unique' => 'Kode produk sudah ada!',
            ],
            'namaProduk' => [
                'required' => 'Nama produk tidak boleh kosong!',
                'is_unique' => 'Nama produk sudah ada!'
            ],
            'hargaBeli' => [
                'required' => 'Harga beli tidak boleh kosong!',
            ],
            'hargaJual' => [
                'required' => 'Harga jual tidak boleh kosong!',
                'checkHargaValid' => 'Harga jual tidak boleh lebih kecil dari harga beli!'
            ],
            'stok' => [
                'required' => 'Stok tidak boleh kosong!',
                'greater_than' => 'Stok harus lebih besar dari 0!'
            ],
            'satuan' => [
                'required' => 'Satuan tidak boleh kosong!',
            ],
            'kategori' => [
                'required' => 'kategori tidak boleh kosong!',
            ],
        ];

        // set validasi
        $validation->setRules($rules, $messages);

        // cek validasi gagal
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $data = [
            'kode_produk' => $this->request->getPost('kodeProduk'),
            'nama_produk' => $this->request->getPost('namaProduk'),
            'harga_beli' => str_replace('.', '', $this->request->getPost('hargaBeli')),
            'harga_jual' => str_replace('.', '', $this->request->getPost('hargaJual')),
            'stok' => str_replace('.', '', $this->request->getPost('stok')),
            'id_satuan' => $this->request->getPost('satuan'),
            'id_kategori' => $this->request->getPost('kategori'),
        ];

        // var_dump($data);

        $this->produk->insert($data);

        return redirect()->to('list-produk')->with('success', '<div id="alert" class="alert alert-success" role="alert">
        Data produk berhasil ditambah
      </div>');
    }

    public function editProduk($id)
    {
        $data = [
            'title' => 'Edit Data',
            'judulHalaman' => 'Edit Data Produk',
            'listSatuan' => $this->satuan->findAll(),
            'listKategori' => $this->kategori->findAll(),
            'listProduk' => $this->produk->getProdukByid($id)
        ];
        return view('produk/edit-produk', $data);
    }

    public function prosesEdit($id)
    {
        helper(['form']);
        $validation = \Config\Services::validation();

        $rules = [
            'kodeProduk' => 'required|is_unique[tbl_produk.kode_produk,id_produk,' . $id . ']',
            'namaProduk' => 'required|is_unique[tbl_produk.kode_produk,id_produk,' . $id . ']',
            'hargaBeli' => 'required',
            'hargaJual' => 'required',
            'stok' => 'required',
            'satuan' => 'required',
            'kategori' => 'required',
        ];

        $messages = [
            'kodeProduk' => [
                'required' => 'Tidak boleh kosong!',
                'is_unique' => 'Kode produk sudah ada!'
            ],
            'namaProduk' => [
                'required' => 'Nama produk tidak boleh kosong!',
                'is_unique' => 'Nama produk sudah ada!'
            ],
            'hargaBeli' => [
                'required' => 'Harga beli tidak boleh kosong!',
            ],
            'hargaJual' => [
                'required' => 'Harga jual tidak boleh kosong!',
            ],
            'stok' => [
                'required' => 'Stok tidak boleh kosong!',
            ],
            'satuan' => [
                'required' => 'Satuan tidak boleh kosong!',
            ],
            'kategori' => [
                'required' => 'kategori tidak boleh kosong!',
            ],
        ];

        // set validasi
        $validation->setRules($rules, $messages);

        // cek validasi gagal
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        $data = [
            'kode_produk' => $this->request->getPost('kodeProduk'),
            'nama_produk' => $this->request->getPost('namaProduk'),
            'harga_beli' => str_replace('.', '', $this->request->getPost('hargaBeli')),
            'harga_jual' => str_replace('.', '', $this->request->getPost('hargaJual')),
            'stok' => str_replace('.', '', $this->request->getPost('stok')),
            'id_satuan' => $this->request->getPost('satuan'),
            'id_kategori' => $this->request->getPost('kategori'),
            'diskon' => str_replace('%', '', $this->request->getPost('diskon'))
        ];

        // var_dump($data);

        $this->produk->update($id, $data);

        return redirect()->to('list-produk')->with('success', '<div class="alert alert-success" role="alert">
            Data berhasil diedit
        </div>');
    }

    public function hapusProduk($id)
    {

        $this->produk->delete($id);

        return redirect()->to('list-produk')->with('success', '<div id="alert" class="alert alert-success" role="alert" style="opacity: 0;">
        Data produk berhasil dihapus
      </div><style>@keyframes fadeOut { 0% { opacity: 1; } 100% { opacity: 0; } }</style><script>setTimeout(function() { document.getElementById("alert").style.opacity = "1"; }, 500); setTimeout(function() { document.getElementById("alert").style.animation = "fadeOut 1s forwards"; setTimeout(function() { document.getElementById("alert").remove(); }, 2000); }, 3000);</script>');
    }

    public function cariProduk()
    {
        $keyword = $this->request->getPost('cariProduk');
        $data = $this->produk->cariProduk($keyword);
        return $this->response->setJSON($data);
    }

    public function getInfoProduk()
    {
        $keyword = $this->request->getPost('cariProduk');
        $data = $this->produk->getInfo($keyword);
        return $this->response->setJSON($data);
    }
}
