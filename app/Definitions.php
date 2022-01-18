<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Definitions extends Model
{
	use SoftDeletes;
	public function getSanitisedDefinitionAttribute(){
    	return strip_tags($this->attributes['definition'], "<img/>");
    }
}
