<?php

// Home > quizzes / dashboard
Breadcrumbs::for('quizzes.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('quizzes', route('quizzes.index'));
});

// Home > quizzes > Create
Breadcrumbs::for('quizzes.create', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('New Quiz', route('quizzes.create'));
});

// Home > quizzes > Edit
Breadcrumbs::for('quizzes.edit', function ($trail, $quiz) {
    $trail->parent('dashboard');
    $trail->push($quiz->name, route('quizzes.edit', $quiz->id));
});
