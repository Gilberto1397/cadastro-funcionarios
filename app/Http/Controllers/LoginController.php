<?php

namespace App\Http\Controllers;

use App\Http\Service\LoginService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected LoginService $loginService;

    public function __construct()
    {
        $this->loginService = new LoginService();
    }

    public function index()
    {
        $message = $this->loginService->index();
        return view('login.index', compact('message'));
    }

    public function login(Request $r)
    {
        $authentication = $this->loginService->login($r);
        if (!$authentication) {
            return redirect()->route('login')->with('message', 'Usuário ou senha inválidos');
        }

        return redirect()->route('employee.index');
    }

    public function logout()
    {
        $this->loginService->logout();
        return redirect()->route('login');
    }
}
