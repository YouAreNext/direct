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
    return view('welcome');
});

Auth::routes();


//Route::resource('/home', 'ProjectController')->name('home');
Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth']], function(){

    Route::resource('/data', 'DataController', ['as'=>'admin']);
    Route::resource('/projects', 'ProjectController', ['as'=>'admin']);

});

Route::get('/direct_data','MainController@directData');