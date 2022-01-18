<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Splictions extends Model
{
	protected $appends = ['spliction_parts'];
	private static function findSubStr($needle,$haystack,$reverse = false){
        $strlen = strlen($needle);
        $matchingCharString = "";
        $needle = $reverse?strrev($needle):$needle;
        $haystack = $reverse?strrev($haystack):$haystack;
        for( $i = 0; $i <= $strlen; $i++ ) {
        	$needleChar = substr( $needle, $i, 1 );
        	$haystackChar = substr( $haystack, $i, 1 );
            if($needleChar == $haystackChar){
                $matchingCharString .= $needleChar;
            }else{
            	return $reverse?strrev($matchingCharString):$matchingCharString;
            }
        }
    } 
    public function getSplictionPartsAttribute(){
    	$word_splice_length = strlen($this->word_splice);
    	$first_word_part = self::findSubStr($this->first_word, $this->word_splice);
    	$second_word_part = self::findSubStr($this->second_word, $this->word_splice,true);
    	$fwordlen = strlen($first_word_part);
    	$swordlen = strlen($second_word_part);

    	$gapOrLap = ($fwordlen+$swordlen)-$word_splice_length;
    	if( $gapOrLap == 0){
    		$this->first_word_part = $first_word_part;
    		$this->second_word_part = $second_word_part;
    	}elseif( $gapOrLap == 1 ){
    		$this->first_word_part = $first_word_part;
    		$this->second_word_part = substr($second_word_part,1-strlen($second_word_part));
    	}elseif($this->first_word_dominant){
    		$this->first_word_part = substr($this->word_splice,0,$fwordlen);
    		$this->second_word_part = substr($this->word_splice,$fwordlen-$word_splice_length);
    	}else{
            $this->first_word_part = substr($this->word_splice,0,($word_splice_length - $swordlen));
            $this->second_word_part = substr($this->word_splice,-$swordlen);
        }

        if(strlen($this->first_word_part.$this->second_word_part) !== $word_splice_length){
            $this->first_word_part = null;
            $this->second_word_part = null;
        }

        return $this;
    }
}
