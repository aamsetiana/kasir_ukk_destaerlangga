<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Pengguna extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'List Pengguna',
            'judulHalaman' => 'List Pengguna',
            'listPengguna' => $this->user->findAll()
        ];

        return view('pengguna/list-pengguna', $data);
    }

    public function tambahPengguna()
    {
        $data = [
            'title' => 'Tambah Pengguna',
            'judulHalaman' => 'Tambah Pengguna',
            'enumValues' => $this->user->getEnumValues()
        ];

        return view('pengguna/tambah-pengguna', $data);
    }

    public function prosesTambah()
    {
        helper(['form']);
        $validation = \Config\Services::validation();

        $rules = [
            'nama_lengkap' => 'required',
            'username' => 'required|is_unique[tbl_user.username]',
            'password' => 'required',
            'level' => 'required',
        ];

        $messages = [
            'nama_lengkap' => [
                'required' => 'Tidak boleh kosong!',
            ],
            'username' => [
                'required' => 'Tidak boleh kosong!',
                'is_unique' => 'username sudah ada silahkan gunakan yang lain',
            ],
            'password' => [
                'required' => 'Tidak boleh kosong!',
            ],
            'level' => [
                'required' => 'Tidak boleh kosong!',
            ],
        ];

        // set validasi
        $validation->setRules($rules, $messages);

        // cek validasi gagal
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'username' => $this->request->getPost('username'),
            'password' => md5($this->request->getPost('password')),
            'level' => $this->request->getPost('level'),
        ];

        $this->user->insert($data);

        return redirect()->to('list-pengguna')->with('success', '<div class="alert alert-success" role="alert">
            Data berhasil ditambah
        </div>');
    }

    public function editPengguna($id)
    {
        $data = [
            'title' => 'Edit Pengguna',
            'judulHalaman' => 'Edit Pengguna',
            'enumValues' => $this->user->getEnumValues(),
            'listPengguna' => $this->user->find($id)
        ];

        return view('pengguna/edit-pengguna', $data);
    }

    public function prosesEdit($id)
    {
        $originalPassword = $this->user->find($id);
        
        helper(['form']);
        $validation = \Config\Services::validation();

        $rules = [
            'nama_lengkap' => 'required',
            'username' => 'required|is_unique[tbl_user.username,id_user,' . $id . ']',
            'password' => 'required',
            'level' => 'required',
        ];

        $messages = [
            'nama_lengkap' => [
                'required' => 'Tidak boleh kosong!',
            ],
            'username' => [
                'required' => 'Tidak boleh kosong!',
                'is_unique' => 'username sudah ada silahkan gunakan yang lain',
            ],
            'password' => [
                'required' => 'Tidak boleh kosong!',
            ],
            'level' => [
                'required' => 'Tidak boleh kosong!',
            ],
        ];

        // set validasi
        $validation->setRules($rules, $messages);

        // cek validasi gagal
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'username' => $this->request->getPost('username'),
            'password' => ($this->request->getPost('password') ? md5($this->request->getPost('password')) : $originalPassword['password']),
            'level' => $this->request->getPost('level')
        ];
        
        $this->user->update($id, $data);

        return redirect()->to('list-pengguna')->with('success', '<div class="alert alert-success" role="alert">
            Data berhasil diubah
        </div>');
    }

    public function hapusPengguna($id)
    {
        $this->user->delete($id);

        return redirect()->to('list-pengguna')->with('success', '<div class="alert alert-success" role="alert">
            Data berhasil dihapus
        </div>');
    }
}
