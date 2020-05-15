<?php

use Illuminate\Support\Facades\Route;

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
//route trang quản trị
Route::get('ghel', function () {
    return view('admin.admin');
});
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    //product
    Route::get('add-product', 'adminController@index')->name('themsp');
    Route::post('add-product', 'adminController@add')->name('addsp');
    Route::get('list-product', 'adminController@list')->name('dssp');
    Route::get('delete-product/{id}', 'adminController@delete')->name('xoasp');
    Route::get('edit-product/{id}', 'adminController@edit')->name('suasp');
    Route::post('edit-product/{id}', 'adminController@update')->name('suasp');

    //account
    Route::get('add-account', 'adminUserController@index')->name('themtk');
    Route::post('add-account', 'adminUserController@add')->name('themtk');
    Route::get('list-account', 'adminUserController@list')->name('dstk');
    Route::get('delete-account/{id}', 'adminUserController@delete')->name('xoatk');
    Route::get('edit-account/{id}', 'adminUserController@edit')->name('suatk');
    Route::post('edit-account/{id}', 'adminUserController@edit')->name('suatk');

    //category
    Route::get('add-category', 'adminCategoryController@index')->name('themdm');
    Route::post('add-category', 'adminCategoryController@add')->name('themdm');
    Route::get('list-category', 'adminCategoryController@list')->name('dsdm');
    Route::get('edit-category/{id}', 'adminCategoryController@edit')->name('suadm');
    Route::post('edit-category/{id}', 'adminCategoryController@update')->name('suadm');
    Route::get('delete-category/{id}', 'adminCategoryController@delete')->name('xoadm');
});

//login
Route::get('admin/login', 'Admin\adminLoginController@login')->name('login');
Route::post('admin/login', 'Admin\adminLoginController@post_login')->name('login');

//FONTEND
Route::get('', 'Fontend\FontendHomeController@home')->name('home');
Route::get('shop.html', 'Fontend\FontendHomeController@shop')->name('shop');
Route::get('/{slug}.html', 'Fontend\FontendHomeController@detail')->name('detail');