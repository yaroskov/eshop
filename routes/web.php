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

Auth::routes();

Route::get('/', 'Market\ProductsController@index');

Route::get('/cart', 'PagesController@cart');
Route::get('/profile', 'PagesController@profile');
Route::get('/product', 'PagesController@product');
Route::get('/search', 'PagesController@search');

Route::get('/admin', function () {
    return redirect('admin/products');
});
Route::get('/admin/products', 'Admin\ProductsController@index');

Route::get('/admin/users', 'Admin\UsersController@index');
Route::get('/register-user', 'Admin\UsersController@registerUser');
Route::get('/delete-user', 'Admin\UsersController@deleteUser');

Route::get('/admin/colors', 'Admin\ColorsController@index');
Route::get('/add-color', 'Admin\ColorsController@addColor');
Route::get('/delete-color', 'Admin\ColorsController@deleteColor');

Route::get('/admin/manufacturers', 'Admin\ManufacturersController@index');
Route::get('/add-manufacturer', 'Admin\ManufacturersController@addManufacturer');
Route::get('/delete-manufacturer', 'Admin\ManufacturersController@deleteManufacturer');

Route::get('/admin/sections', 'Admin\SectionsController@index');
Route::get('/add-section', 'Admin\SectionsController@addSection');
Route::get('/delete-section', 'Admin\SectionsController@deleteSection');
