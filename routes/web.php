<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Autenticador;
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

Route::controller(EmployeeController::class)->middleware(Autenticador::class)->group(function () {
    Route::get('/', 'index')->name('employee.index');
    Route::get('/novo-funcionario', 'create')->name('employee.create');
    Route::post('/novo-funcionario', 'store')->name('employee.store');
    Route::delete('/excluir-funcionario/{id}', 'destroy')->name('employee.delete');
    Route::get('/atualizar-funcionario/{id}', 'edit')->name('employee.edit');
    Route::post('/atualizar-funcionario', 'update')->name('employee.update');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('/novo-usuario', [UserController::class, 'create'])->name('user.create');
Route::post('/novo-usuario', [UserController::class, 'store'])->name('user.store');
