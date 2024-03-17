<?php

namespace App\Controllers;

use App\Models\Bus;
use App\Models\Route;

class HomeController extends BaseController
{
    public function index(): string
    {
        return view('home');
    }
}
