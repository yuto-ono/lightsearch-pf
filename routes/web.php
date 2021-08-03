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

//レビュー一覧
Route::get('/', 'ReviewsController@index')->name('index');

//ゲストログイン
Route::get('guest', 'Auth\LoginController@guestLogin')->name('login.guest');

Auth::routes();

Route::group(['middleware' => ['auth'], 'as' => 'user.'], function () {
    //マイページ画面表示
    Route::get('/users', 'UsersController@showUsersForm')->name('mypage');
    //ユーザー情報変更画面表示
    Route::get('/users/{id}/edit', 'UsersController@editUsersForm')->name('edit');
    //ユーザー情報変更処理
    Route::put('/users/{id}', 'UsersController@edit')->name('update');

});
Route::group(['middleware' => ['auth'], 'as' => 'reviews.'], function () {
    //レビュー投稿画面
    Route::get('/reviews/create', 'ReviewsController@createReviewForm')->name('create');
    //レビュー投稿処理
    Route::post('/reviews', 'ReviewsController@create')->name('post');
    //レビュー詳細画面表示
    Route::get('/reviews/{id}/show', 'ReviewsController@showReviewForm')->name('show');
    //レビュー編集処理
    Route::put('/reviews/{id}', 'ReviewsController@update')->name('update');
    //レビュー編集画面表示
    Route::get('/reviews/{id}/edit', 'ReviewsController@editReviewForm')->name('edit');
    //レビュー削除
    Route::delete('/reviews/{id}', 'ReviewsController@destroy')->name('delete');
});





