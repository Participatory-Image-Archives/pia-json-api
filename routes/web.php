<?php

use App\Models\Image;
use Illuminate\Support\Facades\Route;

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
    return "PIA Data API<br><br><a href='/home'>&mdash; JSON home document</a>";
});

Route::get('/docs', function(){
    return view('docs/index');
});

/**
 * JSON Home Document
 * https://datatracker.ietf.org/doc/html/draft-nottingham-json-home-06
 */
Route::get('/home', function () {

    $home = [
        "api" => [
            "title" => "PIA Data API",
            "links" => [
                "author" => "mailto:adrian.demleitner@unibas.ch"
            ]
        ],
        "resources" => [
            "v1:agents" => [
                "href" => "https://".$_SERVER["HTTP_HOST"]."/api/v1/agents"
            ],
            "v1:albums" => [
                "href" => "https://".$_SERVER["HTTP_HOST"]."/api/v1/albums"
            ],
            "v1:alt-labels" => [
                "href" => "https://".$_SERVER["HTTP_HOST"]."/api/v1/alt-labels"
            ],
            "v1:calls" => [
                "href" => "https://".$_SERVER["HTTP_HOST"]."/api/v1/calls"
            ],
            "v1:call-entries" => [
                "href" => "https://".$_SERVER["HTTP_HOST"]."/api/v1/call-entries"
            ],
            "v1:collections" => [
                "href" => "https://".$_SERVER["HTTP_HOST"]."/api/v1/collections"
            ],
            "v1:comments" => [
                "href" => "https://".$_SERVER["HTTP_HOST"]."/api/v1/comments"
            ],
            "v1:documents" => [
                "href" => "https://".$_SERVER["HTTP_HOST"]."/api/v1/documents"
            ],
            "v1:formats" => [
                "href" => "https://".$_SERVER["HTTP_HOST"]."/api/v1/formats"
            ],
            "v1:images" => [
                "href" => "https://".$_SERVER["HTTP_HOST"]."/api/v1/images?page[size]=250"
            ],
            "v1:jobs" => [
                "href" => "https://".$_SERVER["HTTP_HOST"]."/api/v1/jobs"
            ],
            "v1:keywords" => [
                "href" => "https://".$_SERVER["HTTP_HOST"]."/api/v1/keywords"
            ],
            "v1:literatures" => [
                "href" => "https://".$_SERVER["HTTP_HOST"]."/api/v1/literatures"
            ],
            "v1:maps" => [
                "href" => "https://".$_SERVER["HTTP_HOST"]."/api/v1/maps"
            ],
            "v1:map-entries" => [
                "href" => "https://".$_SERVER["HTTP_HOST"]."/api/v1/map-entries"
            ],
            "v1:map-keys" => [
                "href" => "https://".$_SERVER["HTTP_HOST"]."/api/v1/map-keys"
            ],
            "v1:model-types" => [
                "href" => "https://".$_SERVER["HTTP_HOST"]."/api/v1/model-types"
            ],
            "v1:notes" => [
                "href" => "https://".$_SERVER["HTTP_HOST"]."/api/v1/notes"
            ],
            "v1:object-types" => [
                "href" => "https://".$_SERVER["HTTP_HOST"]."/api/v1/object-types"
            ],
            "v1:places" => [
                "href" => "https://".$_SERVER["HTTP_HOST"]."/api/v1/places"
            ],
        ]
    ];

    return response()->json($home);
});
