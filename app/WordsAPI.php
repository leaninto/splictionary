<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class curl extends Model{
	public static function call($url){
		$cUrl = curl_init();
		curl_setopt($cUrl, CURLOPT_URL,$url);
		curl_setopt_array($cUrl, \Config::get('splictionary.'.get_called_class().'.curl'));
		$response = curl_exec($cUrl);
		$err = curl_error($cUrl);
		curl_close($cUrl);
		if ($err){
			\Log::notice("$url returned a 404");
			return false;
		} else {
			return $response;
		}
	}
}
class WordsAPI extends curl
{
	static function of($value){
		return self::getDefinition($value);
	}
    static function getDefinition($value){
    	$definition = json_decode(self::call("https://wordsapiv1.p.rapidapi.com/words/".$value));
    	if(!isset($definition->success) ){
    		return $definition;
    	}else{
    		$definition->word = $value;
    		return $definition;
    	}
    }
}
