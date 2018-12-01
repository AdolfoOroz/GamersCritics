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

;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/upload', function () {
    return view('upload');
})->name('upload');

Route::get('/reviewpage/{idreview}',['as' => 'show-review', 'uses' => 'ReviewController@show']);
Route::get('/search',['as' => 'search-review', 'uses' => 'ReviewController@search']);
Route::get('/profile/{iduser}',['as' => 'show-profile', 'uses' => 'UserController@show']);

Route::post('/upload/game',['as' => 'upload-games', 'uses' => 'GamesControllers@store']);
Route::post('/upload/review',['as' => 'upload-reviews', 'uses' => 'ReviewController@store']);
Route::post('/reviewpage/{idreview}/comment',['as' => 'upload-comment', 'uses' => 'CommentsController@store']);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');