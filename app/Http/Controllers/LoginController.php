<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $message = session('message');
        return view('login.index', compact('message'));
    }

    public function login(Request $r)
    {
        dd($r);
        if (!Auth::attempt($r->only(['email', 'password']))) {
            return redirect()->route('login')->with('message', 'Usuário ou senha inválidos');
        }

        return redirect()->route('employee.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
