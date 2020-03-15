<?php
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
    Route::get('logout', 'ClientController@logout')->name('client.logout');
    Route::post('post-login', 'ClientController@postLogin');
    Route::post('editprofile', 'ClientController@editprofile');
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/next-of-kins', 'ClientController@nextOfKins');
        Route::get('/accounts', 'ClientController@accounts');
        Route::get('/', 'ClientController@dashboard');
    });

    Route::group(['prefix' => 'accounts'], function () {
        Route::post('add','AccountsController@create');
        Route::put('{account_id}','AccountsController@update');
        Route::delete('{account_id}','AccountsController@delete');
        Route::get('/{account_id}','AccountsController@show');
        Route::get('/','ClientController@dashboard');
    });

    Route::group(['prefix' => 'nextofkins'], function () {
        Route::post('add','NextOfKinsController@create');
        Route::put('{next_of_kins_id}','NextOfKinsController@update');
        Route::delete('{next_of_kins_id}','NextOfKinsController@delete');
        Route::get('/{next_of_kins_id}','NextOfKinsController@show');
        Route::get('/','ClientController@dashboard');
    });
});



