<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Kategori extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'List Kategori',
            'judulHalaman' => 'List Kategori',
            'listKategori' => $this->kategori->findAll()
        ];

        return view('kategori/list-kategori', $data);
    }

    public function tambahkategori()
    {
        $data = [
            'title' => 'Tambah Kategori',
            'judulHalaman' => 'Tambah Kategori',
        ];

        return view('kategori/tambah-kategori', $data);
    }

    public function prosesSimpan()
    {
        helper(['form']);
        $validation = \Config\Services::validation();

        $rules = [
            'kategori' => 'required|is_unique[tbl_kategori.nama_kategori]',
        ];

        $messages = [
            'kategori' => [
                'required' => 'Tidak boleh kosong!',
                'is_unique' => 'Nama kategori sudah ada',
            ],
        ];

        // set validasi
        $validation->setRules($rules, $messages);

        // cek validasi gagal
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'nama_kategori' => $this->request->getPost('kategori'),
        ];

        $this->kategori->insert($data);

        return redirect()->to('list-kategori')->with('success', '<div class="alert alert-success" role="alert">
            Data berhasil ditambah
        </div>');
    }

    public function editKategori($id)
    {
        $data = [
            'title' => 'Edit Data',
            'judulHalaman' => 'Edit Data Kategori',
            'listKategori' => $this->kategori->find($id)
        ];
        return view('kategori/edit-kategori', $data);
    }

    public function prosesEdit($id)
    {
        helper(['form']);
        $validation = \Config\Services::validation();

        $rules = [
            'kategori' => 'required|is_unique[tbl_kategori.nama_kategori,id_kategori,' . $id . ']'
        ];

        $messages = [
            'kategori' => [
                'required' => 'Tidak boleh kosong!',
                'is_unique' => 'Nama kategori sudah ada',
            ],
        ];

        // set validasi
        $validation->setRules($rules, $messages);

        // cek validasi gagal
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'nama_kategori' => $this->request->getPost('kategori'),
        ];

        $this->kategori->update($id, $data);

        return redirect()->to('list-kategori')->with('success', '<div class="alert alert-success" role="alert">
            Data berhasil diedit
        </div>');
    }

    public function hapusKategori($id)
    {
        $this->kategori->delete($id);

        return redirect()->to('list-kategori')->with('success', '<div class="alert alert-success" role="alert">
        Data berhasil dihapus
    </div>');
    }

    public function cek_keterkaitan_data($id)
    {
        // Lakukan pemeriksaan keterkaitan data
        $keterkaitan = $this->kategori->cekKeterkaitan($id);

        // Kirim respon ke AJAX
        return $this->response->setJSON(['has_keterkaitan' => $keterkaitan]);
    }

}
