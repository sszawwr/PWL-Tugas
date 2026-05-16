<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    function __construct()
    {
        helper('form');
    }

    public function login()
    {
        if ($this->request->getPost()) {

            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            $dataUser = [
                'username' => 'Annisa Salwa',
                'password' => password_hash('1234567', PASSWORD_DEFAULT),
                'role' => 'admin'
            ];

            if ($username == $dataUser['username']) {

                // cek password
                if (password_verify($password, $dataUser['password'])) {

                    session()->set([
                        'username' => $dataUser['username'],
                        'role' => $dataUser['role'],
                        'email' => '111202415962@mhs.dinus.ac.id',
                        'login_time' => date('Y-m-d H:i:s'),
                        'isLoggedIn' => TRUE
                    ]);

                    return redirect()->to('/profile');

                } else {

                    session()->setFlashdata('failed', 'Username & Password Salah');
                    return redirect()->back();
                }

            } else {

                session()->setFlashdata('failed', 'Username Tidak Ditemukan');
                return redirect()->back();
            }

        } else {

            return view('login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}