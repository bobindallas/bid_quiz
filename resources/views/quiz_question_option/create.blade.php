@extends('layouts.app')

@section('content_header')
	{{ Breadcrumbs::render('quiz_question_options.create', $quiz_question) }}
@stop

@section('content')
	<div class="container">
		<form method='POST' action="{{ route('quiz_question_options.store', ['quiz_question_id' => $quiz_question->id]) }}">
			@csrf
			<div class="form-group">
				<label for="code">Answer</label>
				<input type="text" name="name" value="" class='form-control' placeholder='Answer'>
			</div>
{{--
			<div class="form-group">
				<label for="description">Description</label>
				<textarea name="description" value="" class='form-control' placeholder='Description'></textarea>
			</div>
--}}
			<div class="form-group">
				<label for="active">Correct Answer</label>
				<input type="checkbox" id="correct" name="correct" value="1"> (only 1 answer is correct)
			</div>
			<div class="form-group">
				<label for="active">Active</label>
				<input type="checkbox" id="active" name="active" value="1" checked>
				<input type="hidden" id="quiz_id" name="quiz_id" value="{{ $quiz_question->quiz->id }}">
				<input type="hidden" id="quiz_question_id" name="quiz_question_id" value="{{ $quiz_question->id }}">
			</div>
			<input type="submit" value="Submit" class="btn btn-primary">
		</form>
	</div>
@endsection
