<?php

namespace App\Modules\User\Controllers;

use App\Controllers\BaseController;
use App\Modules\Auth\Models\UserModel;

class Profil extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function index()
    {
        if(session()->get('role') !== 'user'){
            return redirect()->to('/admin/dashboard');
        }

        $data['user'] = $this->model
            ->find(session()->get('user_id'));

        return view('user/profil/index', $data);
        
    }

public function update()
{
    $id = session()->get('user_id');

    $validation = \Config\Services::validation();

    $rules = [
        'username' => 'required',
        'email' => "required|valid_email|is_unique[users.email,id,{$id}]"
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()
            ->withInput()
            ->with('error', 'Email sudah digunakan user lain');
    }

    $data = [
        'username' => $this->request->getPost('username'),
        'email'    => $this->request->getPost('email'),
    ];

    $file = $this->request->getFile('foto');

    if ($file && $file->isValid() && !$file->hasMoved()) {
        $newName = $file->getRandomName();
        $file->move(FCPATH . 'uploads/foto', $newName);
        $data['foto'] = $newName;
    }

    $db = \Config\Database::connect();
    $db->table('users')
       ->where('id', $id)
       ->update($data);

    return redirect()->back()->with('success','Profil berhasil diupdate');
}
}