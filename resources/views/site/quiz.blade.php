@extends('layouts.app')

@section('content')

<div class="card border">
	<div class="card-title border-bottom" style="padding-left:10px; font-size:1.3em; background-color:#e9ecef;">
		Quizzes
	</div>
	<div class="card-body">
	<div><h3>{{$quiz->name}} ({{ $question_index+1 }} / {{ $quiz->quiz_question->count() }})</h3></div>
	<div><h3>{{ $quiz->quiz_question->get($question_index)->description }}:</h3></div>
	<form method='POST' action="{{route('site.answer', $quiz->id)}}">
		@csrf
		@method('POST')
		<ul class="list-group">

		@if($quiz->quiz_question->get($question_index)->quiz_question_option->count())
			@foreach($quiz->quiz_question->get($question_index)->quiz_question_option as $option)
				<li class="list-group-item"><input type="radio" name="answer" id="answer" value="{{ $option->id }}"> {{ $option->name }}</li>
			@endforeach
		@endif
		</ul>
	<input type="hidden" name="question_index" id="question_index" value="{{ $question_index }}">
	<div style="padding-top:10px;"><input type="submit" value="Next >>" class="btn btn-primary"></div>
	</form>
	</div>
</div>
@stop
