<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;

class PatientSms extends Controller
{
	//$patients= new Patient();
 public function SMSnotifier()
$patients = DB::table('Patient')->get();
foreach ($patients as $patients) {
    echo $patients->phone;
}

  // foreach ($phones as $number){
		// 	// Getting a complete number with country code in repect to country 
		// 	// Inputed eg +250781549903 or +2540781549903
		// 	$fullnumber = '+'.env(strtoupper($country). '_CODE'). substr($number, -9);

		// 	$response = Http::post(env('BULK_GATE_URL'),[
		// 			'application_id'    => env('BULK_GATE_APPLICATION_ID'),
		// 			'application_token' => env('BULK_GATE_TOKEN'),
		// 			'sender_id_value'   => "Kasha",
		// 			'sender_id'         => "gText",
		// 		    'number' 			=> $fullnumber, 
		// 			'text'				=> $message, 
						
		// 			// Comply with bulkgate by providing first 2 characters,
		// 			// of a country.
		// 			'country'			=> substr(strtolower($country),0,2),
		// 		]);


		// 		// Record results in the database.
		// 	if(isset($response->json()['data']['sms_id']))
		// 	{
		// 		$smsResult                   = new SmsReminderResult();
		// 		$smsResult->phone            = $fullnumber;
		// 		$smsResult->http_code        = $response->status();
		// 		$smsResult->receiver_segment = $segment;
		// 		$smsResult->message          = $message;
		// 		$smsResult->sms_id           = $response->json()['data']['sms_id'];
		// 		$smsResult->status           = $response->json()['data']['status'];
		// 	    $smsResult ->save();		
		// 	}
		// 	else
		// 	{
		// 		continue;
		// 	}
		// 	}
}
