<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DivisionController;


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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/nav', function () {
    return view('layouts.nav');
});
Route::get('/projact', function () {
    return view('project.index');
});

//user
Route::get('/user', function () {
    return view('user.index');
});

//customer_type
Route::get('/customer_type', function () {
    return view('customer_type.index');
});

//department

Route::resource('department', 'App\Http\Controllers\DepartmentController');
Route::POST('/department_store',[DepartmentController::class,'store']);
Route::POST('/department_update/{id}',[DepartmentController::class,'update']);
Route::get('/department_delete/{id}',[DepartmentController::class,'destroy']);



//division

Route::resource('division', 'App\Http\Controllers\DivisionController');
Route::POST('/division_store',[DivisionController::class,'store']);
Route::POST('/division_update/{id}',[DivisionController::class,'update']);
Route::get('/division_delete/{id}',[DivisionController::class,'destroy']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('users');
Route::get('/customer_type', [App\Http\Controllers\CustomerTypeController::class, 'index'])->name('customer_types');