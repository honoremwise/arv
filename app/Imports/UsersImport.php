<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

      // foreach ($row as $key=>$value) {

      // }
      \Log::info($row);

      if(!($row[0]=='name' || $row[1]=='email' ||  $row[2]=='password')){
        $user=User::where('email',row[1])->first();
        if($user){
        return new User([
            'name'     => $row[0],
            'email'    =>  $row[1],
            'password' => \Hash::make($row[2]),
        ]);
      }
      }


    }
}
