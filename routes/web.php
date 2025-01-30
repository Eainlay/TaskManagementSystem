<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Route;

// Route::get('/',[HomeController::class,'dashboard']);


// Route::get('/', function () {
//     return redirect()->route('login'); // Redirect to login if not authenticated
// })->name('home');


Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'dashboard']);
    Route::get('departments/index',[DepartmentController::class,'index'])->name('departmentsIndex');
    Route::get('departments/create',[DepartmentController::class,'create'])->name('departmentsCreate');
    Route::post('departments/store',[DepartmentController::class,'store'])->name('departmentsStore');
    Route::get('departments/edit/{id}',[DepartmentController::class,'edit'])->name('departmentsEdit');
    Route::post('departments/update/{id}',[DepartmentController::class,'update'])->name('departmentsUpdate');
    Route::post('departments/delete/{id}',[DepartmentController::class,'delete'])->name('departmentsDelete');

});

Route::get('users/index',[UserController::class,'index'])->name('usersIndex');


Route::get('roles/index',[RoleController::class,'index'])->name('rolesIndex');

Route::get('permissions/index',[PermissionController::class,'index'])->name('permissionsIndex');

Route::get('sendEmail',[MailController::class,'sendEmail']);
