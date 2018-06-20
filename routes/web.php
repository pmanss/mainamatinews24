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

Route::get('/', 'IndexController@homePage');
Route::get('/home', 'IndexController@dashboard');
Route::get('/homePage', 'IndexController@homePage');
Route::get('/category/{id}/{any}', 'IndexController@categoryNews');
Route::get('/category/{cid}/subcategory/{scid}/{any}', 'IndexController@subcategoryNews');
Route::get('/news-post/{id}/{any}', 'IndexController@newsPostData');
Route::post('User/ajax/districtData/', 'IndexController@ajaxDistrictData');
Route::post('/country', 'IndexController@countrydiv');
Route::get('/news/date/{any}', 'IndexController@calendarDate');
Route::post('/search', 'IndexController@searchQuery');


Auth::routes();
Route::get('/Admin/login', 'IndexController@login');
//admin panel
Route::group(['middleware' => 'auth'], function () {
	
Route::get('/admin/dashboard', 'IndexController@dashboard');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
//reporter
Route::get('Admin/reporter', 'ReporterController@index');
Route::post('Admin/reporter-add', 'ReporterController@create');
Route::get('Admin/reporter/delete/{id}', 'ReporterController@destroy');
Route::get('Admin/reporter/edit/{id}', 'ReporterController@show');
Route::post('Admin/reporter-update/{id}', 'ReporterController@update');
//category
Route::get('Admin/category', 'CategoryController@index');
Route::post('Admin/category-add', 'CategoryController@create');
Route::get('Admin/category/delete/{id}', 'CategoryController@destroy');
Route::get('Admin/category/edit/{id}', 'CategoryController@show');
Route::post('Admin/category-update/{id}', 'CategoryController@update');
//sub_category
Route::get('Admin/sub_category', 'SubcategoryController@index');
Route::post('Admin/sub_category-add', 'SubcategoryController@create');
Route::get('Admin/sub_category/edit/{id}', 'SubcategoryController@show');
Route::post('Admin/sub_category/update/{id}', 'SubcategoryController@update');
Route::get('Admin/sub_category/delete/{id}', 'SubcategoryController@destroy');
//country
//Route::get('/category', 'CategoryController@index');
//Route::post('/category/add', 'CategoryController@create');
//Route::get('/category/delete/{id}', 'CategoryController@destroy');
//Route::get('/category/edit/{id}', 'CategoryController@show');
//Route::post('/category/update/{id}', 'CategoryController@update');
//divisions
Route::get('Admin/divisions', 'DivisionController@index');
Route::post('Admin/divisions/add', 'DivisionController@create');
Route::get('Admin/divisions/delete/{id}', 'DivisionController@destroy');
Route::get('Admin/divisions/edit/{id}', 'DivisionController@show');
Route::post('Admin/divisions/update/{id}', 'DivisionController@update');
//district
Route::get('Admin/district', 'DistrictController@index');
Route::post('Admin/district/add', 'DistrictController@create');
Route::get('Admin/district/delete/{id}', 'DistrictController@destroy');
Route::get('Admin/district/edit/{id}', 'DistrictController@show');
Route::post('Admin/district/update/{id}', 'DistrictController@update');
//news_article
Route::get('Admin/news_article', 'ComposeNewsController@index');
Route::post('Admin/ajax/districtData/', 'ComposeNewsController@ajaxDistrict');
Route::post('Admin/ajax/ajaxsubcatdata/', 'ComposeNewsController@ajaxsubcat');
Route::post('Admin/news_article/add', 'ComposeNewsController@create');
Route::get('Admin/news/article/list', 'ComposeNewsController@newslist');
Route::get('Admin/news/article/list/edit/{id}', 'ComposeNewsController@show');
Route::get('Admin/news/article/list/delete/{id}', 'ComposeNewsController@destroy');
Route::post('Admin/news_article/update/{id}', 'ComposeNewsController@update');


Route::get('Admin/breakingnews', 'BreakingnewsController@index');
Route::post('Admin/breakingnews/add', 'BreakingnewsController@create');
Route::get('Admin/breakingnews/delete/{id}', 'BreakingnewsController@destroy');


//advertisement
Route::get('Admin/advertisement', 'AdvertisementController@index');
Route::post('Admin/advertisement/add', 'AdvertisementController@create');
Route::get('Admin/advertisement/delete/{id}', 'AdvertisementController@destroy');
Route::get('Admin/advertisement/edit/{id}', 'AdvertisementController@show');
Route::post('Admin/advertisement/update/{id}', 'AdvertisementController@update');

Route::get('/Admin/user', 'IndexController@newuser');
Route::post('/Admin/user/update', 'IndexController@updateUserInfo');
Route::get('/Admin/unlock', 'IndexController@unlock');
});