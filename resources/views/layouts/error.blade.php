<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>{{ $setting->app_name }} - @yield('title')</title>
		<link rel="shortcut icon" href="{{ $setting->app_logo ? asset('storage/uploads/settings/' . $setting->app_logo) : asset('images/default/jejakode.svg') }}" type="image/x-icon">
		<link rel="preconnect" href="https://fonts.bunny.net">
		<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
		<link rel="stylesheet" crossorigin href="{{ asset('css/app.css') }}">
		<link rel="stylesheet" crossorigin href="{{ asset('css/error.css') }}">
	</head>
	<body>
		<script src="{{ asset('js/initTheme.js') }}"></script>
		<div id="error">
			@yield('content')
		</div>
	</body>
</html>
