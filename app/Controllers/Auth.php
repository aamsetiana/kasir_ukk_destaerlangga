<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Email\Email;

class Auth extends BaseController
{
    public function index()
    {
        return view('auth/halaman-login');
    }

    public function prosesLogin()
    {
        helper(['form']);
        $validation = \Config\Services::validation();

        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        $messages = [
            'username' => [
                'required' => 'Masukan username',
            ],
            'password' => [
                'required' => 'Masukan password',
            ],
        ];

        // set validasi
        $validation->setRules($rules, $messages);

        // cek validasi gagal
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $user = $this->user->getUser(
            $this->request->getPost('username'),
            $this->request->getPost('password')
        );

        if (count($user) == 1) {

            $dataSession = [
                'id_user' => $user[0]['id_user'],
                'nama_pengguna' => $user[0]['nama_lengkap'],
                'username' => $user[0]['username'],
                'password' => $user[0]['password'],
                'level'    => $user[0]['level'],
                'sudahkahLogin' => true
            ];

            session()->set($dataSession);
            if (session()->get('level') == 'admin') {
                return redirect()->to('/halaman-admin');
            }
            if (session()->get('level') == 'kasir') {
                return redirect()->to('/penjualan');
            }
        } else {
            // Pesan kesalahan jika login gagal
            return redirect()->to('/')
                ->with('pesan', '<div class="alert alert-danger" role="alert">
                    Username atau Password salah silahkan coba kembali!
                  </div>')
                ->withInput(); // Untuk menyimpan input sebelumnya
        }
    }

    public function lupaPassword()
    {
        return view('auth/lupa-password');
    }

    public function resetPassword($token)
    {
        // Periksa validitas token
        $user = $this->user->where('token', $token)
            ->where('token_expiration >', date('Y-m-d H:i:s'))
            ->first();

        if (!$user) {
            return view('auth/token_invalid');
        }

        return view('auth/reset_password', ['token' => $token]);
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/');
    }
}
