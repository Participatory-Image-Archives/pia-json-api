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

        /**
         * Object Schemas
         */
        $server->resource('collections', JsonApiController::class)->relationships(function ($relationships) {
            $relationships->hasMany('images');
            $relationships->hasMany('documents');
            $relationships->hasMany('comments');
            $relationships->hasMany('literatures');
            $relationships->hasMany('alt-labels');
            $relationships->hasMany('keywords');
            $relationships->hasMany('agents');

            $relationships->hasMany('maps');
            $relationships->hasMany('notes');

            $relationships->hasOne('date');
        });

        $server->resource('images', JsonApiController::class)->relationships(function ($relationships) {
            $relationships->hasMany('collections');
            $relationships->hasMany('documents');
            $relationships->hasMany('keywords');
            $relationships->hasMany('comments');
            $relationships->hasMany('agents');

            $relationships->hasOne('date');
            $relationships->hasOne('place');
        });

        $server->resource('albums', JsonApiController::class)->relationships(function ($relationships) {
            $relationships->hasMany('collections');
            $relationships->hasMany('date');
            $relationships->hasMany('images');
            $relationships->hasMany('comments');
            $relationships->hasMany('agents');
        });

        $server->resource('documents', JsonApiController::class)->relationships(function ($relationships) {
            $relationships->hasMany('aggregations');
            $relationships->hasMany('collections');
            $relationships->hasMany('maps');
            $relationships->hasMany('map-entries');
        });

        $server->resource('keywords', JsonApiController::class)->relationships(function ($relationships) {
            $relationships->hasMany('collections');
            $relationships->hasMany('images');
            $relationships->hasMany('alt-labels');
        });

        $server->resource('comments', JsonApiController::class)->relationships(function ($relationships) {
            $relationships->hasMany('collections');
            $relationships->hasMany('images');
        });

        $server->resource('alt-labels', JsonApiController::class);

        $server->resource('notes', JsonApiController::class)->relationships(function ($relationships) {
            $relationships->hasMany('collections');
        });

        /**
         * Calls
         */
        $server->resource('calls', JsonApiController::class)->relationships(function ($relationships) {
            $relationships->hasMany('call-entries');
            $relationships->hasMany('keywords');
            $relationships->hasOne('collection');
        });

        $server->resource('call-entries', JsonApiController::class)->relationships(function ($relationships) {
            $relationships->hasOne('calls');
        });

        /*
         * Metadata Schemas
         */
        $server->resource('agents', JsonApiController::class)->relationships(function ($relationships) {
            $relationships->hasMany('images');
            $relationships->hasMany('collections');
        });

        $server->resource('places', JsonApiController::class)->relationships(function ($relationships) {
            $relationships->hasMany('images');
        });

        $server->resource('literatures', JsonApiController::class);

        $server->resource('jobs', JsonApiController::class);

        $server->resource('dates', JsonApiController::class)->relationships(function ($relationships) {
            $relationships->hasMany('images');
        });

        $server->resource('formats', JsonApiController::class)->relationships(function ($relationships) {
            $relationships->hasMany('images');
        });

        $server->resource('model-types', JsonApiController::class)->relationships(function ($relationships) {
            $relationships->hasMany('images');
        });

        $server->resource('object-types', JsonApiController::class)->relationships(function ($relationships) {
            $relationships->hasMany('images');
        });

        /**
         * Mapping Schemas
         */
        $server->resource('maps', JsonApiController::class)->relationships(function ($relationships) {
            $relationships->hasOne('map-keys');

            $relationships->hasMany('map-layers');
            $relationships->hasMany('linked-layers');
            $relationships->hasMany('map-entries');
            $relationships->hasMany('documents');
        });

        $server->resource('map-layers', JsonApiController::class)->relationships(function ($relationships) {
            $relationships->hasOne('map');
            $relationships->hasMany('map-entries');
        });

        $server->resource('map-entries', JsonApiController::class)->relationships(function ($relationships) {
            $relationships->hasMany('map-keys');
            $relationships->hasMany('documents');

            $relationships->hasOne('map');
            $relationships->hasOne('map-layer');
            $relationships->hasOne('place');
            $relationships->hasOne('image');
        });

        $server->resource('map-keys', JsonApiController::class)->relationships(function ($relationships) {
            $relationships->hasMany('map-entries');

            $relationships->hasOne('map');
        });

    });
