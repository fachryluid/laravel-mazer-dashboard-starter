@if (isset($layout) && $layout == 'horizontal')
	<div class="col-md-4">
		<label for="{{ $name }}">{{ $label }}</label>
	</div>
	<div class="col-md-8 form-group">
		<select name="{{ $name }}" id="{{ $name }}" class="form-select @error($name) is-invalid @enderror {{ $class ?? '' }}">
			<option value="" hidden>Pilih {{ $label }}</option>
			@foreach ($options as $option)
				<option value="{{ $option->value }}" {{ isset($value) && $option->value == $value ? 'selected' : '' }}>{{ $option->label }}</option>
			@endforeach
		</select>
		@error($name)
			<div class="invalid-feedback">{{ $message }}</div>
		@enderror
	</div>
@else
	<div class="mb-3">
		<label for="{{ $name }}" class="form-label">{{ $label }}</label>
		<select name="{{ $name }}" id="{{ $name }}" class="form-select @error($name) is-invalid @enderror {{ $class ?? '' }}">
			<option value="" hidden>Pilih {{ $label }}</option>
			@foreach ($options as $option)
				<option value="{{ $option->value }}" {{ isset($value) && $option->value == $value ? 'selected' : '' }}>{{ $option->label }}</option>
			@endforeach
		</select>
		@error($name)
			<div class="invalid-feedback">{{ $message }}</div>
		@enderror
	</div>
@endif
