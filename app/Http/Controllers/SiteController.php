<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\QuizQuestionOption;
use Illuminate\Http\Request;

class SiteController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		 $quizzes = Quiz::where('active', 1)->get();
		 return view('site.index', compact('quizzes'));
	}

	public function quiz(int $quiz_id = 0, int $question_index = 0) {

		$quiz = Quiz::with('quiz_question', 'quiz_question.quiz_question_option')->findOrFail($quiz_id);

		// hackety hack... surely there's a better way to do this
		$fu   = [];
		foreach($quiz->quiz_question as $k => $v) {
			if ($v->active) {
				$fu[] = $v->id;
			}
		}

		$question_index = (int) abs($question_index);
		$questions      = collect($fu); // let's make a collection...
		$question_index = ($question_index >= 0 && $question_index <= $questions->count()-1) ? $question_index : 0;

		return view('site.quiz', compact('quiz', 'question_index'));
	}

	public function answer(Request $request, int $quiz_id) {

      $this->validate($request,[
         'answer' => 'required'
      ]);

		$quiz   = Quiz::with('quiz_question')->findOrFail($quiz_id);
		$answer = QuizQuestionOption::findOrFail($request->answer);

		$s_key  = 'quiz_' . $quiz_id;
		$stats  = $request->session()->get($s_key);

		if ($stats) {
			$stats['qcount']++;

			if ($answer->correct > 0) {
				$stats['qright']++;
			}

		} else {

			$stats = [];
			$stats['qcount'] = 1;
			$stats['qright'] = 0;

			if($answer->correct > 0) {
				$stats['qright'] = 1;
			}

		}

		$request->session()->put($s_key, $stats);

		if ($stats['qcount'] >= $quiz->quiz_question->count()) { // last question

			return $this->results($request, $quiz);

		} else {

			// next question
			return $this->quiz($quiz_id, $stats['qcount']);

		}

		die;
		dd($request->session());
		dd($answer);
		dd($request);
	}

	public function results(Request $request, Quiz $quiz) {

		$s_key  = 'quiz_' . $quiz->id;
		$stats  = $request->session()->get($s_key);
		$request->session()->forget($s_key);
		// dd($stats);

		try {
			$percentile = sprintf("%d", round($stats['qright'] / $stats['qcount'] * 10));
		} catch (Exception $e) {
			$percentile = 0;
		}

		$accolades = [
			10 => 'Perfection',
			9 => 'You are magnificent',
			8 => 'You are awesome',
			7 => 'You are proficient',
			6 => 'You are above average',
			5 => 'You are average',
			4 => 'you are... OK',
			3 => 'You are happy in your work',
			2 => 'Did you go to school?',
			1 => 'Your parents can\'t be proud',
			0 => 'You\'re not even trying'
		];

		$comment = $accolades[$percentile];
		$percentile *= 10;
		// dd($comment);
		// dd($percentile);

		return view('site.results', compact('quiz', 'percentile', 'comment'));

	}

}
