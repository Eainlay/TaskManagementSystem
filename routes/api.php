<?php

use App\Http\Controllers\DepartmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('storeDepartment',[DepartmentController::class,'storeDepartment']);
Route::get('getDepartment',[DepartmentController::class,'getDepartments']);
Route::post('updateDepartment/{id}',[DepartmentController::class,'updateDepartment']);
Route::post('deleteDepartment/{id}',[DepartmentController::class,'deleteDepartment']);
