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
        $userId = auth()->user()->getAuthIdentifier();
        $employees = $this->repository->index($userId);
        $message = session('message');
        return view('employee.index', compact(['employees', 'message']));
    }

    public function create(Request $r)
    {
        $user = auth()->user();
        $companies = Company::all();
        return view('employee.form', compact(['companies', 'user']));
    }

    public function store(StoreRequest $request)
    {
        $userId = auth()->user()->getAuthIdentifier();
        $newEmployee = $this->repository->store($request, $userId);
        $resposta = new \stdClass();

        if (!$newEmployee) {
            $resposta->devolvendo = 'Erro ao salvar';
            session()->flash('message', 'Erro ao criar funcionário');
            return redirect()->route('employee.index');
        }

        $resposta->devolvendo = 'GRAVOU O DADO';
        return response()->json($resposta);

        /*session()->flash('message', 'Funcionário criado!!!');
        return redirect()->route('employee.index');*/
    }

    public function edit($employee)
    {
        $employee = Employee::find($employee);
        $user = $employee->company;
        return view('employee.form', compact(['employee', 'user']));
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

    public function recuperaUsuario()
    {
        $user = auth()->user();
        $userName = $user->name;
        return response()->json($userName);
    }
}
