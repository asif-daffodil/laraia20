<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\abulController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\momenController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{kakku?}', function($kakku = "Bangladesh"){
    return $kakku;
});

Route::get('/momen', [momenController::class, 'keranigonj']);


Route::get('/name', [abulController::class, 'name']);
Route::get('/age', [abulController::class, 'age']);

Route::get('/student/{sname?}/{job?}', [abulController::class, 'student']);

Route::get("/maria", [abulController::class, 'maria']);
Route::get("/pahar/{cname?}", [abulController::class, 'nahar']);

Route::get("/employee", [EmployeeController::class, 'index']);
Route::get("/employee/add", [EmployeeController::class, 'create'])->name('employee.add');
