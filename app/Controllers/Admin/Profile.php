<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Profile extends BaseController
{
    public function __construct()
    {
        $this->table = 'users';
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data = [
            'title' => 'Profile',
            'menu' => 'profile',
            'roti' => [
                'App' => '',
                'Dashboard' => base_url(ADMIN_PATH . '/dashboard'),
                'Profile' => '',
                session('name') . ':active' => '',
            ],
        ];

        return View('admin/users/vProfile', $data);
    }

    public function update()
    {
        try {
            $validate = Validate([
                'nama' => 'required|min:2|max:50|name',
                'email' => 'required|email',
                'nip' => 'number',
            ]);

            if (!$validate['success']) {
                throw new \Exception('gagal memproses data');
            }

            if (!Update($this->table, $validate['data'], ['id' => session('userId')])) throw new \Exception('Tidak ada perubahan');
            session()->set([
                'nama' => Input_('nama'),
                'email' => Input_('email'),
            ]);
            $result = [
                'status' => 'ok',
                'message' => 'Berhasil merubah pengaturan',
            ];
        } catch (\Throwable $th) {
            $result = [
                'status' => 'fail',
                'message' => $th->getMessage(),
            ];
        } catch (\Exception $ex) {
            $result = [
                'status' => 'fail',
                'message' => $ex->getMessage(),
            ];
        } finally {
            $result = array_merge($result, ['validate' => $validate]);
            echo json_encode($result);
        }
    }

    // private function uploadPhoto()
    // {
    //     try {
    //         $validated = $this->validate([
    //             'photo' => [
    //                 'rules' => 'uploaded[photo]|mime_in[photo,image/jpg,image/jpeg,image/gif,image/png]|max_size[photo,2048]',
    //                 'errors' => [
    //                     'uploaded' => 'Harus Ada File yang diupload',
    //                     'mime_in' => 'Format File Harus Berupa jpg, jpeg, gif, png',
    //                     'max_size' => 'Ukuran File Maksimal 2 MB',
    //                 ],
    //             ],
    //         ]);

    //         if ($validated == false) {
    //             throw new \Exception($this->validator->listErrors());
    //         }
    //         $file = $this->request->getFile('photo');
    //         $fileName = time() . '_' . $file->getName();
    //         session()->set('photo', $fileName);
    //         // $path = ROOTPATH . 'public/uploads/users/';
    //         $path = FILESDIR . '/uploads/users/';
    //         $file->move($path, $fileName);
    //         $result = Update($this->table, ['photo' => $fileName], ['id' => session('userId')]);
    //     } catch (\Throwable $th) {
    //         $result = [
    //             'uploaded' => 0,
    //             'error' => ['message' => preg_replace('!\s+!', ' ', strip_tags($th->getMessage()))],
    //         ];
    //     } catch (\Exception $ex) {
    //         $result = [
    //             'uploaded' => 0,
    //             'error' => ['message' => preg_replace('!\s+!', ' ', strip_tags($ex->getMessage()))],
    //         ];
    //     } finally {
    //         return $result;
    //     }
    // }

    public function setPassword()
    {
        try {
            $validate = Validate([
                'password' => 'required',
                'passwordLama' => 'required',
                'passwordConfirm' => 'required|sameAs:password',
            ], [
                'passwordLama' => 'false',
                'passwordConfirm' => 'false',
            ]);

            $user = $this->db->table($this->table)->where(['id' => session('userId'), 'password' => Enc(Input_('passwordLama'))])->get()->getRow();

            if (!$user) {
                $validate = ValidateAdd($validate, 'passwordLama', 'Password lama salah !');
            }

            if (!$validate['success']) {
                throw new \Exception('gagal memproses data');
            }
            if (!Update($this->table, ['password' => Enc(Input_('password'))], ['id' => session('userId')])) {
                throw new \Exception('Gagal merubah password');
            }
            $result = [
                'status' => 'ok',
                'message' => 'Berhasil merubah password',
            ];
        } catch (\Throwable $th) {
            $result = [
                'status' => 'fail',
                'message' => $th->getMessage(),
            ];
        } catch (\Exception $ex) {
            $result = [
                'status' => 'fail',
                'message' => $ex->getMessage(),
            ];
        } finally {
            $result = array_merge($result, ['validate' => $validate]);
            echo json_encode($result);
        }
    }
}