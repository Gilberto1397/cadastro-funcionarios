<?php

namespace App\Repository\Employee;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class EloquentEmployeeRepository implements EmployeeRepositoryInterface
{
    public function index($userId)
    {
        return Employee::with('company')->where('companies_id', $userId)->get();
    }
    public function store(EmployeeRequest $request, $userId)
    {
        try {
            DB::beginTransaction();
            $employee = new Employee();

            $employee->name = $request->name;
            $employee->age = $request->age;
            $employee->state = $request->state;
            $employee->companies_id = $userId;
            $employee->save();
        } catch (\Exception $e){
            DB::rollBack();
            return false;
        }

        DB::commit();
        return true;
    }
}
