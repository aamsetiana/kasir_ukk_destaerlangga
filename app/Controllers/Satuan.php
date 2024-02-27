<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Satuan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'List Satuan',
            'judulHalaman' => 'List Satuan',
            'listSatuan' => $this->satuan->findAll(),
        ];

        return view('satuan/list-satuan', $data);
    }

    public function tambahSatuan()
    {
        $data = [
            'title' => 'Tambah Data',
            'judulHalaman' => 'Tambah Data Satuan'
        ];
        return view('satuan/tambah-satuan', $data);
    }

    public function prosesSimpan()
    {
        helper(['form']);
        $validation = \Config\Services::validation();

        $rules = [
            'satuan' => 'required|is_unique[tbl_satuan.nama_satuan]',
        ];

        $messages = [
            'satuan' => [
                'required' => 'Tidak boleh kosong!',
                'is_unique' => 'Nama satuan sudah ada',
            ],
        ];

        // set validasi
        $validation->setRules($rules, $messages);

        // cek validasi gagal
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'nama_satuan' => $this->request->getPost('satuan'),
        ];

        $this->satuan->insert($data);

        return redirect()->to('list-satuan')->with('success', '<div class="alert alert-success" role="alert">
            Data berhasil ditambah
        </div>');
    }

    public function editSatuan($id)
    {
        $data = [
            'title' => 'Edit Data',
            'judulHalaman' => 'Edit Data Satuan',
            'listSatuan' => $this->satuan->find($id)
        ];
        return view('satuan/edit-satuan', $data);
    }

    public function prosesEdit($id)
    {
        helper(['form']);
        $validation = \Config\Services::validation();

        $rules = [
            'satuan' => 'required|is_unique[tbl_satuan.nama_satuan,id_satuan,' . $id . ']'
        ];

        $messages = [
            'satuan' => [
                'required' => 'Tidak boleh kosong!',
                'is_unique' => 'Nama satuan sudah ada',
            ],
        ];

        // set validasi
        $validation->setRules($rules, $messages);

        // cek validasi gagal
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'nama_satuan' => $this->request->getPost('satuan'),
        ];

        $this->satuan->update($id, $data);

        return redirect()->to('list-satuan')->with('success', '<div class="alert alert-success" role="alert">
            Data berhasil diedit
        </div>');
    }

    public function hapusSatuan($id)
    {

        $this->satuan->delete($id);

        return redirect()->to('list-satuan')->with('pesan', '<div class="alert alert-success" role="alert">
        Data pegawai berhasil dihapus
      </div>');
    }

    public function cek_keterkaitan_data($id)
    {
        // Lakukan pemeriksaan keterkaitan data
        $keterkaitan = $this->satuan->cekKeterkaitan($id);

        // Kirim respon ke AJAX
        return $this->response->setJSON(['has_keterkaitan' => $keterkaitan]);
    }
}
