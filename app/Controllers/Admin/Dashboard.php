<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'menu' => 'dashboard',
            'roti' => [
                'App' => '',
                'Dashboard:active' => '',
            ]
        ];
        return View('admin/dashboard', $data);
    }
}