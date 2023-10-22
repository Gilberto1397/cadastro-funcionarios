<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Http\Service\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(UserFormRequest $r)
    {
        $user = $this->userService->store();
        return redirect()->route('employee.index')->with('message',"Usuário {$user->name} criado!!!");

    }
}
