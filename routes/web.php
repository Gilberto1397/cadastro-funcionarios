<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::controller(EmployeeController::class)->group(function () {
    Route::get('/', 'index')->name('employee.index');
    Route::get('/novo-funcionario', 'create')->name('employee.create');
    Route::post('/novo-funcionario', 'store')->name('employee.store');
    Route::delete('/excluir-funcionario/{id}', 'destroy')->name('employee.delete');
    Route::get('/atualizar-funcionario/{id}', 'edit')->name('employee.edit');
    Route::post('/atualizar-funcionario', 'update')->name('employee.update');
});
