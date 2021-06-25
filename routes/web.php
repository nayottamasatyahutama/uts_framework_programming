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



Auth::routes();

Route::get('/', 'HomeController@index')->name('welcome');
Route::group(['middleware' => 'auth'], function () {
    
    Route::post('/upload/proses', 'BukuController@store');
    Route::get('/home','BukuController@index');
    Route::resource('bukus', 'BukuController');
    Route::get('logout', 'LogoutController@index')->name('logout');
    Route::get('/daftarBuku/pdf','PDFController@generatePDF');
 
});