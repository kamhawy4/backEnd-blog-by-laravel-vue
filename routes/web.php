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




Route::group(['prefix'=>'dashboard','middleware'=>'admin'],function(){
	
  Route::get('/'                   ,'Admin\DashboardController@index');

  Route::get('settings'            ,'Admin\SettingsController@index');

  Route::resource('users'          ,'Admin\UsersController');

  Route::resource('categorys'      ,'Admin\CategorysController');

  Route::resource('articles'       ,'Admin\ArticlesController');

  Route::resource('contact/us'     ,'Admin\ContactUsController');

  Route::resource('subscribe'      ,'Admin\SubscribeController');

  Route::resource('chat'           ,'Admin\ChatController');


});

Auth::routes();
