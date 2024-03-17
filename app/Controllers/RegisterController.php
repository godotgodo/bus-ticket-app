<?php

namespace App\Controllers;

use App\Models\User;

class RegisterController extends BaseController
{
    public function index(): string
    {
        return view('register');
    }

    public function save()
    {
        $userModel = new User();
        $validation = \Config\Services::validation();
        $rules = [
            'name' => 'required',
            'email'    => 'required|valid_email',
            'password' => 'required|min_length[6]|max_length[24]',
            'gender' => 'required',
            'age' => 'required',
            'job' => 'required',
            'identity_number' => 'required',
            'phone_number' => 'required'
        ];
        if (!$validation->setRules($rules)->run($this->request->getPost())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        if($this->request->getPost('password') != $this->request->getPost('password_confirmation'))
        {
           return redirect()->to('register')->with('error', "Password doesn't match with confirmation!");
        }
        $user = [
            'name' => $this->request->getPost('name'),
            'phone_number' => $this->request->getPost('phone_number'),
            'identity_number' => $this->request->getPost('identity_number'),
            'gender' => $this->request->getPost('gender') == "female" ? 0 : 1,
            'age' => $this->request->getPost('age'),
            'job' => $this->request->getPost('job'),
            'passport_number' => $this->request->getPost('passport_number'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'is_admin' => 0
        ];
        if ($userModel->insert($user, false))
        {
            $userModel->createWallet($userModel->getInsertID());
            return redirect()->to('login');
        }
        else{
            return redirect()->back()->withInput()->with('createError', "Error occured on create.");
        }
    }

}