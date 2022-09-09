<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/user')->group(function () {
    //public routes
    Route::post('/login', 'App\Http\Controllers\UserController@login');
    //end public routes

    //protected routes
    Route::middleware('auth:api')->group(function () {
        //customer routes
        Route::post('/customer/create', 'App\Http\Controllers\CustomerController@createCustomer');
        Route::get('/customer/get', 'App\Http\Controllers\CustomerController@getCustomers');
        //end customer routes

        //package routes
        Route::post('/package/create', 'App\Http\Controllers\PackageController@addPackage');
        Route::get('/package/get/{id}', 'App\Http\Controllers\PackageController@getPackages');
        Route::put('/package/update', 'App\Http\Controllers\PackageController@updatePackage');
        //end package routes

        //auth routes
        Route::post('/logout', 'App\Http\Controllers\UserController@logout');
        //end auth routes
    });
    //end protected routes
});
