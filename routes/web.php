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

Route::group([
    'middleware' => ['isMaintenance']
], function () {
    Route::get('/dashboard', 'HomeController@dashboard')->name('home');
    Route::get('/dashboard/{page?}/{subpage?}/{subsubpage?}', 'HomeController@dashboard')->name('dashboard-page');

});
Route::get('/de', 'HomeController@redirect');


$locales = app('locale')->getLanguagesAvailable();
$defaultLocale = app('locale')->getDefaultLocale();

foreach ($locales as $locale) {
    $prefix = $locale != $defaultLocale ? $locale : null;
    Route::group(
        [
            'prefix' => $prefix,
            'middleware' => ['isMaintenance', 'checkLocale', 'checkSubdomain']
        ],
        function () use ($locale, $defaultLocale) {
            Route::get('/', 'HomeController@index')->name("home-$locale");
        });
}
foreach ($locales as $locale) {
    $prefix = $locale != $defaultLocale ? $locale : null;
    Route::group(
        [
            'prefix' => $prefix,
            'middleware' => ['isMaintenance', 'checkLocale', 'checkSubdomain']
        ],
        function () use ($locale) {
            Auth::routes();

            Route::get('/single', 'HomeController@single')->name("single-$locale");
            Route::get('/single/{slug}', 'HomeController@singleProperty')->name("single-$locale");
            Route::post('/single/{slug}', 'HomeController@singlePropertyAccess')->name("single-access-$locale");
            Route::get('/favorites', 'HomeController@favorites')->name("favorites-$locale");
            Route::get('/plans', 'HomeController@plans')->name("plans-$locale");
            Route::get('/city', 'HomeController@city')->name("city-$locale");
            Route::get('/property-request', 'HomeController@propertyRequest')->name("property-request-$locale");
            Route::get('/feedback/{code}', 'HomeController@rate')->name("rate-$locale");
            Route::get('single/question/create', 'Api\QuestionsController@create');
            Route::get('single/review/create', 'Api\ReviewsController@create');
            Route::post('/inquiryForm', 'HomeController@inquiryForm')->name("inquiryForm-$locale");
            Route::post('/findSubdomainRedirect', 'HomeController@getUrlForRedirectOnSubdomain')->name("findSubdomainRedirect-$locale");

            Route::get('/registration', 'HomeController@registration')->name("registration-$locale");

            Route::get('/{page}', 'HomeController@singlePage')->name("singlePage");
        });
}
