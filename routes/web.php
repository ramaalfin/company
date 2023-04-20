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

Route::get('/employes/ambil-project/{employe}', [EmployeController::class, 'ambilProject'])->name('ambil-project');
Route::post('/employes/ambil-project/{employe}', [EmployeController::class, 'prosesAmbilProject'])->name('proses-ambil-project');

// Route::get('/employes/ambil-department/{employe}', [EmployeController::class, 'ambilDepartment'])->name('ambil-department');
// Route::post('/employes/ambil-department/{employe}', [EmployeController::class, 'prosesAmbilDepartment'])->name('proses-ambil-department');

Route::get('/projects/tambah-department/{project}', [ProjectController::class, 'tambahDepartment'])->name('tambah-department');
Route::post('/projects/tambah-department/{project}', [ProjectController::class, 'prosesTambahDepartment'])->name('proses-tambah-department');

Route::get('/projects/tambah-employe/{project}', [ProjectController::class, 'tambahEmploye'])->name('tambah-employe');
Route::post('/projects/tambah-employe/{project}', [ProjectController::class, 'prosesTambahEmploye'])->name('proses-tambah-employe');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('upload', [ProjectController::class, 'uploadImage'])->name('ckeditor.upload');
