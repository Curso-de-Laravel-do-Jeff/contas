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

Route::group(['prefix' => 'bank'], function () {
    Route::get('/', 'BankController@index')->name('bank.index');
    Route::get('/export', 'BankController@export')->name('bank.export');
    Route::delete('/delete/{id}', 'BankController@delete')->name('bank.delete');
});
