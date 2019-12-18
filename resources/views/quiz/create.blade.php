@extends('layouts.app')

@section('content_header')
	{{ Breadcrumbs::render('quizzes.create') }}
@stop

@section('content')
	<div class="container">
		<form method='POST' action="{{ route('quizzes.store') }}">
			@csrf
			<div class="form-group">
				<label for="code">Quiz Name</label>
				<input type="text" name="name" value="" class='form-control' placeholder='Quiz Name'>
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<textarea name="description" value="" class='form-control' placeholder='Description'></textarea>
			</div>
			<div class="form-group">
				<label for="active">Active</label>
				<input type="checkbox" id="active" name="active" value="1" checked>
			</div>
			<input type="submit" value="Submit" class="btn btn-primary">
		</form>
	</div>
@endsection
