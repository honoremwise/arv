<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refills extends Model
{
    protected $table="patients_refills";
    protected $fillable = ['uid','refillingdate','nextrefilldate'];
}
