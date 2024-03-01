<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>{{ $setting->app_name }} - @yield('title')</title>
		<link rel="shortcut icon" href="{{ $setting->app_logo ? asset('storage/uploads/settings/' . $setting->app_logo) : asset('images/default/jejakode.svg') }}" type="image/x-icon">
		<link rel="preconnect" href="https://fonts.bunny.net">
		<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
		@stack('css')
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<link rel="stylesheet" href="{{ asset('css/app-dark.css') }}">
	</head>

	<body>
		<script src="{{ asset('js/initTheme.js') }}"></script>
		<div id="app">
			<x-main.sidebar />
			<div id="main">
				<header class="mb-3">
					<a href="#" class="burger-btn d-block d-xl-none">
						<i class="bi bi-justify fs-3"></i>
					</a>
				</header>

				<div class="page-heading d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">
					<h3 class="mb-md-0 mb-2">@yield('title')</h3>
					@if (Request::is('dashboard'))
						<div class="d-flex align-items-center">
							<div class="avatar avatar-lg">
								<img src="{{ asset(auth()->user()->avatar ? 'storage/uploads/avatars/' . auth()->user()->avatar : 'images/default/profile-0.jpg') }}" style="object-fit: cover">
							</div>
							<div class="ms-3">
								<h6 class="mb-0 font-bold">{{ auth()->user()->name }}</h6>
								<small class="text-muted">{{ '@' . auth()->user()->username }}</small>
							</div>
						</div>
					@else
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0">
								@foreach ($breadcrumbs as $name => $url)
									@if (!$loop->last)
										<li class="breadcrumb-item"><a href="{{ $url }}">{{ $name }}</a></li>
									@else
										<li class="breadcrumb-item active" aria-current="page">{{ $name }}</li>
									@endif
								@endforeach
							</ol>
						</nav>
					@endif
				</div>
				<div class="page-content">
					<x-main.alerts />
					@yield('content')
				</div>

				<footer>
					<div class="footer clearfix text-muted mb-0">
						<div class="float-start">
							<p>{{ date('Y') }} &copy; {{ $setting->app_name }}</p>
						</div>
						<div class="float-end">
							<p>Developed by <a href="https://jejakode.com">jejakode.com</a></p>
						</div>
					</div>
				</footer>
			</div>
		</div>

		<script src="{{ asset('js/dark.js') }}"></script>
		<script src="{{ asset('js/extensions/perfect-scrollbar.min.js') }}"></script>
		<script src="{{ asset('js/app.js') }}"></script>
		@stack('scripts')
		@stack('scripts2')
	</body>

</html>
