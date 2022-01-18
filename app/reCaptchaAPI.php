<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reCaptchaAPI extends Model
{
    public static function verify($response){
    	// Get cURL resource
    	//clock($response);
		$curl = curl_init();
		// Set some options - we are passing in a useragent too here
		curl_setopt_array($curl, [
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
		    CURLOPT_POST => 1,
		    CURLOPT_POSTFIELDS => [
		    	"secret" => "6LfIEAEVAAAAAJdVxkhcjCdNkjCzqqfB-3DPF3JN",
				"response" => $response,

		    ]
		]);
		// Send the request & save response to $resp
		$resp = curl_exec($curl);

		// Close request to clear up some resources
		curl_close($curl);
		return json_decode($resp);
    }
}
