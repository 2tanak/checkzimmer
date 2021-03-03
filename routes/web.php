<?php

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

foreach (app('locale')->getLanguagesAvailable() as $lang) {
    Route::group(
        [
            'prefix' => $lang,
            'middleware' => ['isMaintenance', 'checkLocale', 'checkSubdomain']
        ],
        function() use ($lang) {
            Auth::routes();

            Route::get('/', 'HomeController@index')->name("home-$lang");
            Route::get('/list', 'HomeController@list')->name("list-$lang");
            Route::get('/single', 'HomeController@single')->name("single-$lang");
            Route::get('/single/{slug}', 'HomeController@singleProperty')->name("single-$lang");
            Route::post('/single/{slug}', 'HomeController@singlePropertyAccess')->name("single-access-$lang");
            Route::get('/favorites', 'HomeController@favorites')->name("favorites-$lang");
            Route::get('/plans', 'HomeController@plans')->name("plans-$lang");
            Route::get('/city', 'HomeController@city')->name("city-$lang");
            Route::get('single/question/create', 'Api\QuestionsController@create');
            Route::get('single/review/create', 'Api\ReviewsController@create');
        });
    Route::post('/inquiryForm', 'HomeController@inquiryForm')->name('inquiryForm');
}
Route::group([
        'middleware' => ['isMaintenance']
    ], function() {
        Route::get('/dashboard', 'HomeController@dashboard')->name('home');
        Route::get('/dashboard/{page?}/{subpage?}/{subsubpage?}', 'HomeController@dashboard')->name('dashboard-page');
    });

Route::get('/', 'HomeController@redirect');
