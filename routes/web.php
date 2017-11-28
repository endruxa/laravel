<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('about', 'HomeController@about')->name('about');

/*
 * Database testing
 */
    Route::group(['prefix' => 'db'], function(){
    Route::get('insert', 'DBController@insert');
    Route::get('select', 'DBController@select');
});


    Route::get('validate', 'ValidateController@index');
    Route::get('validate/form', 'ValidateController@form');
    Route::post('validate/form', 'ValidateController@store');

/*
 * Articles area
 */
   Route::group(['prefix'=>'blog'], function (){
   Route::get('/', 'BlogController@index')->name('blog.index');
   Route::get('/{article}/show', 'BlogController@show')->name('blog.show');
   Route::get('add', 'BlogController@add');
   Route::post('add', 'BlogController@store')->name('blog.store')->middleware('auth');
   Route::put('/{article}/edit', 'BlogController@edit')->name('blog.edit')->middleware('auth');
   Route::put('/{article}/update', 'BlogController@update')->name('blog.update')->middleware('auth');
   Route::put('/{article}/delete', 'BlogController@delete')->name('blog.delete')->middleware('auth');

});


   /*
    *Request Area
   */

   Route::group(['prefix'=>'request'], function ()
   {
      Route::get('/', 'RequestController@index');
      Route::post('/', 'RequestController@putData');
   });

   Route::group(['prefix'=>'dashboard', 'namespace'=>'Admin', 'middleware'=>'admin'], function()
   {
       Route::get('/', 'DashboardController@index')->name('dashboard.main');
   });



