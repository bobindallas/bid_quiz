<?php

// Home
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Quizzes', route('dashboard'));
});

require __DIR__.'/breadcrumbs/quizzes.php';
require __DIR__.'/breadcrumbs/quiz_questions.php';
require __DIR__.'/breadcrumbs/quiz_question_options.php';
