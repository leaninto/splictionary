<?php

return [
	"google"=>[
		"analytics"=>[
			"tracking_id"=>"UA-61056894-2",
		]
	],
	"define"=>[
		"typesOfWords"=>[
			1=>"noun",
			2=>"verb",
			3=>"adjective",
			4=>"adverb",
			5=>"pronoun",
			6=>"connective"
		]
	],
	"App\WordsAPI"=>[
		'curl'=>[
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"x-rapidapi-host: wordsapiv1.p.rapidapi.com",
				"x-rapidapi-key: 6b3b897670msh1228fadd1b2f5d3p138838jsn8d85258c3018"
			),
		]
	]
];