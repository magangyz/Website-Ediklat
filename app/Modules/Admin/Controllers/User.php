<?php

namespace App\Modules\Admin\Controllers;

use App\Controllers\BaseController;
use App\Modules\Auth\Models\UserModel;

class User extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    // ================= LIST =================
    public function index()
    {
        $data = [
            'users'      => $this->model->findAll(),
            'totalUsers' => $this->model->countAll(),

            'totalAdmin' => $this->model
                                ->where('role', 'admin')
                                ->countAllResults(),

            'totalUser'  => $this->model
                                ->where('role', 'user')
                                ->countAllResults(),
        ];

        return view('admin/user/index', $data);
    }

    // ================= CREATE =================
    public function create()
    {
        return view('admin/user/create');
    }

    public function store()
    {
        $this->model->save([
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),
            'role' => $this->request->getPost('role')
        ]);

        return redirect()->to('/admin/user');
    }

    // ================= EDIT =================
    public function edit($id)
    {
        $data['user'] = $this->model->find($id);

        return view('admin/user/edit', $data);
    }

    public function update($id)
    {
        $this->model->update($id, [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'role'     => $this->request->getPost('role')
        ]);

        return redirect()->to('/admin/user')
            ->with('success','User berhasil diupdate');
    }
    // ================= DELETE =================
    public function delete($id)
    {
        $this->model->delete($id);

        return redirect()->to('/admin/user')
            ->with('success', 'User berhasil dihapus');
    }
}