@extends('layouts.app')

@section('content_header')
	{{ Breadcrumbs::render('quizzes.edit', $quiz) }}
@stop

@section('content')
	<form method='POST' action="{{route('quizzes.update', $quiz->id)}}">
		@csrf
		@method('PUT')
		<div class="form-group">
			<label for="code">quiz Name</label>
			<input type="text" name="name" value="{{$quiz->name}}" class='form-control' placeholder='quiz Name'>
		</div>
         <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class='form-control' placeholder='Description'>{{ $quiz->description }}</textarea>
         </div>
         <div class="form-group">
            <label for="active">Active</label>
            <input type="checkbox" id="active" name="active" value="1" @if($quiz->active) checked @endif>
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
