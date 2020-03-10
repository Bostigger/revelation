<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('login', 'AuthController@index');
Route::post('post-login', 'AuthController@postLogin');
Route::get('registration', 'AuthController@registration');
Route::post('post-registration', 'AuthController@postRegistration');
Route::get('dashboard/nominations/{category_id}/category_id', 'AuthController@nomination')->name('auth.nominations.view');
Route::get('dashboard/voting/{category_id}/category_id', 'AuthController@voting')->name('auth.voting.view');
Route::get('dashboard', 'AuthController@dashboard')->name('auth.dashboard');
Route::get('logout', 'AuthController@logout');

Route::group(['prefix' => 'client'], function () {
    Route::get('registration', 'ClientController@registration');
    Route::post('register', 'ClientController@register');
    Route::get('login', 'ClientController@login')->name('client.login');
    Route::post('post-login', 'ClientController@postLogin');
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', 'ClientController@dashboard');
    });
});
