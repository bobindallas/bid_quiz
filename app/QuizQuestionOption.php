<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizQuestionOption extends Model {
  
	public function quiz_question() {
		return $this->belongsTo('App\QuizQuestion');
	}

	// handle sketchy active flags (null/0/1)
	public function setActiveAttribute($value) {
		$this->attributes['active'] = (! is_null($value) && isset($value)) ? $value : 0;  
	}

	// handle sketchy correct flags (null/0/1)
	public function setCorrectAttribute($value) {
		$this->attributes['correct'] = (! is_null($value) && isset($value)) ? $value : 0;  
	}
}
