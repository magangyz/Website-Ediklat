<?php

namespace App\Modules\User\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        if(session()->get('role') !== 'user'){
            return redirect()->to('/admin/dashboard');
        }

        return view('/user/dashboard');
    }
}