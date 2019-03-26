<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="{{frontend_asset('img/favicon.ico')}}">
		<title>Mediumish - A Medium style template by WowThemes.net</title>
		<!-- Bootstrap core CSS -->
		<link href="{{ frontend_asset('css/bootstrap.min.css') }}" rel="stylesheet">
		<!-- Fonts -->
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Righteous%7CMerriweather:300,300i,400,400i,700,700i" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="{{frontend_asset('css/mediumish.css')}}" rel="stylesheet">
	</head>
	<body>
		@include('frontend::partials.nav')
		<!-- Begin Site Title
            ================================================== -->
            <div class="container">
                @yield('content')
                @include('frontend::partials.footer')
            </div>
		
		<!-- /.container -->
		<!-- Bootstrap core JavaScript
			================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="{{frontend_asset('js/jquery.min.js')}}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="{{frontend_asset('js/bootstrap.min.js')}}"></script>
		<script src="{{frontend_asset('js/ie10-viewport-bug-workaround.js')}}"></script>
	</body>
</html>