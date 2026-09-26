<?php

namespace App\Controllers;

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
        if (!session()->get('user_id')) {
            return redirect()->to('/login');
        }

        $data['user'] = $this->model
            ->find(session()->get('user_id'));

        return view('profil/index', $data);
    }

    public function update()
    {
        $id = session()->get('user_id');

        $this->model->update($id, [
            'username' => $this->request->getPost('username'),
        ]);

        return redirect()->back()->with('success', 'Profil berhasil diupdate');
    }
}