@extends('components.layout')
@section('title', !empty($employee->id) ? 'Atualizando funcionário' : 'Novo Usuário')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6 text-center">{{!empty($employee->id) ? 'Atualizando funcionário' : 'Nova Empresa'}}</h1>
        <form class="w-full max-w-lg mx-auto bg-white p-8 rounded-md shadow-md" action="{{!empty($employee->id) ? route('employee.update', ['employee' => $employee->id]) : route('user.store')}}"
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
                <label class="block text-gray-700 text-sm font-bold mb-2" for="age">E-mail</label>
                <input
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="email" id="email" name="email" value="{{$employee->age ?? ''}}">
                @if($errors->has('age'))
                    {{$errors->first('age')}}
                @endif
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="state">Senha</label>
                <input
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                        type="password" id="password" name="password" value="{{$employee->state ?? ''}}">
                @if($errors->has('state'))
                    {{$errors->first('state')}}
                @endif
            </div>

            <button
                    class="mt-5 w-full bg-indigo-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-300"
                    type="submit">{{!empty($employee->id) ? 'Atualizar' : 'Salvar'}}
            </button>
        </form>
    </div>
@endsection
