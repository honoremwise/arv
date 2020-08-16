<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
    'uid','gender','DoB','location_address','arv_type','Phone','stability_status','refill_schedule','Referral_health_center',
               // add all other fields 
    ];

}
