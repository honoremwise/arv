<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\User;
use App\Refills;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class PatientController extends Controller
{
    public static function index()
    {
       $patients = new Patient();
       $patients -> all();
         return $patients;
    }
    public function saverefills(Request $request )
    {
        $request->validate
        ([
            'UID'       =>'required|max:20',
            'refilldate'=>'required',         
        ]); 

    $refills                = new Refills();
    $patient                = Patient::where('UID',$request['UID'])->first();
    $refills->uid           =$request['UID'];
    $refills->refillingdate =$request['refilldate']; 
    $date                   = new Carbon($request['refilldate']); 
    if($patient)
    {
    if($patient->refill_schedule =="Quartely")
    {
      $date->addMonths(3);
    
    }
    else
    {
       $date->addMonths(1);
    } 
       $date->format('Y-m-d');
       $refills->nextrefilldate=$date; 
       $refills->save();
     }
   
     $refillsdata=Refills::all()->toArray();
     return view('refilling',compact('refillsdata')); 
    }
//getting all data from refills table
    public  static function refill()
    {
       $refillsdata = new Refills();
       $refillsdata = Refills::all()->toArray();
       return view('refilling',compact('refillsdata'));  
    }
    //getting all patients in the program
    public static function allpatients()
    {
       $allpatients = new Patient();
       $allpatients = patient::all()->toArray();
      // dump($allpatients);
       return view('allpatients',compact('allpatients'));  
    }
   
    public function store(Request $request)
    {      
    $request->validate
    ([
            'UID'=>'required|unique:patients|max:20',
            'location_address'=>'required|max:255',
            'arvtype'=>'required|max:255',
            'dob'=>'required',
            'Phone'=>'required|max:255',
            'Referral_health_center'=>'required|max:255',
    ]);

    $patients                        =new Patient();
    $patients->uid                   =$request['UID'];
    $patients->gender                =$request['gender'];
    $patients->location_address      =$request['location_address'];
    $patients->arv_type              =$request['arvtype'];
    $patients->Phone                 =$request['Phone'];
    $patients->DoB                   =$request['dob'];
    $patients->stability_status      =$request['stability_status'];
    $patients->refill_schedule       =$request['refill_schedule'];
    $patients->Referral_health_center=$request['Referral_health_center'];     
    $patients->save();
           
    return redirect()->back()->with('success', 'Data has been added Please Now Search Over Here');;
    
    }


  public function getpatient(Request $request)
  {
    // Get the search value from the request
     $search = $request->input('uid');

    // Search in the title and body columns from the posts table
     $patients = Patient::query()
               -> where('uid', 'LIKE', "%{$search}%")
               -> get();

    // Return the search view with the resluts compacted
   return view('searchres',compact('patients'));
  }

  public  function AllUsers()
    {
       $allpatients =  new Patient();
       $allpatients=patient::all()->toArray();
      // dump($allpatients);
       return view('allpatients',compact('allpatients'));  
    }
  public function ShowPatient($id) 
   {
      $patients = DB::select('select * from patients where id = ?',[$id]);
      //dd($patients);
      return view('editpatient',['patients'=>$patients]);
    }
public function RemoveUser(Request $request,$id) {
  
  if(User::find($id))
  {
          $user = User::find($id);
          $user->delete();
            
  return redirect('/patients')->with('status', 'Profile updated!');
   }
}
  public function Edit(Request $request,$id) {
      
      $gender   = $request->input('gender');
      $location = $request->input('location');
      $arvtype  = $request->input('arvtype');
      $dob      = $request->input('dob');
      $Phone   = $request->input('Phone');
      $stability_status = $request->input('stability_status');
      $refill_schedule  = $request->input('refill_schedule');
      $Referral_health_center = $request->input('Referral_health_center');
    
      DB::update('update patients set location_address = ?,gender = ?,DoB = ?,Phone = ?,stability_status = ?,refill_schedule = ?,Referral_health_center = ? where id = ?',
        [$location,$gender,$dob,$Phone,$stability_status,$refill_schedule,$Referral_health_center,$id]);
     return redirect('/patients')->with('status', 'Profile updated!');

      
   }
      
   //}  
}
