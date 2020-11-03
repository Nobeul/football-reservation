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
    $data['user'] = App\User::where('id', '1')->get();
    return view('welcome',$data);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {
    Route::get('home', 'AdminController@index')->name('admin.home');
    Route::get('/', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/', 'Admin\LoginController@login');
    Route::post('password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('password/reset', 'Admin\ResetPasswordController@reset')->name('admin.password.update');
    Route::get('password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');
});

Route::prefix('users')->group(function () {
    Route::get('/', 'UserController@list')->name('user.list');
    Route::get('/view/{id}', 'UserController@view')->name('user.details');
    Route::get('/add', 'UserController@create')->name('user.create');
    Route::post('/add', 'UserController@store')->name('user.store');
    Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::post('/update/{id}', 'UserController@update')->name('user.update');
});

Route::prefix('fields')->group(function () {
    Route::get('/', 'FieldController@list')->name('field.list');
    Route::get('/view/{id}', 'FieldController@view')->name('field.details');
    Route::get('/add', 'FieldController@create')->name('field.create');
    Route::post('/add', 'FieldController@store')->name('field.store');
    Route::get('/edit/{id}', 'FieldController@edit')->name('field.edit');
    Route::post('/update/{id}', 'FieldController@update')->name('field.update');
});

Route::prefix('slots')->group(function () {
    Route::get('/', 'SlotController@index')->name('slot.field');
    Route::get('/list/{field_id}', 'SlotController@list')->name('slot.list');
    Route::get('/view/{id}', 'SlotController@view')->name('slot.details');
    Route::get('/add', 'SlotController@create')->name('slot.create');
    Route::post('/add', 'SlotController@store')->name('slot.store');
    Route::get('/edit/{id}', 'SlotController@edit')->name('slot.edit');
    Route::post('/update/{id}', 'SlotController@update')->name('slot.update');
});
