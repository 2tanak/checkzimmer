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

    Route::post('/image-upload', 'ImageUploadController@imageUploadPost');
    Route::resource('options', 'OptionsController');
    Route::resource('users', 'UsersController');
    Route::resource('features', 'FeaturesController');
    Route::resource('room-types', 'RoomTypesController');
    Route::apiResource('room', 'RoomController');
    Route::apiResource('property', 'PropertyController');
    Route::resource('geocode-cache', 'GeocodeCacheController');
    Route::resource('questions', 'QuestionsController');
    Route::resource('reviews', 'ReviewsController');

    Route::post('property/query', 'PropertyController@query');

    Route::get('options/bytype/{type}', 'OptionsController@showByType');
    Route::get('property/init', 'PropertyController@init');

    /* Booking integration */
    Route::post('/booking-test', 'BookingController@test');
    Route::post('/booking-cities', 'BookingController@importCities');
    Route::post('/booking-facilities', 'BookingController@importFacilities');
    Route::post('/booking-roomtypes', 'BookingController@importRoomTypes');

    Route::get('/booking-cities', 'BookingController@getCities');
    Route::get('/booking-facilities', 'BookingController@getFeatures');
    Route::get('/booking-roomtypes', 'BookingController@getRoomTypes');
    Route::get('/booking-bedtypes', 'BookingController@getBedTypes');
    Route::get('/booking-showertypes', 'BookingController@getShowerTypes');
    Route::get('/booking-kitchentypes', 'BookingController@getKitchenTypes');

    Route::post('/hotels-request/query', 'BookingController@getHotels');
    Route::post('/hotels-request', 'BookingController@saveHotels');

    Route::post('/property/query', 'PropertyController@queryProperty');
    Route::post('/property/queryFilter', 'PropertyController@queryFilter');
    Route::post('/property/querySort', 'PropertyController@querySort');
    Route::post('/property/initMap', 'PropertyController@initMap');
    Route::post('/property/list', 'PropertyController@listUpdate');

    Route::get('/questions', 'QuestionsController@paginated');
    Route::get('/reviews', 'ReviewsController@paginated');
});


Route::group([
    //'middleware' => 'jwt.auth',
    'namespace' => 'Api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::get('user', 'AuthController@me');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::get('refresh', 'AuthController@refresh');
});
