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
   Route::get('add', 'BlogController@add');
   Route::post('add', 'BlogController@store')->name('blog.store');
   Route::put('/{article}/edit', 'BlogController@edit')->name('blog.edit');
   Route::put('/{article}/update', 'BlogController@update')->name('blog.update');

});