<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class ApprovalFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = \Config\Services::session();
        try {
            if (!$_SESSION['level'] == "1") throw new \Exception("Tidak memiliki akses");
            $response = [
                'status' => 'ok',
                'message' => 'ok !'
            ];
        } catch (\Throwable $th) {
            $response = [
                'status' => '401',
                'message' => $th->getMessage()
            ];
        } catch (\Exception $ex) {
            $response = [
                'status' => '401',
                'message' => $ex->getMessage()
            ];
        } finally {
            // print_r($response);
            // print_r($_SESSION);
            if ($response['status'] == 'fail') {

                echo json_encode($response);
                exit;
            }
            if (session('level') != '1') exit();
        }
        // if (session('token') && !session('level') == "1") echo json_encode([
        //     'status' => 'fail',
        //     'message' => 'Tidak memiliki Akses'
        // ]);
        // if (session('level') != '1') exit();
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}