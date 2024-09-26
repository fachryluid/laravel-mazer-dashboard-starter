@if (session('success'))
	<div class="alert alert-light-success color-success alert-dismissible fade show">
		{{ session('success') }}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
@endif

@if ($errors->any())
	<div class="alert alert-light-danger color-danger alert-dismissible fade show">
		@if (count($errors->all()) > 1)
			<ul class="mb-0">
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		@else
			<p>{{ $errors->all()[0] }}</p>
		@endif
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
@endif
