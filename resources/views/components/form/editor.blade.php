@if (isset($layout) && $layout == 'horizontal')
	<div class="col-md-4">
		<label for="{{ $name }}">{{ $label }}</label>
	</div>
	<div class="col-md-8 form-group">
		<textarea id="{{ $name }}" class="@error($name) is-invalid @enderror" name="{{ $name }}">{{ $value ?? old($name) }}</textarea>
		@error($name)
			<div class="invalid-feedback">{{ $message }}</div>
		@enderror
	</div>
@else
	<div class="mb-3">
		<label for="{{ $name }}" class="form-label">{{ $label }}</label>
		<textarea id="{{ $name }}" class="@error($name) is-invalid @enderror" name="{{ $name }}">{{ $value ?? old($name) }}</textarea>
		@error($name)
			<div class="invalid-feedback">{{ $message }}</div>
		@enderror
	</div>
@endif
@push('scripts2')
	<script>
		$("#{{ $name }}").summernote({
			tabsize: 2,
			height: 120,
		})
	</script>
@endpush
