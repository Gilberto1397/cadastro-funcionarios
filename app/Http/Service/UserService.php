<?php

namespace App\Http\Service;

use App\Repository\User\UserRepositoryInterface;

class UserService
{
    protected UserRepositoryInterface $userRepository;
    public function store($request)
    {
        return $this->userRepository->store($request);
    }
}