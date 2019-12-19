<?php

// Home > quiz_question_options / dashboard
Breadcrumbs::for('quiz_question_options.list', function ($trail, $quiz_question) {
    $trail->parent('dashboard');
    $trail->push($quiz_question->quiz->name, route('dashboard'));
    $trail->push($quiz_question->name, route('quiz_questions.list', $quiz_question->quiz->id));
    $trail->push('Question Options');
});

// Home > quiz_question_options > Create
Breadcrumbs::for('quiz_question_options.create', function ($trail, $quiz_question) {
    $trail->parent('dashboard');
    $trail->push($quiz_question->quiz->name, route('quiz_question_options.list', $quiz_question->id));
    $trail->push($quiz_question->name, route('quiz_questions.list', $quiz_question->id));
    $trail->push('New Option');
});

// Home > quiz_question_options > Edit
Breadcrumbs::for('quiz_question_options.edit', function ($trail, $quiz_question_option) {
    $trail->parent('dashboard');
    $trail->push($quiz_question_option->quiz_question->quiz->name, route('dashboard'));
    $trail->push($quiz_question_option->quiz_question->name, route('quiz_questions.list', $quiz_question_option->quiz_question->quiz->id));
    $trail->push($quiz_question_option->name, route('quiz_question_options.list', $quiz_question_option->quiz_question->id));
    $trail->push('Edit Option');
});
