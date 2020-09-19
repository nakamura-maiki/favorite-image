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
//ログイン後に投稿一覧をマイページに挿入するURL
Route::get('/', 'ItemsController@index');
// Route::get('/', function () {
//     return view('welcome');
// });

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

// マイページ 認証が必要なグループ
Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['show']]);
    Route::resource('items', 'ItemsController', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);
    Route::get('items/categories/{id}', 'ItemsController@search')->name('category.items');
});