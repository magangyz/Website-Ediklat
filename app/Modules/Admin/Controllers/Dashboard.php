<?php

namespace App\Modules\Admin\Controllers;

use App\Controllers\BaseController;
use App\Modules\Auth\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        if(session()->get('role') !== 'admin'){
            return redirect()->to('/user/dashboard');
        }

        $model = new UserModel();

        $data = [
            'totalUsers' => $model->countAll(),
            'totalAdmin' => $model->where('role','admin')->countAllResults(),
            'totalUser'  => $model->where('role','user')->countAllResults(),
        ];

            return view('/admin/dashboard', $data);
    }
}