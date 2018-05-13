<?php

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
    return view('welcome');
});
Route::get('/search/filter', 'SearchController@filter');
Route::group(['prefix' => 'api/v5.12.300'], function () {
  Route::get('search/filter', 'Api\v512300\SearchController@filter');
});

//Route::get('/v5.12.300/search/filter', 'Api\v512300\SearchController@filter');