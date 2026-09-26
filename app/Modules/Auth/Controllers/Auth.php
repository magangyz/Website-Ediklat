<?php

namespace App\Modules\Auth\Controllers;

use App\Controllers\BaseController;
use App\Modules\Auth\Models\UserModel;

class Auth extends BaseController
{
    public function login()
{
    return view('\App\Modules\Auth\Views\login');
}

public function register()
{
    return view('\App\Modules\Auth\Views\register');
}

    public function processLogin()
    {
        $session = session();
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {

        $session = session();

        $session->set([
            'user_id'   => $user['id'],
            'username'  => $user['username'],
            'role'      => $user['role'],
            'logged_in' => true
        ]);

        // 🔥 BEDAKAN BERDASARKAN ROLE
        if($user['role'] == 'admin'){
        return redirect()->to('/admin/dashboard');
        }else{
            return redirect()->to('/user/dashboard');
        }
        }   

        return redirect()->back()->with('error', 'Email atau password salah');
    }

   public function processRegister()
    {
        $model = new UserModel();

        // Validasi dulu
        if (!$this->validate([
            'username' => 'required|min_length[3]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]'
        ])) {
            return redirect()->back()
                ->with('error','Data tidak valid atau email sudah terdaftar');
        }

        $model->insert([
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),
            'role' => 'user'
        ]);

        return redirect()->to('/login')
            ->with('success','Register berhasil, silakan login');
            
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}