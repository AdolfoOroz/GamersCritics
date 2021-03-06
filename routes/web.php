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
    return view('layouts.welcome');
});

Route::get('/index', function () {
    return view('layouts.Index');
})->name('home');

Route::get('/upload', function () {
    return view('layouts.upload');
})->name('upload');

Route::get('/reviewpage/{idreview}',['as' => 'show-review', 'uses' => 'ReviewController@show']);
Route::get('/search',['as' => 'search-review', 'uses' => 'ReviewController@search']);
Route::get('/profile/{iduser}',['as' => 'show-profile', 'uses' => 'UserController@show']);

Route::post('/upload/game',['as' => 'upload-games', 'uses' => 'GamesControllers@store']);
Route::post('/upload/review',['as' => 'upload-reviews', 'uses' => 'ReviewController@store']);
Route::post('/reviewpage/{idreview}/comment',['as' => 'upload_comment', 'uses' => 'CommentsController@store']);
Route::post('/reviewpage/{idreview}/rating',['as' => 'upload_rating', 'uses' => 'RatingController@store']);
Route::post('/profile/{iduser}/befriends',['as' => 'upload_befriend', 'uses' => 'BefriendController@store']);
Route::post('profile/upload/{idreview}',['as' => 'prepare_review', 'uses' => 'ReviewController@searchedit']);
Route::post('search/{GameID}',['as' => 'search_game', 'uses' => 'ReviewController@searchgame']);
Route::post('/upload/{idreview}/update',['as' => 'edit_reviews', 'uses' => 'ReviewController@edit']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');