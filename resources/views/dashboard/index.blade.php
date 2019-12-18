@extends('layouts.app')
@section('title', 'quizzes')

   @section('content_header')
      {{ Breadcrumbs::render('dashboard') }}
   @stop

	@section('content')
	<div class="container">
	 <div style="float:right;padding-right:20px;"><a href="{{ route('quizzes.create') }}" title="Add New quiz"><i class="fa fa-plus-circle fa-2x"></i></a><br /><br /></div>
		<div class="card-body">
			@if (count($quizzes))
		<table id="quizzes" class="table table-hover table-responsive-sm table-sm compact">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Description</th>
					<th>Active</th>
					<th>Created</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($quizzes as $quiz)
				<tr>
					<td>{{ $quiz->id }}</td>
					<td>{{ $quiz->name }}</td>
					<td>{!! Str::limit($quiz->description, 30, '...') !!}</td>
					<td>@if($quiz->active)<i class="fa fa-check-square-o fa-lg" style="color:green;"></i>@else<i class="fa fa-square-o fa-lg" style="color:red;"></i>@endif</td>
					<td>{{ $quiz->created_at->toFormattedDateString() }}</td>
					<td>
					<a href="{{ route('quizzes.edit', ['quiz' => $quiz->id]) }}" title="Edit Quiz Details"><i class="fa fa-pencil-square fa-2x"></i></a>&nbsp;&nbsp;
					<a href="{{ route('quiz_questions.list', ['quiz_id' => $quiz->id]) }}" title="Edit Quiz Questions"><i class="fa fa-list fa-2x"></i></a>&nbsp;&nbsp;
					<form method="post" action="{{ route('quizzes.destroy', ['quiz' => $quiz->id]) }}" style="display:inline;">@csrf @method('DELETE') <a onclick="if(confirm('Really delete this quiz?')) { this.parentNode.submit(); }" title="Delete this quiz"><i class="fa fa-trash fa-2x" style="color:red;"></i></a></form>
				</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Description</th>
					<th>Active</th>
					<th>Created</th>
					<th>Actions</th>
				</tr>
			</tfoot>
		</table>
		@else
			<center>No Records Found...</center>
		@endif
		</div>
	</div>
		@stop

		@section('css')
		@stop

		@section('js')
		<script>
		$('#quizzes').DataTable({
		  "paging": true,
		  "lengthChange": true,
		  "searching": true,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false,
        'columnDefs' : [{
          'targets' : [-1],
          'orderable' : false
         }]
		});
		</script>
		@stop

@push('css')
@push('js')
