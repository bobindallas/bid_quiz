<?php

namespace App\Http\Controllers;

use App\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

		 return view('quiz.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

      $this->validate($request,[
         'name' => 'required|max:255|unique:quizzes,name'
      ]); 

		 $quiz = new Quiz();

		 $quiz->name        = $request->get('name');
		 $quiz->description = $request->get('description');
		 $quiz->active      = $request->get('active');
		 $quiz->save();

		 return redirect()->route('dashboard')->with('success', 'Quiz Saved');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz) {

		 return view('quiz.edit', compact('quiz'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz) {

      $this->validate($request,[
         // 'name' => 'required|max:255|unique:quizzes,name'
      ]); 

		 $quiz->name        = $request->get('name');
		 $quiz->description = $request->get('description');
		 $quiz->active      = $request->get('active');
		 $quiz->save();

		 return redirect()->route('dashboard')->with('success', 'Quiz Saved');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz) {

		 $quiz->delete();

		 return redirect()->route('dashboard')->with('success', 'Quiz Deleted');
    }
}
