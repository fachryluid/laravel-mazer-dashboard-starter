<div class="mb-3">
	<label for="{{ $name }}" class="form-label">{{ $label }}</label>
	<select name="{{ $name }}" id="{{ $name }}" class="form-control @error($name) is-invalid @enderror {{ $class ?? '' }}">
		<option value="" hidden>Pilih {{ $label }}</option>
		@foreach ($options as $option)
			<option value="{{ $option->value }}" {{ $option->value == $value ? 'selected' : '' }}>{{ $option->label }}</option>
		@endforeach
	</select>
	@error($name)
		<div class="invalid-feedback">{{ $message }}</div>
	@enderror
</div>
