<?php

// Home > quiz_questions / dashboard
Breadcrumbs::for('quiz_questions.list', function ($trail, $quiz) {
    $trail->parent('dashboard');
    $trail->push($quiz->name, route('dashboard'));
    $trail->push('Quiz Questions');
});

// Home > quiz_questions > Create
Breadcrumbs::for('quiz_questions.create', function ($trail, $quiz) {
    $trail->parent('dashboard');
    $trail->push($quiz->name, route('quiz_questions.list', $quiz->id));
    $trail->push('New Question', route('quiz_questions.create', $quiz));
});

// Home > quiz_questions > Edit
Breadcrumbs::for('quiz_questions.edit', function ($trail, $quiz) {
    $trail->parent('dashboard');
    $trail->push($quiz->name, route('quiz_questions.edit', $quiz->id));
});
