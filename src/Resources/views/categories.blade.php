@extends('frontend::layouts.master')

@section('content')
	<div class="mainheading">
		<h1 class="sitetitle">Categories</h1>
		<p class="lead">
			A list of all the categories
		</p>
	</div>

	<!-- Begin List Posts
	================================================== -->
	@include('frontend::partials.home.categories')
	<!-- End List Posts
		================================================== -->
@stop