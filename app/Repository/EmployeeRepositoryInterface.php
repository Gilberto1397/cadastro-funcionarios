<?php

namespace App\Repository;

use App\Http\Requests\StoreRequest;

interface EmployeeRepositoryInterface
{
    public function index($userId);
    public function store(StoreRequest $request, $userId);
}
