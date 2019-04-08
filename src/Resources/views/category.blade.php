@extends('frontend::layouts.master')

@section('content')
	<div class="mainheading">
		@php
			$imageParams = ["template" => "dynamic", "params" => ["w" => 1200, "h" => 300]];
		@endphp
		<h1 class="sitetitle">{{$category->name}}</h1>
		<img class="featured-image img-fluid" src="{{ filter_var($category->image, FILTER_VALIDATE_URL) ? $category->image : Voyager::image($category->image, "", $imageParams) }}" alt="">
	<div class="lead">{!!$category->body!!}</div>
	</div>
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

	<!-- Begin List Posts
	================================================== -->
	@include('frontend::partials.home.categories', ['categoryTitle' => "Other Categories"])
	<!-- End List Posts
		================================================== -->
@stop