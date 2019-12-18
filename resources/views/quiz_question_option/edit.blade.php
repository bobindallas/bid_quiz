@extends('layouts.app')

@section('content_header')
	{{ Breadcrumbs::render('quiz_question_options.edit', $quiz_question_option) }}
@stop

@section('content')
	<form method='POST' action="{{route('quiz_question_options.update', $quiz_question_option->id)}}">
		@csrf
		@method('PUT')
		<div class="form-group">
			<label for="code">Option</label>
			<input type="text" name="name" value="{{$quiz_question_option->name}}" class='form-control' placeholder='quiz_question_option Name'>
		</div>
		<div class="form-group">
			<label for="active">Correct</label>
			<input type="checkbox" id="correct" name="correct" value="1" @if($quiz_question_option->correct) checked @endif>
		</div>
		<div class="form-group">
			<label for="active">Active</label>
			<input type="checkbox" id="active" name="active" value="1" @if($quiz_question_option->active) checked @endif>
			<input type="hidden" id="quiz_id" name="quiz_id" value="{{ $quiz_question_option->quiz_question->quiz->id }}">
			<input type="hidden" id="quiz_question_id" name="quiz_question_id" value="{{ $quiz_question_option->quiz_question->id }}">
		</div>
		<input type="submit" value="Submit" class="btn btn-primary">
	</form>
	</div>
@stop

@section('js')
<script>
</script>
@stop

@push('js')
