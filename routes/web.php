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


Route::get('/test', 'CreateArvOrder@posts');
Route::post('/tests', 'CreateArvOrder@posts');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/refill', 'PatientController@refill')->middleware('auth');
Route::get('importExportView', 'MyController@importExportView')->middleware('auth');
Route::get('export', 'MyController@export')->name('export')->middleware('auth');
Route::post('import', 'MyController@import')->name('import')->middleware('auth');
Route::post('/patients', 'PatientController@store')->middleware('auth');
Route::post('/SearchPatient', 'PatientController@getpatient')->name('SearchPatient')->middleware('auth');
Route::get('/records','PatientController@index')->middleware('auth');
Route::get('/patients','PatientController@allpatients')->middleware('auth');
Route::post('/saverefills','PatientController@saverefills')->middleware('auth');
