@extends('layouts.app')

@section('content')

<div class="card border">
	<div class="card-title border-bottom" style="padding-left:10px; font-size:1.3em; background-color:#e9ecef;">
		Quizzes
	</div>
	<div class="card-body">
	<div><h3>Your score {{ $percentile }}</h3></div>
	<div><h3>{{ $comment }}</h3></div>
	<div style="padding-top:10px;"><a href="{{ route('home') }}" class="btn btn-info">Home</a></div>
	</div>
</div>
@stop
