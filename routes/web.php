<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', 'HomeController@index');
Route::get('/login', 'UsersController@index')->name('login');
Route::post('/login', 'UsersController@login')->name('login_form');
Route::get('/register', 'UsersController@reg_index')->name('register');
Route::post('/reg', 'UsersController@register')->name('register_form');
Route::get('locale','UsersController@locale');
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::middleware(['auth'])->group(function (){
    Route::group(['middleware'=>'is_admin'],function (){

        Route::get('/admin','AdminController@index');

        Route::get('/admin/category_list','Admin_categoryController@category_list')->name('category_list');
        Route::get('/admin/create_category','Admin_categoryController@create_category')->name('create_category');
        Route::post('/admin/create','AdminController@create')->name('create');
        Route::post('/admin/edit_cat','Admin_categoryController@edit_cat')->name('edit_cat');
        Route::post('/admin/delete','Admin_categoryController@delete')->name('delete');
        Route::get('/admin/edit/{id}','Admin_categoryController@edit')->name('edit');

        Route::get('/admin/country_list','Admin_countryController@index')->name('country_list');
        Route::get('/admin/create_country','Admin_countryController@create')->name('create_country');
        Route::post('/admin/create_country','Admin_countryController@add')->name('country_add');
        Route::get('/admin/country/edit/{id}','Admin_countryController@edit')->name('country_edit');
        Route::post('/admin/country/edit','Admin_countryController@edit_country')->name('edit_country');
        Route::post('/admin/country/delete','Admin_countryController@delete');

        Route::get('/admin/town','Admin_sityController@index')->name('sity_list');
        Route::get('/admin/town/create','Admin_sityController@create')->name('create_town');
        Route::post('/admin/town/create','Admin_sityController@add')->name('town_add');
        Route::get('/admin/town/edit/{id}','Admin_sityController@edit')->name('town_edit');

        Route::get('/admin/contact','ContactController@index')->name('contact');

    });

});
