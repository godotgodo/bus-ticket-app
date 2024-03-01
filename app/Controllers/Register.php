<?php

namespace App\Controllers;

class Register extends BaseController
{
    public function index(): string
    {
        return view('register');
    }

    public function save()
    {
        $user = [
            'name' => $this->request->getPost('name'),
            'tel_no' => $this->request->getPost('tel_no'),
            'tc_no' => $this->request->getPost('tc_no'),
            'gender' => $this->request->getPost('gender'),
            'age' => $this->request->getPost('age'),
            'job' => $this->request->getPost('job'),
            'passport_no' => $this->request->getPost('passport_no'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password')
        ];

        return $user['name'];
    }

}