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



// Auth Routes
Auth::routes();


Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login') ;
Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.submit') ;
Route::get('admin', 'AdminController@index')->name('admin.dash');

Route::get('auth/login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@Login');
Route::get('logout', 'Auth\LoginController@Logout');

// Registration Routes
Route::get('auth/register', 'Auth\RegisterController@getRegister');
Route::post('auth/register', 'Auth\RegisterController@getRegister');

Route::resource('image', 'ImageController');


Route::get('articles/category/{catslug}'	
								, [ 'uses'  =>  'ArticlesController@getPostCategory' , 'as'    =>  'PostCategory'] );

Route::get('articles'			, ['as' => 'articles.index' , 'uses' => 'ArticlesController@getindex']);
Route::get('articles/{slug}'	, ['as' => 'articles.single' , 'uses' => 'ArticlesController@getSingle'])->where('slug', '[\w\d\-\_]+');

Route::get('videos/{vidslug}'		, ['as' => 'videos.video' , 'uses' => 'VideoViewController@getVideo'])->where('slug', '[\w\d\-\_]+');

Route::get('/videos'		, ['as' => 'videos.index' , 'uses' => 'VideoViewController@getIndex']);

Route::get('events/{slug}'		, ['as' => 'event.single' , 'uses' => 'EventViewController@getSingle'])->where('slug', '[\w\d\-\_]+');
Route::get('/events', ['as' => 'event.index' , 'uses' => 'EventViewController@getIndex']);



			
Route::get('services'	  		, ['as' => 'services' , 'uses' => 'PagesController@getServices' ]);
Route::get('about'				, ['as' => 'about', 'uses' => 'PagesController@getAbout']);
Route::get('advertise'			, ['as' => 'advertise', 'uses' => 'PagesController@getAdvertise' ]);
Route::get('faq'				, ['as' => 'faq', 'uses' => 'PagesController@getFaq']);
Route::get('privacy'			, ['as' => 'privacy', 'uses' => 'PagesController@getPrivacy']);
Route::get('terms'				, ['as' => 'ternms', 'uses' => 'PagesController@getTerms']);
Route::get('careers'			, ['as' => 'careers', 'uses' => 'PagesController@getCareers']);

Route::get('contact'			, ['as' => 'support.contact', 'uses' => 'PagesController@getContact']);

Route::post('contact'			, ['as' => 'post.contact', 'uses' => 'PagesController@postContact']);

Route::get('/', 'PagesController@getIndex');

route::resource('dash/posts', 'PostController');
route::resource('dash/videos', 'VideoController');
route::resource('dash/events', 'EventController');
route::resource('dash/music', 'MusicController');

route::resource('tags', 'TagController', ['except' => ['create']]);











