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

use App\Http\Controllers\UsersController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    //マイページ画面表示
    Route::get('/users', 'UsersController@showUsersForm')->name('user.mypage');
    //ユーザー情報変更画面表示
    Route::get('users/{id}/edit', 'UsersController@editUsersForm')->name('user.edit');
    //ユーザー情報変更処理
    Route::put('users/{id}', 'UsersController@edit')->name('user.update');
    //レビュー投稿画面
    Route::get('/reviews/create', 'ReviewsController@createReviewForm')->name('reviews.create');

});


Route::get('/home', 'HomeController@index')->name('home');
