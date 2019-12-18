@extends('layouts.app')
@section('title', 'quiz_question_options')

   @section('content_header')
      {{ Breadcrumbs::render('quiz_question_options.list', $quiz_question) }}
   @stop

	@section('content')
	<div class="container">
	 <div style="float:right;padding-right:20px;"><a href="{{ route('quiz_question_options.create', ['quiz_question_id' => $quiz_question->id]) }}" title="Add New Question Option"><i class="fa fa-plus-circle fa-2x"></i></a><br /><br /></div>
		<div class="card-body">
			@if (count($quiz_question_options))
		<table id="quiz_question_options" class="table table-hover table-responsive-sm table-sm compact">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Correct</th>
					<th>Active</th>
					<th>Created</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($quiz_question_options as $quiz_question_option)
				<tr>
					<td>{{ $quiz_question_option->id }}</td>
					<td>{{ $quiz_question_option->name }}</td>
					<td>@if($quiz_question_option->correct)<i class="fa fa-check-square-o fa-lg" style="color:green;"></i>@else<i class="fa fa-square-o fa-lg" style="color:red;"></i>@endif</td>
					<td>@if($quiz_question_option->active)<i class="fa fa-check-square-o fa-lg" style="color:green;"></i>@else<i class="fa fa-square-o fa-lg" style="color:red;"></i>@endif</td>
					<td>{{ $quiz_question_option->created_at->toFormattedDateString() }}</td>
					<td>
					<a href="{{ route('quiz_question_options.edit', ['quiz_question_id' => $quiz_question_option->id]) }}" title="Edit quiz_question Details"><i class="fa fa-pencil-square fa-2x"></i></a>&nbsp;&nbsp;
					<form method="post" action="{{ route('quiz_question_options.destroy', ['quiz_question_option_id' => $quiz_question_option->id]) }}" style="display:inline;">@csrf @method('DELETE') <a onclick="if(confirm('Really delete this quiz_question?')) { this.parentNode.submit(); }" title="Delete this quiz_question"><i class="fa fa-trash fa-2x" style="color:red;"></i></a></form>
				</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Correct</th>
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
		$('#quiz_question_options').DataTable({
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
