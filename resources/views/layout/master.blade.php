<!DOCTYPE html>
<html lang="en">
	<head>
	@include('include.head')
	@yield('style')
	</head>
	<body>
		@include('include.sidenav')
		@yield('content')
		@include('include.scripts')
		@yield('script')
	</body>
</html>