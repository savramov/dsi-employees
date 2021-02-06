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


Auth::routes(['register' => false]);

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/employees', 'EmployeesController@index')->name('employees');
Route::get('/employees/create', 'EmployeesController@create')->name('employees.create');
Route::post('/employees/store', 'EmployeesController@store')->name('employees.store');
Route::get('/employees/edit/{id}', 'EmployeesController@edit')->name('employees.edit');
Route::patch('/employees/update/{id}', 'EmployeesController@update')->name('employees.update');
Route::delete('/employees/destroy/{id}', 'EmployeesController@destroy')->name('employees.destroy');
