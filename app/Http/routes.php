<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});
Route::resource('/apply','ApplyController');
Route::resource('/mana','ManaController');
Route::resource('/money','MoneyController');
Route::post('/accept', 'ManagerController@accept');
Route::post('/wait', 'ManagerController@wait');
Route::post('/cancel', 'ManagerController@cancel');
Route::post('/delete', 'ManagerController@delete');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
