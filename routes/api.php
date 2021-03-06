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
    return $request->user();
});


Route::group(['prefix' => 'v1' , 'namespace' => 'Api' ] , function() {
    Route::post('register' , 'AuthController@register');
    Route::post('login' , 'AuthController@login');
    Route::post('logout' , 'AuthController@logout');
    Route::post('profile' , 'ClientController@profile');
    Route::put('updateprofile' , 'ClientController@update_profile');
    Route::post('requestdonation' , 'ClientController@request_donation');
    Route::get('donation/{id}' , 'ClientController@donation_request');
    Route::get('donations' , 'ClientController@donations');
    Route::get('articles' , 'ClientController@articles');
    Route::get('article/{id}' , 'ClientControlelr@article');
    Route::post('favarticle/{id}' , 'ClientController@fav_article');
    Route::post('unfavarticle/{id}' , 'ClientController@unfav_article');
    Route::get('categories' , 'ClientController@categories');
    Route::get('articles-category/{id}' , 'ClientController@articles_bycategory');
    Route::post('report'  , 'ClientController@report');
    Route::post('contact' , 'ClientController@contact');
    Route::post('store_notification_settings', 'ClientController@store_notification_settings');
    Route::post('get_notifications' , 'ClientController@get_notifications');
    Route::post('request_reset_password' , 'ClientController@request_reset_password');
    Route::post('reset_password' , 'ClientController@confirm_pincode_and_reset_password');
});

Route::group(['prefix' => 'v1' , 'namespace'=> 'Api' ] , function() {
    Route::post('password/email', 'AuthController@sendresetpassword');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

});
