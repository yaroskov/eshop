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
Route::get('/admin/register-user', 'Admin\UsersController@registerUser');
Route::get('/admin/delete-user', 'Admin\UsersController@deleteUser');

Route::get('/admin/colors', 'Admin\ColorsController@index');
Route::get('/admin/add-color', 'Admin\ColorsController@addColor');
Route::get('/admin/delete-color', 'Admin\ColorsController@deleteColor');

Route::get('/admin/manufacturers', 'Admin\ManufacturersController@index');
Route::get('/admin/add-manufacturer', 'Admin\ManufacturersController@addManufacturer');
Route::get('/admin/delete-manufacturer', 'Admin\ManufacturersController@deleteManufacturer');

Route::get('/admin/sections', 'Admin\SectionsController@index');
Route::get('/admin/add-section', 'Admin\SectionsController@addSection');
Route::get('/admin/delete-section', 'Admin\SectionsController@deleteSection');
