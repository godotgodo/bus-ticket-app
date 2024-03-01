<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index(): string
    {
        return view('login');
    }
    public function auth()
    {
        $user = [
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password')
        ];
        
        return $user['email'];
    }
}