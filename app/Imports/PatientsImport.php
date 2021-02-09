<?php

namespace App\Imports;

use App\Patient;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Carbon;

//use Illuminate\Support\Facades\Hash;

class PatientsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    

    public function model(array $row)
    {
        return new Patient
        ([
           'uid'                   => $row[0],
           'gender'                => $row[1],
           'DoB'                   => Carbon::parse($row[2])->format('Y-m-d'),
           'location_address'      => $row[3],
           'arv_type'              => $row[4],
           'Phone'                 => $row[5],
           'stability_status'      => $row[6],
           'refill_schedule'       => $row[7],
           'Referral_health_center'=> $row[8],
        ]);
    }
}
