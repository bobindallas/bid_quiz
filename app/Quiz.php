<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model {

   public function quiz_question() {
      return $this->hasMany('App\QuizQuestion')->orderBy('display_order', 'asc');
   }
	
	// handle sketchy active flags (null/0/1)
	public function setActiveAttribute($value) {
		$this->attributes['active'] = (! is_null($value) && isset($value)) ? $value : 0;  
	}
}
