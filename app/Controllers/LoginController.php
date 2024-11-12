<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\LoginModel;

class LoginController extends ResourceController
{
    public function index()
    {
        /* $data = $this->request->getJSON(true);
        $username = $data['username'];
        $password = $data['password']; */

        $username = 'evan';
        $password = '12345678';

        $loginModel = new LoginModel();
        $loginSukses = $loginModel->getData($username, $password);

        if ($loginSukses) {

            return $this->respond([
                'status' => 'success',
                'message' => 'Login successful',
                'data' => $loginSukses
            ]);
        } else {
            return $this->failUnauthorized('Username atau kata sandi salah');
        }
    }
}