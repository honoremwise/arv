<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Patient;
use App\Refills;
use App\Http\Controllers\BulkgateApi;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

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
        $this->PatientsSms();

        return view('home');
    }
    public static function arvmailler(){
        $today = Carbon::today();
        //adding 2 days to check patients that meets this date to be notified 
        $today->addDays(3);
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

      public static function arvremailler(){
        $today = Carbon::today();
        //adding 2 days to check patients that meets this date to be notified 
          $refills = Refills::where('nextrefilldate',$today)->get();
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
    public static function PatientsSms()
    {
      $today = Carbon::today();
      $today->addDays(3);
      $notificationday=$today->format('Y-m-d');
      $patients = DB::table('patients')
            ->join('patients_refills', 'patients.uid', '=', 'patients_refills.uid')
            ->where('nextrefilldate',$notificationday)
            ->get();
  
  foreach ($patients as $patients) {
      $fullnumber        = +250 . substr($patients->Phone, -9);
      $bulkgate          = new BulkgateApi();
      $response          = Http::post(env('BULK_GATE_URL'),[
      'application_id'    => env('BULK_GATE_APPLICATION_ID'),
      'application_token' => env('BULK_GATE_TOKEN'),
      'sender_id_value'   => "Kasha",
      'sender_id'         => "gText",
      'number'      => $fullnumber, 
      'text'        => 'hihi', 
     'country'     => 'rw',
        ]);
    }
    }
}
