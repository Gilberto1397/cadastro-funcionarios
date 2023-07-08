<?php

namespace App\Repository;

use App\Http\Requests\StoreRequest;

interface EmployeeRepositoryInterface
{
    public function index();
    public function store(StoreRequest $request);
}
