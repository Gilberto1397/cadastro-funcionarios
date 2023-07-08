<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Company;
use App\Models\Employee;
use App\Repository\EmployeeRepositoryInterface;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $repository;

    public function __construct(EmployeeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    public function index()
    {
        $employees = $this->repository->index();
        $message = session('message');
        return view('employee.index', compact(['employees', 'message']));
    }

    public function create(Request $r)
    {
        //dd($r);
        $companies = Company::all();
        return view('employee.form', compact('companies'));
    }

    public function store(StoreRequest $request)
    {
        $newEmployee = $this->repository->store($request);

        if (!$newEmployee) {
            session()->flash('message', 'Erro ao criar usuário');
            return redirect()->route('employee.index');
        }
        session()->flash('message', 'Funcionário criado!!!');
        return redirect()->route('employee.index');
    }

    public function edit($employee)
    {
        $employee = Employee::find($employee);
        $companies = Company::all();
        return view('employee.form', compact(['employee', 'companies']));
    }

    public function update(Request $request)
    {
        $employee = Employee::find($request->employee);
        $employee->name = $request->name;
        $employee->age = $request->age;
        $employee->state = $request->state;
        $employee->companies_id = $request->company;
        $employee->save();
        session()->flash('message', 'Funcionário atualizado!!!');

        return redirect()->route('employee.index');
    }

    public function destroy($id)
    {
        $employee = Employee::destroy($id);
        session()->flash('message', 'Funcionário excluído');
        return redirect()->route('employee.index');
    }
}
