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

Route::get('/', function () {
    return view('welcome');
});
Route::post('/patients', 'PatientController@store');
Route::get('/records', 'PatientController@index');
Route::post('/saverefills', 'PatientController@saverefills');
Route::get('/refill', 'PatientController@refill');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
