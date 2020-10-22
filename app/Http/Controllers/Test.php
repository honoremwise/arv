<?php 

namespace App\Http\CreateOrder;

use Illuminate\Support\Facades\Http;
use Automattic\WooCommerce\Client;

class CreateOrder extends Controller
{
	/**
	 * End point URL 
	 * @var string
	 */
	protected $endPointUrl = 'https://staging.kasha.rw/wp-json/wc/v3/orders';

	/**
	 * API Keys
	 * @var string
	 */
	public $consumerkey = 'ck_def1143d60a07790ed1b87112a76ff624f6246a7';
	/**
	 * API KEYS
	 * @var string
	 */
	public $secretkey = 'cs_0d3aaa0806d7e1d0a5db303038b8545752754af7';


	public function post($params=[]){

			$data = [
    'payment_method' => 'bacs',
    'payment_method_title' => 'Direct Bank Transfer',
    'set_paid' => true,
    'billing' => [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'address_1' => '969 Market',
        'address_2' => '',
        'city' => 'San Francisco',
        'state' => 'CA',
        'postcode' => '94103',
        'country' => 'US',
        'email' => 'john.doe@example.com',
        'phone' => '(555) 555-5555'
    ],
    'shipping' => [
        'first_name' => 'John',
        'last_name' => 'Doe',
        'address_1' => '969 Market',
        'address_2' => '',
        'city' => 'San Francisco',
        'state' => 'CA',
        'postcode' => '94103',
        'country' => 'US'
    ],
    'line_items' => [
        [
            'product_id' => 93,
            'quantity' => 2
        ],
        [
            'product_id' => 22,
            'variation_id' => 23,
            'quantity' => 1
        ]
    ],
    'shipping_lines' => [
        [
            'method_id' => 'flat_rate',
            'method_title' => 'Flat Rate',
            'total' => 10
        ]
    ]
];

// Install:
// composer require automattic/woocommerce

// Setup:



$woocommerce = new Client(
    'https://staging.kasha.rw', // Your store URL
    $this->$consumerkey, // Your consumer key
    $this->secretkey, // Your consumer secret
    [
        'wp_api' => true, // Enable the WP REST API integration
        'version' => '/wp-json/wc/v3' // WooCommerce WP REST API version
    ]
);

return $woocommerce->post('orders', $data);
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
