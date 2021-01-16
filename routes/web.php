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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/dashboard', 'HomeController@dashboard')->name('home');
Route::get('/dashboard/{page?}/{subpage?}/{subsubpage?}', 'HomeController@dashboard')->name('dashboard-page');
Route::get('/list', 'HomeController@list')->name('list');
Route::get('/single', 'HomeController@single')->name('single');
Route::get('/single/{slug}', 'HomeController@singleProperty')->name('single');
Route::post('/single/{slug}', 'HomeController@singlePropertyAccess')->name('single');
Route::get('/favorites', 'HomeController@favorites')->name('favorites');
Route::get('/plans', 'HomeController@plans')->name('plans');
Route::get('single/question/create', 'Api\QuestionsController@create');
Route::get('single/review/create', 'Api\ReviewsController@create');
