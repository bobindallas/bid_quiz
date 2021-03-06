<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model {

	public function quiz() {
		return $this->belongsTo('App\Quiz');
	}
	 
	public function quiz_question_option() {
		return $this->hasMany('App\QuizQuestionOption');
	}

	// handle sketchy active flags (null/0/1)
	public function setActiveAttribute($value) {
		$this->attributes['active'] = (! is_null($value) && isset($value)) ? $value : 0;  
	}  

	public static function boot() {
	
		parent::boot();

		// cascade deletes
		self::deleting(function($quiz_question) {

			$quiz_question->quiz_question_option()->each(function($question_option) {
				$question_option->delete(); 
			}); 
	 
		}); 
	
	}
	 
}
