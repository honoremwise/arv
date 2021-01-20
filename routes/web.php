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
Route::post('/Searchp', 'PatientController@getpatient');
Route::get('/records','PatientController@index');
Route::get('/patients','PatientController@allpatients');
Route::post('/saverefills','PatientController@saverefills');
Route::get('/refill', 'PatientController@refill');
Route::get('/test', 'CreateArvOrder@posts');
Route::post('/tests', 'CreateArvOrder@posts');
Route::get('importExportView', 'MyController@importExportView');
Route::get('export', 'MyController@export')->name('export');
Route::post('import', 'MyController@import')->name('import');
Route::get('/test' ,'PatientSms@SMSnotifier');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
