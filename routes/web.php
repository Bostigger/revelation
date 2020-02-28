<?php

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
Route::get('nominate', 'NominationController@index');
Route::post('nomination/nominate', 'NominationController@nominate');
Route::get('vote', 'VotingController@index');
Route::get('vote/category/{category_id}', 'VotingController@byCategory');
Route::get('notify/sendcodes', 'NotifyController@sendCodes');
Route::post('voting/vote', 'VotingController@vote');
Route::post('voting/login', 'VotingController@login');
Route::post('vote/login', 'VotingController@login');
Route::get('voting/logout', 'VotingController@logout');
Route::get('vote/logout', 'VotingController@logout');

