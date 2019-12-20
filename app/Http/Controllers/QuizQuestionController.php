<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\QuizQuestion;
use Illuminate\Http\Request;

class QuizQuestionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
    }

	 public function list(int $quiz_id) {

		 $quiz           = Quiz::findOrFail($quiz_id); // need this even if no questions found
		 $quiz_questions = QuizQuestion::where(['quiz_id' => $quiz_id])->get();

		 return view('quiz_question.index', compact('quiz', 'quiz_questions'));

	 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $quiz_id) {

		 $quiz = Quiz::where('active', 1)->findOrFail($quiz_id);

		 return view('quiz_question.create', compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Quiz $quiz_id, Request $request) {

		$this->validate($request,[
			'name' => 'required|max:255|unique:quiz_questions,name'
		]); 

		$quiz_question = new QuizQuestion();

		$quiz_question->quiz_id       = $quiz_id->id;
		$quiz_question->name          = $request->get('name');
		$quiz_question->description   = $request->get('description');
		$quiz_question->active        = $request->get('active');

		$quiz_question->save();

		return redirect()->route('quiz_questions.list', $quiz_id->id)->with('success', 'Question Saved');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QuizQuestion  $quizQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(QuizQuestion $quizQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QuizQuestion  $quizQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(int $quiz_question_id) {

		 $quiz_question = QuizQuestion::with('quiz')->findOrFail($quiz_question_id);

		 return view('quiz_question.edit', compact('quiz_question'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuizQuestion  $quizQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {

		 $quiz_question = QuizQuestion::with('quiz')->findOrFail($request->get('id'));

		 $quiz_question->description = $request->get('description');
		 $quiz_question->active      = $request->get('active');

		 $quiz_question->save();

		 return redirect()->route('quiz_questions.list', $quiz_question->quiz->id)->with('success', 'Question Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuizQuestion  $quizQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $quiz_question_id) {

		 $quiz_question = QuizQuestion::with('quiz')->findOrFail($quiz_question_id);
		 $quiz_question->delete();

		 return redirect()->route('quiz_questions.list', $quiz_question->quiz->id)->with('success', 'Question Deleted');
    }
}
