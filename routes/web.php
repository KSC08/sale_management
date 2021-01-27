<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerTypeController;
use App\Mail\MailNotify;


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

Route::get('/ ', function () {
    return view('layouts.nav');
});
Route::resource('project','ProjectController');
// Route::get('/company','CompanyController@index');

//Company
Route::get('/company', [CompanyController::class, 'index']);
Route::get('/company_seach', [CompanyController::class, 'search']);
Route::get('/company_create', [CompanyController::class, 'create']);
Route::POST('/company_store', [CompanyController::class, 'store']);
Route::get('/company_edit/{id}', [CompanyController::class, 'edit']);
Route::POST('/company_update', [CompanyController::class, 'update']);
Route::get('/company_delete/{id}', [CompanyController::class, 'destroy']);

//Customer
Route::resource('customer', 'App\Http\Controllers\CustomerController');
// Route::get('/customer', [CustomerController::class, 'index']);
Route::get('/customer_seach', [CustomerController::class, 'search']);
Route::get('/customer_create', [CustomerController::class, 'create']);
Route::POST('/customer_store', [CustomerController::class, 'store']);
Route::get('/customer_edit/{id}', [CustomerController::class, 'edit']);
Route::POST('/customer_update', [CustomerController::class, 'update']);
Route::get('/customer_delete/{id}', [CustomerController::class, 'destroy']);

//Department
Route::resource('department','App\Http\Controllers\DepartmentController');
Route::POST('/department_store',[DepartmentController::class,'store']);
Route::POST('/department_update/{id}',[DepartmentController::class,'update']);
Route::get('/department_delete/{id}',[DepartmentController::class,'destroy']);

Route::get('/projact', function () {
    return view('project.index');
});


//user route job
Route::get('/user', function () {
    return view('user.index');
});
Route::resource('user', 'App\Http\Controllers\UserController');
Route::get('/user_seach', [UserContrUseroller::class, 'search']);
Route::get('/user_create', [UserController::class, 'create']);
Route::POST('/user_store/{id}', [UserController::class, 'store']);
Route::get('/user_edit/{id}', [UserController::class, 'edit']);
Route::POST('/user_update/{id}', [UserController::class, 'update']);

//test delete user route
Route::get('user/destroy/{id}', 'App\Http\Controllers\UserController@destroy')->name('destroy');
Route::post('user/destroy/{id}', 'App\Http\Controllers\UserController@destroy')->name('destroy');


//customer_type
Route::get('/customer_type', function () {
    return view('customer_type.index');
});
Route::resource('customer_type', 'App\Http\Controllers\CustomerTypeController');
Route::get('/customer_type_seach', [CustomerTypeController::class, 'search']);
Route::get('/customer_type_create', [CustomerTypeController::class, 'create']);
Route::POST('/customer_type_store', [CustomerTypeController::class, 'store']);
Route::get('/customer_type_edit/{id}', [CustomerTypeController::class, 'edit']);
Route::POST('/customer_type_update/{id}', [CustomerTypeController::class, 'update']);

Route::get('customer_type/destroy/{id}', 'App\Http\Controllers\CustomerTypeController@destroy')->name('destroy');
Route::post('customer_type/destroy/{id}', 'App\Http\Controllers\CustomerTypeController@destroy')->name('destroy');









//division

Route::resource('division', 'App\Http\Controllers\DivisionController');
Route::POST('/division_store',[DivisionController::class,'store']);
Route::POST('/division_update/{id}',[DivisionController::class,'update']);
Route::get('/division_delete/{id}',[DivisionController::class,'destroy']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('users');
Route::get('/customer_type', [App\Http\Controllers\CustomerTypeController::class, 'index'])->name('customer_types');

<<<<<<< HEAD
=======




>>>>>>> katoon
