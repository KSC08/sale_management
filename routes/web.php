<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/lo', function () {
    return view('layouts.login');
});
Route::get('/nav', function () {
    return view('layouts.nav');
});
Route::get('/project', function () {
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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('users');
Route::get('/customer_type', [App\Http\Controllers\CustomerTypeController::class, 'index'])->name('customer_types');
