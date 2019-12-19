<?php

namespace App\Http\Controllers;

use App\QuizQuestion;
use App\QuizQuestionOption;
use Illuminate\Http\Request;

class QuizQuestionOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function list(int $quiz_question_id) {

		 $quiz_question         = QuizQuestion::where('id', $quiz_question_id)->with('quiz')->firstOrFail();
		 $quiz_question_options = QuizQuestionOption::where(['quiz_question_id' => $quiz_question_id])->get();

		 return view('quiz_question_option.index', compact('quiz_question', 'quiz_question_options'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $quiz_question_id) {

		 $quiz_question = QuizQuestion::where(['id' => $quiz_question_id])->with('quiz')->firstOrFail();

		 return view('quiz_question_option.create', compact('quiz_question'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

		 $quiz_question_option = new QuizQuestionOption();

		 $this->clear_correct($request);

		 $quiz_question_option->quiz_question_id = $request->get('quiz_question_id');
		 $quiz_question_option->name             = $request->get('name');
		 $quiz_question_option->correct          = $request->get('correct');
		 $quiz_question_option->active           = $request->get('active');

		 $quiz_question_option->save();

		 return redirect()->route('quiz_question_options.list', $quiz_question_option->quiz_question_id)->with('success', 'Option Saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QuizQuestionOption  $quizQuestionOption
     * @return \Illuminate\Http\Response
     */
    public function show(QuizQuestionOption $quizQuestionOption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QuizQuestionOption  $quizQuestionOption
     * @return \Illuminate\Http\Response
     */
    public function edit(int $quiz_question_option_id) {

		 $quiz_question_option = QuizQuestionOption::with('quiz_question', 'quiz_question.quiz')->findOrFail($quiz_question_option_id);

		 return view('quiz_question_option.edit', compact('quiz_question_option'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuizQuestionOption  $quizQuestionOption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $quiz_question_option_id) {

		 $this->clear_correct($request);

		 $quiz_question_option = QuizQuestionOption::with('quiz_question', 'quiz_question.quiz')->findOrFail($quiz_question_option_id);

		 $quiz_question_option->name    = $request->get('name');
		 $quiz_question_option->correct = $request->get('correct');
		 $quiz_question_option->active  = $request->get('active');

		 $quiz_question_option->save();

		 return redirect()->route('quiz_question_options.list', $quiz_question_option->quiz_question_id)->with('success', 'Option Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuizQuestionOption  $quizQuestionOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $quiz_question_option_id) {

		 $quiz_question_option = QuizQuestionOption::with('quiz_question', 'quiz_question.quiz')->findOrFail($quiz_question_option_id);
		 $quiz_question_option->delete();

		 return redirect()->route('quiz_question_options.list', $quiz_question_option->quiz_question_id)->with('success', 'Option Deleted');

    }

	 private function clear_correct($request) {
	 
		 // ghetto - if we set an option/answer as correct - clear the others
		 if ($request->get('correct')) {
			 QuizQuestionOption::where('quiz_question_id', $request->get('quiz_question_id'))->update(['correct' => 0]);
		 }
	 
	 }
}
