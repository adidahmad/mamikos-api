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

// create rooms
Route::post('room/create', 'OwnerController@CreateRooms');

// update a room
Route::post('room/update', 'OwnerController@UpdateRoom');

// get all room
Route::get('room', 'OwnerController@GetAllRoom');

// get room detail
Route::get('room/detail/{id}', 'OwnerController@GetRoomDetail');

// get room by sorting
Route::get('room/{sort}', 'OwnerController@GetRoomBySorting');

// get room by search type
Route::post('room', 'OwnerController@GetRoomBySearchType');

// delete a room
Route::delete('room/delete/{id}', 'OwnerController@DeleteRoom');

// check room availability
Route::post('room/check', 'UserController@CheckRoom');