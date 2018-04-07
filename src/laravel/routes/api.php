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

Route::namespace('Api')->group(function () {
    Route::get('/room',  'RoomController@index')->name('room.index');
    Route::post('/room', 'RoomController@create')->name('room.create');

    Route::get('/comment/{room_name}',  'CommentController@index')->name('comment.index');
    Route::post('/comment', 'CommentController@create')->name('comment.create');
});
