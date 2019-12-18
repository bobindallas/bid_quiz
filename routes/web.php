<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('site','SiteController');
Route::resource('dashboard','DashboardController');
Route::resource('quizzes','QuizController');

Route::get('site/quiz/{quiz_id}/{question_index?}', 'SiteController@quiz')->name('site.quiz');
Route::post('site/answer/{quiz_id}', 'SiteController@answer')->name('site.answer');

Route::get('quiz_questions/create/{quiz_id}',                          'QuizQuestionController@create')->name('quiz_questions.create');
Route::get('quiz_questions/list/{quiz_id}',                            'QuizQuestionController@list')->name('quiz_questions.list');
Route::get('quiz_questions/edit/{quiz_question_id}',                   'QuizQuestionController@edit')->name('quiz_questions.edit');
Route::post('quiz_questions/store/{quiz_id}',                          'QuizQuestionController@store')->name('quiz_questions.store');
Route::put('quiz_questions/update/{quiz_question_id}',                 'QuizQuestionController@update')->name('quiz_questions.update');
Route::post('quiz_questions/destroy/{quiz_question_id}',               'QuizQuestionController@destroy')->name('quiz_questions.destroy');

Route::get('quiz_question_options/create/{quiz_question_id}',          'QuizQuestionOptionController@create')->name('quiz_question_options.create');
Route::get('quiz_question_options/list/{quiz_question_id}',            'QuizQuestionOptionController@list')->name('quiz_question_options.list');
Route::get('quiz_question_options/edit/{quiz_question_id}',            'QuizQuestionOptionController@edit')->name('quiz_question_options.edit');
Route::post('quiz_question_options/store/{quiz_question_id}',          'QuizQuestionOptionController@store')->name('quiz_question_options.store');
Route::put('quiz_question_options/update/{quiz_question_option_id}',   'QuizQuestionOptionController@update')->name('quiz_question_options.update');
Route::post('quiz_question_options/destroy/{quiz_question_option_id}', 'QuizQuestionOptionController@destroy')->name('quiz_question_options.destroy');

Route::get('/', 'SiteController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
