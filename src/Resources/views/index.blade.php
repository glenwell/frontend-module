@extends('frontend::layouts.master')

@section('content')
	<div class="mainheading">
		<h1 class="sitetitle">Mediumish</h1>
		<p class="lead">
			Bootstrap theme, medium style, simply perfect for bloggers
		</p>
	</div>
	<!-- Begin Featured
		================================================== -->
	@include('frontend::partials.home.featured')
	<!-- End Featured
		================================================== -->
	<!-- Begin Altered Posts
		================================================== -->
	@include('frontend::partials.home.recent')
	<!-- End Altered Posts
		================================================== -->
	
	<!-- Begin List Posts
	================================================== -->
	@include('frontend::partials.home.all')
	<!-- End List Posts
		================================================== -->
@stop