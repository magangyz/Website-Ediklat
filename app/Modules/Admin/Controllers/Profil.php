<?php

namespace App\Modules\Admin\Controllers;

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
        $data['user'] = $this->model
            ->find(session()->get('user_id'));

        return view('admin/profil/index', $data);
    }

    public function update()
{
    $id = session()->get('user_id');

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

    // UPDATE SESSION
    session()->set([
        'username' => $data['username'],
        'email'    => $data['email']
    ]);

    return redirect()->back()->with('success','Profil berhasil diupdate');
}
}