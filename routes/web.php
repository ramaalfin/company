<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app');
});

Route::resource('departments', DepartmentController::class);
Route::resource('employes', EmployeController::class);
Route::resource('projects', ProjectController::class);
