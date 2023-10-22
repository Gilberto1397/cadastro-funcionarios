<?php

namespace App\Repository\Employee;

use App\Http\Requests\EmployeeRequest;

interface EmployeeRepositoryInterface
{
    public function index($userId);
    public function store(EmployeeRequest $request, $userId);
}
