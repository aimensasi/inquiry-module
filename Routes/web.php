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


Route::middleware('auth')->group(function(){
	/**
	*
	* Inquiries Resouces Routes
	*
	*/
	Route::resource('inquiries', 'InquiriesControllers\Browser\InquiriesController');
	Route::name('api.')->prefix('api')->group(function(){
		Route::resource('inquiries', 'InquiriesControllers\API\InquiriesController');
	});
});
