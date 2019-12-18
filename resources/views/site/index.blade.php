@extends('layouts.app')

@section('content')

<h1>Let&rsquo;s take a Quiz...</h1>

<div class="card border">
	<div class="card-title border-bottom" style="padding-left:10px; font-size:1.3em; background-color:#e9ecef;">
		Quizzes
	</div>
	<div class="card-body">
		<ul class="list-group">
		@foreach($quizzes as $quiz)
			<li class="list-group-item"><a href="{{ route('site.quiz', $quiz->id) }}">{{$quiz->name}}</a></li>
		@endforeach
		</ul>
	</div>
</div>
@stop
