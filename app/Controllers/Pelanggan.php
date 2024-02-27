<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Pelanggan extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'List Pelanggan',
            'judulHalaman' => 'List Pelanggan',
            'listPelanggan' => $this->pelanggan->findAll()
        ];

        return view('pelanggan/list-pelanggan', $data);
    }

    public function tambahPelanggan()
    {
        $data = [
            'title' => 'Tambah Pelanggan',
            'judulHalaman' => 'Tambah Pelanggan',
        ];

        return view('pelanggan/tambah-pelanggan', $data);
    }

    public function prosesTambah()
    {
        helper(['form']);
        $validation = \Config\Services::validation();

        $rules = [
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|is_unique[tbl_pelanggan.no_telp]',
        ];

        $messages = [
            'nama_lengkap' => [
                'required' => 'Tidak boleh kosong!',
            ],
            'alamat' => [
                'required' => 'Tidak boleh kosong!',
            ],
            'no_telp' => [
                'required' => 'Tidak boleh kosong!',
                'is_unique' => 'no telepon sudah ada silahkan gunakan yang lain',
            ],
        ];

        // set validasi
        $validation->setRules($rules, $messages);

        // cek validasi gagal
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'nama_pelanggan' => $this->request->getPost('nama_lengkap'),
            'alamat' => $this->request->getPost('alamat'),
            'no_telp' => $this->request->getPost('no_telp'),
        ];

        // var_dump($data);

        $this->pelanggan->insert($data);

        return redirect()->to('list-pelanggan')->with('success', '<div class="alert alert-success" role="alert">
            Data berhasil ditambah
        </div>');
    }

    public function editPelanggan($id)
    {
        $data = [
            'title' => 'Edit Pelanggan',
            'judulHalaman' => 'Edit Pelanggan',
            'listPelanggan' => $this->pelanggan->find($id)
        ];

        return view('pelanggan/edit-pelanggan', $data);
    }

    public function prosesEdit($id)
    {
            helper(['form']);
            $validation = \Config\Services::validation();
    
            $rules = [
                'nama_lengkap' => 'required',
                'alamat' => 'required',
                'no_telp' => 'required|is_unique[tbl_pelanggan.no_telp,id_pelanggan,' . $id . ']',
            ];
    
            $messages = [
                'nama_lengkap' => [
                    'required' => 'Tidak boleh kosong!',
                ],
                'alamat' => [
                    'required' => 'Tidak boleh kosong!',
                ],
                'no_telp' => [
                    'required' => 'Tidak boleh kosong!',
                    'is_unique' => 'no telepon sudah ada silahkan gunakan yang lain',
                ],
            ];
    
            // set validasi
            $validation->setRules($rules, $messages);
    
            // cek validasi gagal
            if (!$validation->withRequest($this->request)->run()) {
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());
            }
    
            $data = [
                'nama_pelanggan' => $this->request->getPost('nama_lengkap'),
                'alamat' => $this->request->getPost('alamat'),
                'no_telp' => $this->request->getPost('no_telp'),
            ];
    
            // var_dump($data);
    
            $this->pelanggan->update($id,$data);
    
            return redirect()->to('list-pelanggan')->with('success', '<div class="alert alert-success" role="alert">
                Data berhasil diedit
            </div>');
    }

    public function hapusPelanggan($id)
    {

        $this->pelanggan->delete($id);

        return redirect()->to('list-pelanggan')->with('success', '<div class="alert alert-success" role="alert">
        Data produk berhasil dihapus
      </div>');
    }

    public function cariPelanggan()
    {
        $keyword = $this->request->getPost('cariPelanggan');
        $data = $this->pelanggan->cariPelanggan($keyword);
        return $this->response->setJSON($data);
    }

    public function getInfoPelanggan()
    {
        $keyword = $this->request->getPost('cariPelanggan');
        $data = $this->pelanggan->getInfo($keyword);
        return $this->response->setJSON($data);
    }
}
