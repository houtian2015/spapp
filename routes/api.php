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
/*
Route::post('/user/login', 'Api\AuthenticateController@authenticate');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', ['namespace' => 'App\Api\V1\Controllers'], function ($api) {
    $api->post('/user/login', 'AuthenticateController@authenticate');
    $api->get('/test', 'TestController@index');
    $api->get('/user/{id}', 'TestController@show');
});