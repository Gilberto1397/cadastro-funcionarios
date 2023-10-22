<?php

namespace App\Http\Service;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    public function index()
    {
        return session('message');
    }

    public function login(Request $r)
    {
        if (!Auth::attempt($r->only(['email', 'password']))) {
            return false;
        }

        return true;
    }

    public function logout()
    {
        Auth::logout();
        return;
    }
}