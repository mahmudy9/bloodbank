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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin' , 'AdminController@index');
/////////////////////////////////////
Route::get('/admin/cities' , 'AdminController@cities');
Route::post('/admin/createcity' , 'AdminController@create_city');
Route::get('/admin/editcity/{cityid}' , 'AdminController@edit_city');
Route::put('/admin/updatecity' , 'AdminController@update_city');
Route::get('/admin/deletecity/{cityid}' , 'AdminController@delete_city');
Route::delete('/admin/destroycity' , 'AdminController@destroy_city');
Route::post('/admin/dontdestroycity' , 'AdminController@dont_destroy_city');
///////////////////////////////////////
Route::get('/admin/governerates' , 'AdminController@governerates');
Route::post('/admin/creategovernerate' , 'AdminController@create_governerate');
Route::get('/admin/editgovernerate/{governerateid}' , 'AdminController@edit_governerate');
Route::put('/admin/updategovernerate' , 'AdminController@update_governerate');
Route::get('/admin/deletegovernerate/{governerateid}' , 'AdminController@delete_governerate');
Route::delete('/admin/destroygovernerate' , 'AdminController@destroy_governerate');
Route::post('/admin/dontdestroygovernerate' , 'AdminController@dont_destroy_governerate');
//////////////////////////////////////
Route::get('/admin/bloods' , 'AdminController@bloods');
Route::post('/admin/createblood' , 'AdminController@create_bloodtype');
Route::get('/admin/editblood/{bloodid}' , 'AdminController@edit_blood');
Route::put('/admin/updateblood' , 'AdminController@update_blood');
Route::get('/admin/deleteblood/{bloodid}' , 'AdminController@delete_blood');
Route::delete('/admin/destroyblood' , 'AdminController@destroy_blood');
Route::post('/admin/dontdestroyblood' , 'AdminController@dont_destroy_blood');
////////////////////////////////////////
Route::get('/admin/donations' , 'AdminController@donations');
Route::get('/admin/donations/delete/{donationid}' , 'AdminController@delete_donation');
Route::delete('/admin/donations/destroy' , 'AdminController@destroy_donation');
Route::post('/admin/donations/dontdestroy' , 'AdminController@dont_destroy_donation');
////////////////////////////////////////
Route::get('/admin/articles' , 'AdminController@articles');
Route::post('/admin/articles/create' , 'AdminController@create_article');
Route::get('/admin/articles/show/{articleid}' , 'AdminController@show_article');
Route::get('/admin/articles/edit/{articleid}' , 'AdminController@edit_article');
Route::put('/admin/articles/update' , 'AdminController@update_article');
Route::get('/admin/articles/delete/{articleid}' , 'AdminController@delete_article');
Route::delete('/admin/articles/destroy' , 'AdminController@destroy_article');
Route::post('/admin/articles/dontdestroy' , 'AdminController@dont_destroy_article');
//////////////////////////////////////
Route::get('/admin/categories' , 'AdminController@categories');
Route::post('/admin/categories/create' , 'AdminController@create_category');
Route::get('/admin/categories/edit/{categoryid}' , 'AdminController@edit_category');
Route::put('/admin/categories/update' , 'AdminController@update_category');
Route::get('/admin/categories/delete/{categoryid}' , 'AdminController@delete_category');
Route::delete('/admin/categories/destroy' , 'AdminController@destroy_category');
Route::post('/admin/categories/dontdestroy' , 'AdminController@dont_destroy_category');
//////////////////////////////////////
Route::get('/admin/clients' , 'AdminController@clients');
Route::get('/admin/clients/delete/{clientid}' , 'AdminController@delete_client');
Route::delete('/admin/clients/destroy' , 'AdminController@destroy_client');
Route::post('/admin/clients/dontdestroy' , 'AdminController@dont_destroy_client');
//////////////////////////////////////
Route::get('/admin/contacts' , 'AdminController@contacts');
Route::get('/admin/contacts/delete/{contactid}' , 'AdminController@delete_contact');
Route::delete('/admin/contacts/destroy' , 'AdminController@destroy_contact');
Route::post('/admin/contacts/dontdestroy' , 'AdminController@dont_destroy_contact');
//////////////////////////////////////
Route::get('/admin/reports' , 'AdminController@reports');
Route::get('/admin/reports/delete/{reportid}' , 'AdminController@delete_report');
Route::delete('/admin/reports/destroy' , 'AdminController@destroy_report');
Route::post('/admin/reports/dontdestroy' , 'AdminController@dont_destroy_report');
