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
    return view('/top');
});

Auth::routes();

Route::get('/users/following/{user}', 'UserController@following')->name('users.following');

Route::get('/users/follow/{user}', 'UserController@follow')->name('users.follow');
Route::get('/users/unfollow/{user}', 'UserController@unfollow')->name('users.unfollow');

Route::get('/', 'UserController@index')->name('users.index');
Route::get('/users/search', 'UserController@search')->name('users.search');

Route::get('/users/confirm', 'UserController@confirm')->name('users.confirm');


// // ResourceControllerで使用したコントローラーにメソッドを追加する時は、
// 必ずResourceControllerのルートの上に記述しましょう。
// ResourceControllerのルートの下に記述すると404エラーとなります。


Route::resource('/users','UserController', ['except'=> ['index', 'create']]);


Route::resource('/comments','CommentController',['only' => ['create', 'store']])->middleware('auth');




