<?php
//Home
Route::get('/',[
	'uses' => 'SiteController@index',
	'as' => 'site.home',
]);

//Kategori site
Route::get('/kategori/{data}',[
	'uses' => 'SiteController@kategori',
	'as' => 'site.kategori',
]);

//Semua Artikel
Route::get('/artikel/',[
	'uses' => 'SiteController@artikel',
	'as' => 'site.artikel',
]);

Route::get('/artikel/show/{slug}',[
	'uses' => 'SiteController@show',
	'as' => 'site.artikel.detail',
]);

Route::get('/admin',[
	'uses' => 'AuthController@index',
	'as' => 'dashboard.index',
]);

//Artikel
Route::resource('post', 'PostController');

Route::post('/post/store',[
	'uses' => 'PostController@store',
	'as' => 'post.store',
]);

Route::post('/galery/store',[
	'uses' => 'PostController@galery',
	'as' => 'galery.store',
]);

//Category
Route::resource('category', 'CategoryController');

Route::post('/category/store',[
	'uses' => 'CategoryController@store',
	'as' => 'category.store',
]);

//Setting web
Route::get('/setting/web',[
	'uses' => 'SettingController@web',
	'as' => 'setting.web',
]);

Route::post('/setting/update',[
	'uses' => 'SettingController@update',
	'as' => 'setting.update',
]);

Route::get('/setting/harga',[
	'uses' => 'SettingController@harga',
	'as' => 'setting.harga',
]);

Route::post('/setting/harga/update/{id}',[
	'uses' => 'SettingController@updateharga',
	'as' => 'setting.update.harga',
]);

Route::get('/setting/akun',[
	'uses' => 'SettingController@akun',
	'as' => 'setting.akun',
]);

Route::post('/setting/akun/update',[
	'uses' => 'SettingController@updateakun',
	'as' => 'setting.update.akun',
]);

//Login
Route::get('/loginadmin',[
	'uses' => 'AuthController@login',
	'as' => 'auth.login',
]);
Route::post('/dologin',[
	'uses' => 'AuthController@dologin',
	'as' => 'auth.dologin',
]);
Route::get('/logout',[
	'uses' => 'AuthController@logout',
	'as' => 'auth.logout',
]);
Route::get('/register',[
	'uses' => 'AuthController@register',
	'as' => 'auth.register',
]);
Route::post('/store',[
	'uses' => 'AuthController@store',
	'as' => 'auth.store',
]);
Route::get('/profile/{id}',[
	'uses' => 'AuthController@profile',
	'as' => 'auth.profile',
]);
Route::post('/auth/update/{id}',[
	'uses' => 'AuthController@update',
	'as' => 'auth.update',
]);
Route::get('/change',[
	'uses' => 'AuthController@showChangePwd',
	'as' => 'auth.change',
]);
Route::post('/pwd',[
	'uses' => 'AuthController@changePwd',
	'as' => 'auth.pwd',
]);