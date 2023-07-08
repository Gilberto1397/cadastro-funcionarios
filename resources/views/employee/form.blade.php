@extends('components.layout')
@section('title', !empty($employee->id) ? 'Atualizando funcionário' : 'Novo Funcionário')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6 text-center">{{!empty($employee->id) ? 'Atualizando funcionário' : 'Novo Funcionário'}}</h1>
        <form class="w-full max-w-lg mx-auto bg-white p-8 rounded-md shadow-md" action="{{!empty($employee->id) ? route('employee.update', ['employee' => $employee->id]) : route('employee.store')}}"
              method="post">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nome</label>
                <input
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    type="text" id="name" name="name" value="{{$employee->name ?? ''}}">
                @if($errors->has('name'))
                    {{$errors->first('name')}}
                @endif
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="age">Idade</label>
                <input
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    type="text" id="age" name="age" value="{{$employee->age ?? ''}}">
                @if($errors->has('age'))
                    {{$errors->first('age')}}
                @endif
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="state">Estado</label>
                <input
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                    type="text" id="state" name="state" value="{{$employee->state ?? ''}}">
                @if($errors->has('state'))
                    {{$errors->first('state')}}
                @endif
            </div>
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Empresa</label>
                <select name="company"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option> Escolha uma empresa</option>
                    @foreach($companies as $company)
                        <option {{ (isset($employee->companies_id) && $employee->companies_id == $company->id) ? 'selected' : '' }} value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach
                </select>
                @if($errors->has('company'))
                    {{$errors->first('age')}}
                @endif
            </div>

            <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Stacks</h3>
            <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input id="vue-checkbox-list" type="checkbox" name="stacks[]" value="vuejs" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="vue-checkbox-list" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Vue JS</label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input id="react-checkbox-list" type="checkbox" name="stacks[]" value="php" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="react-checkbox-list" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">PHP</label>
                    </div>
                </li>
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input id="angular-checkbox-list" type="checkbox" name="stacks[]" value="postgres" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="angular-checkbox-list" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Postgres</label>
                    </div>
                </li>
                <li class="w-full dark:border-gray-600">
                    <div class="flex items-center pl-3">
                        <input id="laravel-checkbox-list" type="checkbox" name="stacks[]" value="laravel" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="laravel-checkbox-list" class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laravel</label>
                    </div>
                </li>
            </ul>

            <button
                class="mt-5 w-full bg-indigo-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-300"
                type="submit">{{!empty($employee->id) ? 'Atualizar' : 'Salvar'}}
            </button>
        </form>
    </div>
@endsection
