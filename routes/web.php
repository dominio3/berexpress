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

Route::get('/', function () {
  return redirect('home');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('locations', 'LocationController');

Route::resource('services', 'ServiceController');

Route::resource('services', 'ServiceController');

Route::resource('users', 'UserController');

Route::resource('orders', 'OrderController');

Route::resource('consignements', 'ConsignementController');

Route::resource('moveTasks', 'MoveTaskController');

Route::resource('consignements', 'ConsignementController');

Route::resource('locations', 'LocationController');

Route::resource('orders', 'OrderController');

Route::resource('consignements', 'ConsignementController');

Route::get('notify/index', 'NotificationController@index');