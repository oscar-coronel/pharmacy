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

Route::get('/temp', function () {
    return view('home2');
});

// Rutas de Login y Logout
Route::get('/','Auth\LoginController@showLoginForm')->name('login.show');
Route::post('/','Auth\LoginController@login')->name('login');
Route::post('/logout','Auth\LoginController@logout')->name('logout');

// Rutas del menú
Route::get('/maintenance', 'HomeController@maintenace')->name('maintenance');

// Rutas para actulizar datos personales
Route::patch('/user_auth/{user}/update', 'UserController@update')->name('auth_user.update');
Route::patch('/user_auth/{user}/update_password', 'UserController@updatePassword')->name('auth_user.update.password');

// Rutas del Supervisor
Route::get('/supervisors/users','UserController@supervisorIndex')->name('users.supervisor.index');
Route::post('/supervisors/users','UserController@supervisorStore')->name('users.supervisor.store');
Route::get('/supervisors/users/create','UserController@supervisorCreate')->name('users.supervisor.create');
Route::get('/supervisors/users/edit/{user}','UserController@supervisorEdit')->name('users.supervisor.edit');
Route::patch('/supervisors/users/update/{user}','UserController@supervisorUpdate')->name('users.supervisor.update');
Route::delete('/supervisors/users/destroy/{user}','UserController@supervisorDestroy')->name('users.supervisor.destroy');

// Rutas del Vendedor
Route::get('/sellers/users','UserController@sellerIndex')->name('users.seller.index');
Route::post('/sellers/users','UserController@sellerStore')->name('users.seller.store');
Route::get('/sellers/users/create','UserController@sellerCreate')->name('users.seller.create');
Route::get('/sellers/users/edit/{user}','UserController@sellerEdit')->name('users.seller.edit');
Route::patch('/sellers/users/update/{user}','UserController@sellerUpdate')->name('users.seller.update');
Route::delete('/sellers/users/destroy/{user}','UserController@sellerDestroy')->name('users.seller.destroy');

// Rutas del cliente
Route::resource('customers','CustomerController')->except(['show']);

// Rutas de los proveedores
Route::resource('providers','ProviderController')->except(['show']);

// Rutas de los artículos
Route::resource('items','ItemController')->except(['show']);