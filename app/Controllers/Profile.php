<?php

namespace App\Controllers;

class Profile extends BaseController
{
    public function index()
{
    $data = [
        'username'   => session()->get('username'),
        'role'       => session()->get('role'),
        'email'      => session()->get('email'),
        'login_time' => session()->get('login_time'),
        'status'     => session()->get('isLoggedIn') ? 'Sudah Login' : 'Belum Login'
    ];

    return view('Components/header')
        . view('Components/sidebar')
        . view('profile', $data)
        . view('Components/footer');
}
}