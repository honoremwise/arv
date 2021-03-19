<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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
// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();

//     return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/test', 'CreateArvOrder@posts');
Route::post('/tests', 'CreateArvOrder@posts');


Auth::routes(['verify'=>true]);

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
Route:: get('Edit/{id}','PatientController@ShowPatient')->middleware('auth');
Route:: post('Edit/{id}','PatientController@Edit')->middleware('auth');
Route:: get('del/{id}','PatientController@RemoveUser')->middleware('password.confirm');
Route::get('/Users','HomeController@GetUsers')->middleware('auth');
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);

