<?php

namespace App\Repository\User;

use App\Http\Requests\EmployeeRequest;
use App\Models\User;
use App\Repository\Employee\EmployeeRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function store($request)
    {
        $data = $request->except(['_token']);
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        Auth::login($user);
        return $user;
    }
}
