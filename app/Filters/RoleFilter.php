<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $role = session()->get('role');

        if ($role === 'user') {

            // Blok semua POST (store, update, delete)
            if ($request->getMethod() === 'post') {
                return redirect()->to('/dashboard')
                    ->with('error', 'User hanya bisa melihat data.');
            }

            // Blok akses URL create/edit/delete
            $segment = service('uri')->getSegment(3);

            if (in_array($segment, ['create', 'edit', 'delete', 'update', 'store'])) {
                return redirect()->to('/dashboard')
                    ->with('error', 'User hanya bisa melihat data.');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}