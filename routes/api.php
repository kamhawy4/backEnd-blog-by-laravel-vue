<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {

});

Route::group(['middleware' => 'api'], function ($router) {
    Route::post('dashboard/login'                     , 'Api\AuthController@login');
    Route::post('dashboard/refresh'                   , 'Api\AuthController@refresh');
});


Route::group(['middleware' => 'auth:api','prefix' => 'dashboard'], function ($router) {

    Route::get('/'                           ,'Api\ApiDashboardController@index');
 
    Route::post('logout'                     , 'Api\AuthLogOutController@logout');
    
	Route::get('get/settings'                ,'Api\ApiSettingsControler@GetData');
	Route::post('store/settings/{id}'        ,'Api\ApiSettingsControler@update');

	Route::resource('users'                  ,'Api\ApiUsersControler');

	Route::resource('categorys'              ,'Api\ApiCategorysController');

	Route::resource('brands'                 ,'Api\ApiBrandsController');

	Route::resource('articles'               ,'Api\ApiArticlesController');	
	Route::post('editarticles/{article_id}'  ,'Api\ApiArticlesController@update');	

	Route::get('allcategory/artical'         ,'Api\ApiArticlesController@AllCategoryArtical');
	Route::get('editcategory/artical'        ,'Api\ApiArticlesController@EditCategoryArtical');

	Route::resource('contact/us'             ,'Api\ApiContactUsController');

	Route::resource('subscribe'              ,'Api\SubscribeController');

	Route::resource('chat'                   ,'Api\ApiChatController');

	Route::post('send/all/message'           ,'Api\ControllersendAllMessage@SendMessage');


});


