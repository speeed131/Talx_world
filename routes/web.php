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
    return view('/');
});

Auth::routes();

Route::get('/', 'UserController@index')->name('users.index');
Route::get('/users/search', 'UserController@search')->name('users.search');


// // ResourceControllerで使用したコントローラーにメソッドを追加する時は、
// 必ずResourceControllerのルートの上に記述しましょう。
// ResourceControllerのルートの下に記述すると404エラーとなります。


Route::resource('/users','UserController', ['except'=> ['index']]);

Route::resource('/comments','CommentController')->middleware('auth');




