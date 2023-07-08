<?php

namespace App\Repository;

use App\Http\Requests\StoreRequest;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class EloquentEmployeeRepository implements EmployeeRepositoryInterface
{
    public function index()
    {
        return Employee::with('company')->get();
    }
    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $employee = new Employee();

            $employee->name = $request->name;
            $employee->age = $request->age;
            $employee->state = $request->state;
            $employee->companies_id = $request->company;
            $employee->save();
        } catch (\Exception $e){
            DB::rollBack();
            return false;
        }

        DB::commit();
        return true;
    }
}
