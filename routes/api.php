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

Route::middleware('auth')->namespace('Api')->group(function () {

    Route::post('/image-upload', 'ImageUploadController@imageUploadPost');
    Route::resource('features', 'FeaturesController');
    Route::resource('options', 'OptionsController');
    Route::resource('users', 'UsersController');
    Route::resource('guests', 'GuestsController');

    Route::resource('domains', 'DomainController');
    Route::apiResource('room', 'RoomController');
    Route::resource('geocode-cache', 'GeocodeCacheController');
    Route::resource('questions', 'QuestionsController');
    Route::resource('reviews', 'ReviewsController');
    Route::resource('pages', 'PageController');

    Route::get('feedback', 'FeedbackController@index');
    Route::post('property/query', 'PropertyController@query');
    Route::post('features/language', 'FeaturesController@language');

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

    Route::get('/questions', 'QuestionsController@paginated');
    Route::get('/reviews', 'ReviewsController@paginated');

    Route::get('users', 'UsersController@index')->middleware('isAdmin');
    Route::get('users/{id}', 'UsersController@show')->middleware('isAdminOrSelf');

    Route::get('languages/{id}', 'LanguagesController@get');
    Route::put('languages/{id}', 'LanguagesController@update');

});

Route::group(['namespace' => 'Api'], function() {
    Route::resource('room-types', 'RoomTypesController');
    Route::apiResource('property', 'PropertyController');
    Route::get('features-public', 'FeaturesController@index');
    Route::get('languages', 'LanguagesController@index');
    Route::get('questionsPublic/{property}', 'QuestionsController@indexPublic');
    Route::get('reviewsPublic/{property}', 'ReviewsController@reviewsPublic');
    Route::post('/question/create', 'QuestionsController@create');
    Route::post('/reviews/create', 'ReviewsController@create');
    Route::post('/property/query', 'PropertyController@queryProperty');
    Route::post('/property/queryFilter', 'PropertyController@queryFilter');
    Route::post('/property/querySort', 'PropertyController@querySort');
    Route::post('/property/initMap', 'PropertyController@initMap');
    Route::post('/property/list', 'PropertyController@listUpdate');
    Route::post('search/tooltip', 'PostcodeController@query');
    Route::post('/image-public', 'ImageUploadController@imageUploadPost');
    Route::post('/registration', 'AuthController@registrationProcess');
    Route::post('/feedback', 'FeedbackController@store')->name('got-feedback');
});

Route::group(['namespace' => 'Api', 'prefix' => 'auth'], function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login')->name('api-login');
    Route::get('refresh', 'AuthController@refresh');
    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('user', 'AuthController@user');
        Route::post('logout', 'AuthController@logout');
    });
});
