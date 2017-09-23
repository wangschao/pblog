<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title')</title>
		<link rel="stylesheet" href="/css/app.css">
		<script src="/js/jquery-2.0.3.min.js"></script>
		<script src="/js/app.js"></script>
		@yield('link')
	</head>
	<body>
		@include('layouts._header')
		<div class="container">
			@include('shared._message')
			@section('content')
			@show
		</div>
		@include('layouts._footer')
	</body>

	<script>
	@yield('script')
	</script>
</html>