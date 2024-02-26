@extends('layouts.dashboard', [
    'breadcrumbs' => [
        'Dasbor' => route('dashboard.index'),
        'Pengaturan' => '#',
    ],
])
@section('title', 'Pengaturan')
@push('css')
	<link rel="stylesheet" href="{{ asset('css/extensions/filepond.css') }}">
	<link rel="stylesheet" href="{{ asset('css/extensions/filepond-plugin-image-preview.css') }}">
@endpush
@section('content')
	<section class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title pl-1">Aplikasi</h4>
				</div>
				<div class="card-body">
					<x-form.layout.horizontal action="{{ route('dashboard.setting.update') }}" method="PUT" enctype="multipart/form-data">
						<x-form.input layout="horizontal" name="app_name" label="Nama Aplikasi" :value="$setting->app_name" />
						<x-form.textarea layout="horizontal" name="app_desc" label="Deskripsi Aplikasi" :value="$setting->app_desc" />
						<x-form.input layout="horizontal" type="file" name="auth_bg" label="Login Background" class="image-preview-filepond" />
					</x-form.layout.horizontal>
				</div>
			</div>
		</div>
	</section>
@endsection
@push('scripts')
	<script src="{{ asset('js/extensions/filepond-plugin-file-validate-size.min.js') }}"></script>
	<script src="{{ asset('js/extensions/filepond-plugin-file-validate-type.min.js') }}"></script>
	<script src="{{ asset('js/extensions/filepond-plugin-image-crop.min.js') }}"></script>
	<script src="{{ asset('js/extensions/filepond-plugin-image-exif-orientation.min.js') }}"></script>
	<script src="{{ asset('js/extensions/filepond-plugin-image-filter.min.js') }}"></script>
	<script src="{{ asset('js/extensions/filepond-plugin-image-preview.min.js') }}"></script>
	<script src="{{ asset('js/extensions/filepond-plugin-image-resize.min.js') }}"></script>
	<script src="{{ asset('js/extensions/filepond.js') }}"></script>
	<script>
		const imageData = @json($setting->auth_bg);

		FilePond.registerPlugin(
			FilePondPluginImagePreview,
			FilePondPluginImageCrop,
			FilePondPluginImageExifOrientation,
			FilePondPluginImageFilter,
			FilePondPluginImageResize,
			FilePondPluginFileValidateSize,
			FilePondPluginFileValidateType,
		)

		FilePond.create(document.querySelector(".image-preview-filepond"), {
			files: imageData ? [{
				source: imageData,
				options: {
					type: 'local',
				},
			}, ] : [],
			server: imageData ? {
				load: (id, load) => {
					fetch('/dashboard/setting/load-file/auth-bg').then(res => res.blob()).then(load)
				}
			} : {},
			credits: null,
			allowImagePreview: true,
			allowImageFilter: false,
			allowImageExifOrientation: false,
			allowImageCrop: false,
			acceptedFileTypes: ["image/png", "image/jpg", "image/jpeg", "image/webp"],
			fileValidateTypeDetectType: (source, type) =>
				new Promise((resolve, reject) => {
					// Do custom type detection here and return with promise
					resolve(type)
				}),
			storeAsFile: true,
		})
	</script>
@endpush
