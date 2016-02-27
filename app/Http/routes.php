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
    	return view('welcome');
});

Route::get('playlist', function () {
    	return view('playlist');
});

// Search
Route::get('search/{service}/{query}', 'SearchController@show');

// Youtube
Route::get('youtube/search/{query}', 'YoutubeVideoController@search');
Route::get('youtube/search/{query}/{limit}', 'YoutubeVideoController@search');
Route::get('youtube/video/{id}', 'YoutubeVideoController@video');

Route::get('playlist/{id}', 'PlaylistController@show');
Route::get('playlist/{id}/{track}', 'PlaylistController@show');

Route::get('playlist/create/{code}', 'PlaylistController@create');

Route::get('playlist/{id}/insert/{track}', 'PlaylistController@insert');



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

Route::group(['middleware' => ['web', 'use.ssl']], function () {

});
