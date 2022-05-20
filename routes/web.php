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

//auth route for both 
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

// for admins
Route::group(['middleware' => ['auth', 'role:admin']], function() { 
    Route::get('/dashboard/adminprof', 'App\Http\Controllers\DashboardController@adminprof')->name('dashboard.adminprof');
});

// for employees
Route::group(['middleware' => ['auth', 'role:employee']], function() { 
    Route::get('/dashboard/employeeprof', 'App\Http\Controllers\DashboardController@employeeprof')->name('dashboard.employeeprof');
});

require __DIR__.'/auth.php';