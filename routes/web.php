<?php

use Illuminate\Support\Facades\Route;
Route::get('/shows' , 'TvController@index')->name('tv.index');
Route::get('/shows/{id}' , 'TvController@show')->name('tv.show');


Route::get('/actors' , 'ActorsController@index')->name('actors.index');
Route::get('/actors/{id}' , 'ActorsController@show')->name('actors.show');


Route::get('/' , 'MoviesController@index')->name('movies.index');
Route::get('/{movie}', 'MoviesController@show')->name('movies.show');


