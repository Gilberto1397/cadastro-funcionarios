<?php

namespace App\Http\Service;

use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use App\Repository\Employee\EloquentEmployeeRepository;
use App\Repository\Employee\EmployeeRepositoryInterface;
use Illuminate\Http\Request;

class EmployeeService
{
    protected EloquentEmployeeRepository $employeeRepository;

    public function __construct(EmployeeRepositoryInterface $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function index()
    {
        $userId = auth()->user()->getAuthIdentifier();
        $employees = $this->employeeRepository->index($userId);
        $message = session('message');
        return compact(['employees', 'message']);
    }

    public function create()
    {
        $user = auth()->user();
        $companies = Company::all();
        return compact(['companies', 'user']);
    }

    public function store(EmployeeRequest $request)
    {
        $userId = auth()->user()->getAuthIdentifier();
        return $this->employeeRepository->store($request, $userId);
    }

    public function edit($employee)
    {
        $employee = Employee::find($employee);
        $user = $employee->company;
        return compact(['employee', 'user']);
    }
}