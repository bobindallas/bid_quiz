@extends('layouts.app')

@section('content_header')
	{{ Breadcrumbs::render('quiz_questions.edit', $quiz_question) }}
@stop

@section('content')
	<form method='POST' action="{{route('quiz_questions.update', $quiz_question->id)}}">
		@csrf
		@method('PUT')
		<div class="form-group">
			<label for="code">Name</label>
			<input type="text" name="name" value="{{$quiz_question->name}}" class='form-control' placeholder='Name' readonly>
		</div>
         <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class='form-control' placeholder='Description'>{{ $quiz_question->description }}</textarea>
         </div>
         <div class="form-group">
            <label for="active">Active</label>
            <input type="checkbox" id="active" name="active" value="1" @if($quiz_question->active) checked @endif>
            <input type="hidden" id="id" name="id" value="{{ $quiz_question->id }}">
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
