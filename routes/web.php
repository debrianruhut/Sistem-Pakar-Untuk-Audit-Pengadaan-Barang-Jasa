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

Route::group(['middleware' => 'auth'], function () {
	Route::get('/home', 'HomeController@index')->name('home');
	//untuk menambah user admin dan menambahkan array []
	Route::resource('/admin/users', 'UserController', ['as' => 'admin']);
	Route::resource('/admin/categories', 'CategoriesController', ['as' => 'admin']);
	Route::get('/api/datatable/users', 'UserController@dataTable')->name('api.datatable.users');

});
