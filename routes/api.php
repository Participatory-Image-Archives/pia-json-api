<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use LaravelJsonApi\Laravel\Http\Controllers\JsonApiController;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

JsonApiRoute::server('v1')
    ->prefix('v1')
    ->resources(function ($server) {
        $server->resource('collections', JsonApiController::class);
        $server->resource('images', JsonApiController::class)->relationships(function ($relationships) {
            $relationships->hasMany('collections');
            $relationships->hasMany('keywords');
            $relationships->hasMany('comments');
            $relationships->hasOne('location');
        });
        $server->resource('keywords', JsonApiController::class);
        $server->resource('comments', JsonApiController::class);
        $server->resource('locations', JsonApiController::class);
    });