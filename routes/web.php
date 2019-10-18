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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('export/{type}', 'SiswaController@export')->name('export.file');
Route::get('exportPDF', 'SiswaController@exportPDF')->name('export.pdf');

Route::get('exportExcel/', 'SiswaController@exportExcel');
Route::get('exportCSV/', 'SiswaController@exportCSV');

Route::post('/import_excel', 'SiswaController@import_excel');



// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
