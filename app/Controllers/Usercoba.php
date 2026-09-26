<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // List user
    public function index()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard');
        }

        $data['users'] = $this->userModel->findAll();
        return view('user/index', $data);
    }

    // Form tambah
    public function create()
    {
        return view('user/create');
    }

    // Simpan user baru
    public function store()
    {
        $this->userModel->save([
            'username' => $this->request->getPost('username'),
            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),
            'role' => $this->request->getPost('role')
        ]);

        return redirect()->to('/user')->with('success', 'User berhasil ditambahkan');
    }
}