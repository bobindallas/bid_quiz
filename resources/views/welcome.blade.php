@extends('layouts.app')

@section('content_header')
   {{-- Breadcrumbs::render('home') --}}
	@stop

	@section('content')
   <h1>Let&rsquo;s take a quiz...</h1>
   <p class="lead">Login above:</p>
   <p class="lead">Superuser: super@email.com (has all privileges) | password: secret</p>
   <p class="lead">Admin: admin@email.com | password: secret</p>
   <p class="lead">User: user@email.com | password: secret</p>
@stop
