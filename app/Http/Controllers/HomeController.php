<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Patient;
use App\Refills;

use App\Mail\Refills as RefilsMaler;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->arvmailler();
        return view('home');
    }
    public function arvmailler(){
        $today = Carbon::today();
        //adding 2 days to check patients that meets this date to be notified 
        $today->addDays(2);
        $notificationday=$today->format('Y-m-d');
          $refills = Refills::where('nextrefilldate',$notificationday)->get();
          $lists=[];
          foreach($refills as $refill){
            $patient = Patient::where('uid', $refill->uid)->first();
           //psr4
            $lists[]=['uid'=>$patient->uid,'arv_type'=>$patient->arv_type,'nextrefilldate'=>$refill->nextrefilldate];
          }
          if(count($lists) > 0){
             Mail::to(['honore@kasha.co'])->send(new RefilsMaler($lists));
          }
      //https://github.com/KashaGlobal/kasha-etl/blob/master/resources/views/emails/orders/wc/count-mismatches.blade.php
//
    }
}
