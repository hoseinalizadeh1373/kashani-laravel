<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

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



Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
    'namespace'=>"\App\Http\Controllers\Api"
    ], function ($router) {
        Route::post('requestToken', 'AuthController@requestToken');
        Route::post('loginWithToken', 'AuthController@loginWithToken');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');
        Route::post('register', 'AuthController@register');
    });


    
Route::group([
    'middleware' => ['api',"auth:api"],
    'namespace'=> "\App\Http\Controllers\Api",
 ], function ($router) {
     Route::get('users/{user}/documents', 'DocumentsController@list');
     Route::get('users/{user}/documents/{doc}', 'DocumentsController@getDoc');
 });

