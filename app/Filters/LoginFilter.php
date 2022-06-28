<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class LoginFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // $req = service('request');
        $session = \Config\Services::session();
        try {
            $uri = service('uri');
            if (!$_SESSION['userId']) throw new \Exception("Not Authorized");
            $response = [
                'status' => 'ok',
                'message' => 'ok'
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
            if ($response['status'] == '401' && $uri->getSegment(2) != 'login') {
                if (!$request->getHeader("Load-From-Ajax")) return redirect()->to(ADMIN_PATH . "/login");
                echo json_encode($response);
                exit;
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}