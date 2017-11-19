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

/*
 * Articles area
 */
Route::group(['prefix'=>'blog'], function (){
   Route::get('/', 'BlogController@index')->name('blog.index');
   Route::get('/{article}/show', 'BlogController@show')->name('blog.show');
   Route::get('blog', 'BlogController@add');
   Route::post('blog', 'BlogController@store')->name('blog.store');
   Route::put('blog', 'BlogController@edit')->name('blog.store');

});