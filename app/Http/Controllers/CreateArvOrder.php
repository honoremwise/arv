<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Automattic\WooCommerce\Client;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Subscriber\Oauth\Oauth1;

class CreateArvOrder extends Controller
{
    //
/**
	 * End point URL 
	 * @var string
	 */
	protected $endPointUrl = 'https://staging.kasha.rw/wp-json/wc/v3/orders';

	/**
	 * API Keys
	 * @var string
	 */
	public $consumerKey = 'ck_d825bed1f01d8b75fe7c78ee5d8e7117f2a52f9e';
	/**
	 * API KEYS
	 * @var string
	 */
	public $consumerSecret = 'cs_295c826f46d31802825c4e37c3e28cc12957646a';


	public function posts(Request $request){
        $data = $request->getContent();
        $stack = \GuzzleHttp\HandlerStack::create();
        $oauth = new Oauth1([
            'consumer_key'    => 'ck_d825bed1f01d8b75fe7c78ee5d8e7117f2a52f9e',
            'consumer_secret' => 'cs_295c826f46d31802825c4e37c3e28cc12957646a',
            'signature_method'    => 'HMAC-SHA1',
            'token_secret'    => ''
        ]);
        $stack->push($oauth);

        $client = new \GuzzleHttp\Client([
        'base_uri' => 'https://staging.kasha.rw/wp-json/wc/v3/',
        'handler' => $stack,
        'auth' => 'oauth']);
      
     
	try{
    $response= $client->request('POST', 'orders',
    
        [
            'body' => $data
        ]
    );
   return $response->getBody();
    }catch (\Exception $e){
        return $e;
    }
	}

	protected function mergeParameterWithAuth(array $params)
	{
		return http_build_query(array_merge($params,$this->getAuth()));
	}

	/**
	 * Get Array with authentication details
	 * @return  array
	 */
	protected function getAuth()
	{
		return [
			'consumer_key' => $this->consumerKey,
			'consumer_secret' => $this->consumerSecret,
		];
	}
	/**
	 * Get Array with authentication details
	 * @return  array
	 */
	// protected function getAuth()
	// {
	// 	return [
	// 		'application_id' => $this->applicationId,
	// 		'application_token' => $this->applicationToken,
	// 	];
	// }
	// protected function mergeParameterWithAuth(array $params)
	// {
	// 	return http_build_query(array_merge($params,$this->getAuth()));
	// }

}

