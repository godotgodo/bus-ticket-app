<?php

namespace App\Controllers;

class login extends BaseController
{
    public function index(): string
    {
        return view('login');
    }
}
