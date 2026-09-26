<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Modules\Auth\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        $data['title'] = 'Manajemen User';

        return view('admin/user/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah User';
        return view('admin/user/create', $data);
    }

    public function store()
    {
        $model = new UserModel();

        $model->save([
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role'     => $this->request->getPost('role')
        ]);

        return redirect()->to('/admin/user')->with('success', 'User berhasil ditambahkan');
    }

    public function delete($id)
    {
        $model = new UserModel();
        $model->delete($id);

        return redirect()->back()->with('success', 'User berhasil dihapus');
    }
}