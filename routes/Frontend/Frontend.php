<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'
 */
Route::get('/', 'FrontendController@index')->name('index');
Route::get('macros', 'FrontendController@macros')->name('macros');
Route::get('/products','FrontendController@products')->name('products');
Route::get('/about','FrontendController@about')->name('about');
Route::get('/contact','FrontendController@contact')->name('contact');
Route::post('/send_message','FrontendController@send_message')->name('send_message');
Route::get('/faqs','FrontendController@faqs')->name('faqs');
Route::get('/services','FrontendController@services')->name('services');
Route::get('/shoppingcart','CartController@index')->name('shoppingcart');
Route::get('/addtocart/{id}','CartController@add')->name('addtocart');
Route::get('/product_details/{id}','FrontendController@product_details')
->name('product_details');


/**
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth'], function () {

	Route::get('/checkout','CartController@checkout')->name('checkout');
	Route::post('/checkout_process','CartController@checkout_process')->name('checkout_process');

	Route::get('/thankyou','CartController@thankyou')->name('thankyou');

	Route::group(['namespace' => 'User', 'as' => 'user.'], function() {
		/**
		 * User Dashboard Specific
		 */
		Route::get('dashboard', 'DashboardController@index')->name('dashboard');

		/**
		 * User Account Specific
		 */
		Route::get('account', 'AccountController@index')->name('account');

		/**
		 * User Profile Specific
		 */
		Route::patch('profile/update', 'ProfileController@update')->name('profile.update');
	});
});

