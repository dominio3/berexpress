<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('locations', 'LocationAPIController');

Route::resource('services', 'ServiceAPIController');

Route::resource('services', 'ServiceAPIController');

Route::resource('users', 'UserAPIController');

Route::resource('orders', 'OrderAPIController');

Route::resource('consignements', 'ConsignementAPIController');

Route::resource('move_tasks', 'MoveTaskAPIController');

Route::resource('consignements', 'ConsignementAPIController');

Route::resource('locations', 'LocationAPIController');

Route::resource('orders', 'OrderAPIController');

Route::resource('consignements', 'ConsignementAPIController');