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
     return view('home');
});


Route::get('/dashboard/login'      , 'Admin\AuthController@login');

Route::group(['prefix'=>'dashboard','middleware'=>'api'],function(){
  
  Route::get('/'                   ,'Admin\DashboardController@index');

  Route::get('settings'            ,'Admin\SettingsController@index');

  Route::resource('users'          ,'Admin\UsersController');

  Route::resource('categorys'      ,'Admin\CategorysController');

  Route::resource('articles'       ,'Admin\ArticlesController');

  Route::resource('partners'        ,'Admin\PartnersController');

  Route::resource('brands'         ,'Admin\BrandsController');

  Route::resource('contact/us'     ,'Admin\ContactUsController');

  Route::resource('subscribe'      ,'Admin\SubscribeController');

  Route::resource('chat'           ,'Admin\ChatController');
    

    
});


Auth::routes();
