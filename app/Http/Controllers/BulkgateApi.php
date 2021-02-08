<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class BulkgateApi{

	/**
	 * End point URL 
	 * @var string
	 */


	public function post($params=[]){

			return Http::withHeaders([
					    'Content-Type' => 'application/json',
					    'Cache-Control' => 'no-cache',
					])->post($this->endPointUrl,$params);
	}
	/**
	 * Get Array with authentication details
	 * @return  array
	 */

}

