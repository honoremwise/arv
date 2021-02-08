<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('kasha:arvmailler',function(){
	$results = HomeController::arvmailler();
})->describe('email nurse and kasha arv Team about patient to be reffilled next 3 days');

Artisan::command('kasha:arvremailler',function(){
	$results = HomeController::arvremailler();
})->describe('email nurse and kasha arv Team about patient to day');

Artisan::command('kasha:arvsms',function(){
	$results = HomeController::PatientsSms();
})->describe('Notify patients to be reffilled next 3 days');