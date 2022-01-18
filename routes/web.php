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

//Auth::routes();
Route::any('/', 'SplictionController@home')->name('home');

Route::group(['prefix'=>'spliction'], function(){
	Route::any('create', 'SplictionController@create')->name('spliction.create');
	Route::any('/', 'SplictionController@list')->name('spliction.listAll');
	Route::any('define', 'SplictionController@definelist')->name('spliction.define');//List all word splices with out definition
	Route::get('define/{spliction?}', 'SplictionController@define')->name('spliction.define');
	Route::post('define/{spliction?}', 'SplictionController@defineSubmission')->name('spliction.defineSubmission');
	Route::any('{spliction?}', 'SplictionController@entry')->name('spliction.entry');
});
Route::group(['prefix'=>'admin'],function(){
	Route::any('login', 'AdminController@authenticate')->name('admin.login');
	Route::any('/', 'AdminController@dashboard')->name('admin.dashboard');
	Route::group(['prefix'=>'splictions'], function(){
		Route::any('list', 'AdminController@list')->name('admin.list');
	});
});
Route::get("test", "SplictionController@test")->name('spliction.test');
Route::group(['prefix'=>'dictionary'], function(){
	Route::any('create','DictionaryController@create')->name('dictionary.create');
});

