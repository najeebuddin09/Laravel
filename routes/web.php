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

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/submitPost', 'postController@submitPost')->middleware('auth');
Route::get('/profile/{id}', 'profileController@profile')->middleware('auth');
Route::get('/', 'Auth\LoginController@showLoginForm');
Route::post('/uploadImage', 'uploadImage@uploadImage')->middleware('auth');
Route::get('/members', 'memberController@showMembers')->middleware('auth');