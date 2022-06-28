<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {

        $cuti = [
            [
                'nama' => 'Sisa Cuti Tahunan',
                'jumlah' => 12
            ],
            [
                'nama' => 'Besar',
                'jumlah' => 0
            ],
            [
                'nama' => 'Sakit',
                'jumlah' => 0
            ],
            [
                'nama' => 'Melahirkan',
                'jumlah' => 0
            ],
            [
                'nama' => 'Karena Alasan Penting',
                'jumlah' => 0
            ],
            [
                'nama' => 'Diluar Tanggungan Negara',
                'jumlah' => 0
            ]
        ];

        $data = [
            'title' => 'Dashboard',
            'menu' => 'dashboard',
            'roti' => [
                'App' => '',
                'Dashboard:active' => '',
            ],
            'cuti' => $cuti
        ];
        return View('admin/dashboard', $data);
    }
}