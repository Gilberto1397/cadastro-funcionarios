<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Http\Service\EmployeeService;
use App\Models\Company;
use App\Models\Employee;
use App\Repository\Employee\EmployeeRepositoryInterface;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $repository;
    protected EmployeeService $employeeService;

    public function __construct(EmployeeRepositoryInterface $repository)
    {
        $this->employeeService = new EmployeeService();
    }

    public function index()
    {
        $dados = $this->employeeService->index();
        $employees = $dados['employees'];
        $message = $dados['message'];
        return view('employee.index', compact(['employees', 'message']));
    }

    public function create()
    {
        $dados = $this->employeeService->create();
        $companies = $dados['companies'];
        $user = $dados['user'];
        return view('employee.form', compact(['companies', 'user']));
    }

    public function store(EmployeeRequest $request)
    {
        $newEmployee = $this->employeeService->store($request);

        if (!$newEmployee) {
            session()->flash('message', 'Erro ao criar funcionário');
            return redirect()->route('employee.index');
        }

        return redirect()->route('employee.index');
    }

    public function edit($employee)
    {
        $dados = $this->employeeService->edit($employee);
        $employee = $dados['employee'];
        $user = $dados['user'];
        return view('employee.form', compact(['employee', 'user']));
    }

    public function update(Request $request) // continuar daqui
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

    public function recuperaUsuario()
    {
        $user = auth()->user();
        $userName = $user->name;
        return response()->json($userName);
    }
}
