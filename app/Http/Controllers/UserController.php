<?php

namespace App\Http\Controllers;
use App\Http\Response;
use App\Models\UserModel;

class UserController extends UserModel
{
    public function index():Response
    {
        return view('user');
    }
}