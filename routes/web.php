<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectTypeController;
use App\Http\Controllers\ProjectStatusController;
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

// Route::get('/ ', function () {
//     return view('layouts.nav');
// });

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('layouts.login');
});
Route::get('/lo', function () {
    return view('layouts.login');
});
Route::get('/nav', function () {
    return view('layouts.nav');
});


//user
Route::get('/user', function () {
    return view('user.index');
});

//customer_type
Route::get('/customer_type', function () {
    return view('customer_type.index');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('users');
Route::get('/customer_type', [App\Http\Controllers\CustomerTypeController::class, 'index'])->name('customer_types');


//project
Route::get('/project', [ProjectController::class, 'index']);
Route::get('/project/add', [ProjectController::class, 'create']);
Route::get('/create_project', [ProjectController::class, 'store']);
Route::get('/project/edit/{id}', [ProjectController::class, 'edit']);
Route::post('/project_update', [ProjectController::class, 'update']);
Route::get('/project_/delete/{id}', [ProjectController::class, 'destroy']);

//project_type
Route::get('/project_type', [ProjectTypeController::class, 'index']);
Route::get('/project_type/add', [ProjectTypeController::class, 'create']);
Route::get('/create_project_type', [ProjectTypeController::class, 'store']);
Route::get('/project_type/edit/{id}', [ProjectTypeController::class, 'edit']);
Route::post('/project_type_update', [ProjectTypeController::class, 'update']);
Route::get('/project_type/delete/{id}', [ProjectTypeController::class, 'destroy']);


//project_status
Route::get('/project_status', [ProjectStatusController::class, 'index']);
Route::get('/project_status/add', [ProjectStatusController::class, 'create']);
Route::get('/create_project_status', [ProjectStatusController::class, 'store']);
Route::get('/project_status/edit/{id}', [ProjectStatusController::class, 'edit']);
Route::post('/project_status_update', [ProjectStatusController::class, 'update']);
Route::get('/project_status/delete/{id}', [ProjectStatusController::class, 'destroy']);

