<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

Auth::routes();

Route::resource('departments', DepartmentController::class);
Route::resource('employes', EmployeController::class);
Route::resource('projects', ProjectController::class);

Route::get('/department-employe/{id}', [DepartmentController::class, 'departmentEmploye'])->name('department-employe');
Route::get('/department-project/{id}', [DepartmentController::class, 'departmentProject'])->name('department-project');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
