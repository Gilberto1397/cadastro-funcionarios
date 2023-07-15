<?php

namespace App\Repository;

use App\Http\Requests\StoreRequest;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class EloquentEmployeeRepository implements EmployeeRepositoryInterface
{
    public function index($userId)
    {
        return Employee::with('company')->where('companies_id', $userId)->get();
    }
    public function store(StoreRequest $request, $userId)
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
