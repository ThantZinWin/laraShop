<?php

/**
 * All route names are prefixed with 'admin.'
 */
Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::resource("categories","CategoryController");

Route::resource("products","ProductController");

Route::resource("orders","OrderController");

Route::resource("settings","SettingController");

Route::resource("pages","PageController");

Route::resource("brands","BrandController");

Route::resource("myorders","MyorderController");
