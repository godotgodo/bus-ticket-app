<?php

namespace App\Controllers;

use App\Models\User;

class LoginController extends BaseController
{
    public function index(): string
    {
        return view('login');
    }
    public function auth()
    {
        $userModel = new User();
        $validation = \Config\Services::validation();
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required',
        ];
        if (!$validation->setRules($rules)->run($this->request->getPost())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new User();

        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {

            $session = session();
            $session->set([
                'user_id' => $user['user_id'],
                'email' => $user['email'],
                'balance' => $userModel->getWallet($user['user_id'])['balance'],
                'logged_in' => true,
                'is_admin' => $user['is_admin']
            ]);

            //view içinde $session->get('user_id') denerek user idsine ulaşılabilir.
            return redirect()->to('/');
        } else {
            return redirect()->to('/login')->with('errors', ['Invalid credentials.']);
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();

        return redirect()->to('/login');
    }
}