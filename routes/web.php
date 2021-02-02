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

Route::get('/', function () {
    return view('guestIndex');
});
/*Authentication */
Route::get('/login', 'Auth\AuthController@login')->name('login');
Route::post('/login', 'Auth\AuthController@authenticate');
Route::get('logout', 'Auth\AuthController@logout')->name('logout');
/*Guest Post List*/
Route::resource('/','Guest\GuestController');
Route::post('getName', 'Post\PostController@getName')->name('getName');
Route::get('searchByGuest','Guest\GuestController@searchByGuest')->name('searchByGuest');
Route::get('/guestIndex','Guest\GuestController@index')->name('guestIndex');
//
/*Post CRUD routes*/
Route::resource('posts','Post\PostController');
Route::get('posts/create/confirmCreatePost', 'Post\PostController@confirmCreatePost')->name('confirmCreatePost');
Route::post('store', 'Post\PostController@store')->name('store');
Route::get('confirmUpdatePost','Post\PostController@confirmUpdatePost')->name('confirmUpdatePost');
Route::post('updating','Post\PostController@updating')->name('updating');
Route::get('searchPost','Post\PostController@searchPost')->name('searchPost');
Route::post('getUserName', 'Post\PostController@getUserName')->name('getUserName');
/*User CRUD routes*/
Route::resource('users','User\UserController');
Route::get('showUserProfile','User\UserController@showUserProfile')->name('showUserProfile');
Route::post('users/create/confirmCreateUser', 'User\UserController@confirmCreateUser')->name('confirmCreateUser');
Route::post('saveUser','User\UserController@saveUser')->name('saveUser');
Route::get('/users/{id}/showDel', 'User\UserController@showDel')->name('showDel');
Route::post('del','User\UserController@del')->name('del');
Route::get('searchUser','User\UserController@searchUser')->name('searchUser');
Route::get('confirmUpdateUser','User\UserController@confirmUpdateUser')->name('confirmUpdateUser');
Route::get('updatingUser','User\UserController@updatingUser')->name('updatingUser');
Route::post('getCreateUser', 'Post\PostController@getCreateUser')->name('getCreateUser');
//