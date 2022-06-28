<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class PengajuanCuti extends BaseController
{
    public function __construct()
    {
        $this->table = 'pengajuan';
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data = [
            'title' => 'Pengajuan Cuti',
            'menu' => 'cuti',
            'subMenu' => 'pengajuan',
            'roti' => [
                'App' => '',
                'Dashboard' => base_url(ADMIN_PATH . '/dashboard'),
                'Pengajuan' => '',
                'Cuti:active' => '',
            ],
        ];

        return View('admin/pengajuan/vCuti', $data);
    }

    public function buat()
    {
        $data = [
            'title' => 'Buat Pengajuan Cuti',
            'menu' => 'cuti',
            'subMenu' => 'buat-pengajuan',
            'roti' => [
                'App' => '',
                'Dashboard' => base_url(ADMIN_PATH . '/dashboard'),
                'Pengajuan' => '',
                'Cuti' => base_url(ADMIN_PATH . '/pengajuan-cuti'),
                'Form Pengajuan Cuti:active' => '',
            ],
        ];

        return View('admin/pengajuan/vBuat', $data);
    }

    public function store()
    {
        try {

            $validate = Validate([
                'jenis_cuti' => 'required|number',
                'alasan' => 'required',
                'tgl_mulai' => 'required|date',
                'tgl_selesai' => 'required|date',
                'alamat_cuti' => 'required',
                'kontak' => 'required|number',
                'approval_1' => 'required',
                'approval_2' => 'required',
                'approval_3' => 'required',
            ], [
                'user_id' => session('userId'),
                'approval_1' => false,
                'approval_2' => false,
                'approval_3' => false,
                'lama' => count(getBetweenDates(Input_('tgl_mulai'), Input_('tgl_selesai')))
            ]);

            $tglMulai = date('Y-m-d', strtotime(Input_('tgl_mulai')));
            $tglSelesai = date('Y-m-d', strtotime(Input_('tgl_selesai')));

            if ($tglMulai > $tglSelesai) {
                $validate = ValidateAdd($validate, 'tgl_selesai', 'Tanggal Selesai tidak boleh kurang dari tanggal mulai');
            }

            if (!$validate['success']) throw new \Exception("Isi form dengan benar");

            if (!Create($this->table, $validate['data'])) throw new \Exception("Gagal mengirim pengajuan");

            $pengajuanId = $this->db->insertID();
            foreach ($_REQUEST as $key => $value) {
                if (substr($key, 0, 9) == 'approval_') {
                    $approval[] = [
                        'urut' => substr($key, 9, 1),
                        'pengajuan_id' => $pengajuanId,
                        'user_id' => $this->db->table('users')->select('id')->where([EncKey('id') => $value])->get()->getRow()->id
                    ];
                }
            }

            // Print_($approval, true);

            if (!Create('approval_pengajuan', $approval)) throw new \Exception("Gagal menambah approval");

            $message = [
                'status' => 'ok',
                'message' => "Berhasil membuat pengajuan",
                'pengajuanId' => $pengajuanId = $this->db->insertID()
            ];
        } catch (\Throwable | \Exception $error) {
            $message = [
                'status' => 'fail',
                'message' => $error->getMessage()
            ];
        } finally {
            $message = array_merge($message, ['validate' => $validate]);
            echo json_encode($message);
        }
    }

    public function approval()
    {
        $data = [
            'title' => 'Approval Pengajuan Cuti',
            'menu' => 'cuti',
            'subMenu' => 'approval',
            'roti' => [
                'App' => '',
                'Dashboard' => base_url(ADMIN_PATH . '/dashboard'),
                'Pengajuan' => '',
                'Approval:active' => '',
            ],
        ];

        return View('admin/pengajuan/vApproval', $data);
    }

    public function viewPengajuan($id)
    {
        $pengajuanData = $this->db->table($this->table . ' pe')
            ->select('u.nama, u.nip')
            ->join('users u', 'u.id = pe.user_id')
            ->where([EncKey('pe.id') => $id])->get()->getRow();
        $nama = $pengajuanData->nama ?? "-";
        $nip = $pengajuanData->nip ?? "-";
        $data = [
            'title' => "Pengajuan $nama",
            'menu' => 'cuti',
            'subMenu' => 'pengajuan',
            'roti' => [
                'App' => '',
                'Dashboard' => base_url(ADMIN_PATH . '/dashboard'),
                'Pengajuan' => '',
                'Cuti' => base_url(ADMIN_PATH . '/pengajuan-cuti'),
                "$nip - $nama:active" => '',
            ],
            'pengajuanId' => $id,
            'nama' => $nama,
            'nip' => $nip
        ];

        return View('admin/pengajuan/vView', $data);
    }

    public function printPengajuan($id)
    {
        $pengajuanData = $this->db->table($this->table . ' pe')
            ->select('u.nama, u.nip, pe.approval')
            ->join('users u', 'u.id = pe.user_id')
            ->where([EncKey('pe.id') => $id])->get()->getRow();
        $nama = $pengajuanData->nama ?? "-";
        $nip = $pengajuanData->nip ?? "-";
        $data = [
            'title' => "Print Pengajuan $nama",
            'pengajuanId' => $id,
            'nama' => $nama,
            'nip' => $nip
        ];

        if ($pengajuanData->approval != '1') return "Belum tersedia";
        return View('admin/pengajuan/vPrint', $data);
    }

    public function viewPengajuanApproval($id)
    {
        $pengajuanData = $this->db->table('approval_pengajuan ap')
            ->select('u.nama, u.nip, pe.id id_pengajuan')
            ->join('pengajuan pe', 'pe.id = ap.pengajuan_id')
            ->join('users u', 'u.id = pe.user_id')
            ->where([EncKey('ap.id') => $id])->get()->getRow();
        // Print_($pengajuanData, true);
        $nama = $pengajuanData->nama ?? "-";
        $nip = $pengajuanData->nip ?? "-";
        $allowAcc = $this->db->table('approval_pengajuan')
            ->select('id, user_id')
            ->orderBy('urut', 'asc')
            ->where('status', '0')
            ->where('pengajuan_id', $pengajuanData->id_pengajuan)
            ->get()->getRow();
        $data = [
            'title' => "Pengajuan $nama",
            'menu' => 'cuti',
            'subMenu' => 'approval',
            'roti' => [
                'App' => '',
                'Dashboard' => base_url(ADMIN_PATH . '/dashboard'),
                'Pengajuan' => '',
                'Approval' => base_url(ADMIN_PATH . '/pengajuan-cuti/approval'),
                "$nip - $nama:active" => '',
            ],
            'pengajuanId' => Enc($pengajuanData->id_pengajuan),
            'approvalId' => $id,
            'nama' => $nama,
            'nip' => $nip,
            'allowAcc' => $allowAcc
        ];

        return View('admin/pengajuan/vViewApproval', $data);
    }

    public function signPengajuanApproval($id)
    {
        $pengajuanData = $this->db->table('approval_pengajuan ap')
            ->select('u.nama, u.nip, pe.id id_pengajuan')
            ->join('pengajuan pe', 'pe.id = ap.pengajuan_id')
            ->join('users u', 'u.id = pe.user_id')
            ->where([EncKey('ap.id') => $id])->get()->getRow();
        // Print_($pengajuanData, true);
        $nama = $pengajuanData->nama ?? "-";
        $nip = $pengajuanData->nip ?? "-";
        $data = [
            'title' => "Pengajuan $nama",
            'menu' => 'cuti',
            'subMenu' => 'approval',
            'roti' => [
                'App' => '',
                'Dashboard' => base_url(ADMIN_PATH . '/dashboard'),
                'Pengajuan' => '',
                'Approval' => base_url(ADMIN_PATH . '/pengajuan-cuti/approval'),
                "$nip - $nama:active" => '',
            ],
            'pengajuanId' => Enc($pengajuanData->id_pengajuan),
            'approvalId' => $id,
            'nama' => $nama,
            'nip' => $nip
        ];

        return View('admin/pengajuan/vSign', $data);
    }

    public function approvalSet()
    {
        try {
            if (!Update('approval_pengajuan', ['status' => Input_('status'), 'signature' => Input_('signature'), 'alasan' => Input_('reason')], [EncKey('id') => Input_('approval')])) throw new \Exception("Gagal merubah status !", 1);
            $idPengajuan = $this->db->table('approval_pengajuan')->where([EncKey('id') => Input_('approval')])->get()->getRow()->pengajuan_id;
            if (Input_('status') != '1') {
                // Update('approval_pengajuan', ['status' => Input_('status')], ['pengajuan_id' => $idPengajuan]);
                $this->db->table('approval_pengajuan')->set(['status' => Input_('status')])->where(['pengajuan_id' => $idPengajuan])->update();
                Update('pengajuan', ['approval' => Input_('status')], ['id' => $idPengajuan]);
            }

            if (count($this->db->table('approval_pengajuan')->where(['pengajuan_id' => $idPengajuan, 'status' => '1'])->get()->getResult()) == 3) {
                Update('pengajuan', ['approval' => '1'], ['id' => $idPengajuan]);
            }

            $response = [
                'status' => 'ok',
                'message' => 'Berhasil merubah status'
            ];
        } catch (\Throwable | \Exception $error) {
            $response = [
                'status' => 'fail',
                'message' => $error->getMessage()
            ];
        } finally {
            echo json_encode($response);
        }
    }
}