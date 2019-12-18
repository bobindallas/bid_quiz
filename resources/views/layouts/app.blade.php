<!doctype html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="favicon.ico">
	<title>{{ config('app.name') }}</title>

	<!-- Bootstrap core CSS -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<script src="{{ asset('js/app.js') }}"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	{{--<script src="https://cdn.jsdelivr.net/npm/vue"></script> --}}
	@stack('css')
	@yield('css')
  </head>

  <body>
	 <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
	   <a class="navbar-brand" href="/">Home</a>
	<!-- Right Side Of Navbar -->
	<ul class="navbar-nav ml-auto">
	    <!-- Authentication Links -->
	    @guest
	        <li class="nav-item">
	            <a class="nav-link" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
	        </li>
	    @endguest
	</ul>
	 </nav>

	 <main role="main" class="">
		<br />
		<br />
		<br />
		<br />
	   <div class="container">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h5>@yield('content_header')</h5>
		</section>
		@include('inc.messages')
		@yield('content')
{{-- temp to get form buttons off the floor --}}
<br />
<br />
	   </div>

	 </main><!-- /.container -->
@stack('js')
@yield('js')
  </body>
</html>
