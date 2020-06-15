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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::middleware('api')->namespace('Api')->group(function () {

    Route::resource('options', 'OptionsController');
    Route::resource('users', 'UsersController');
    Route::resource('features', 'FeaturesController');
    Route::resource('room-types', 'RoomTypesController');
    Route::get('/options/bytype/{type}', 'OptionsController@showByType');
    /* Booking integration */
    Route::post('/booking-test', 'BookingController@test');
    Route::post('/booking-cities', 'BookingController@importCities');
    Route::post('/booking-facilities', 'BookingController@importFacilities');
    Route::post('/booking-roomtypes', 'BookingController@importRoomTypes');

    Route::get('/booking-facilities', 'BookingController@getFeatures');
    Route::get('/booking-roomtypes', 'BookingController@getRoomTypes');
});
