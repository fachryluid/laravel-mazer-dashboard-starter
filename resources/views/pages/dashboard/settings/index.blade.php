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
	<link rel="stylesheet" href="{{ asset('css/extensions/summernote-lite.css') }}">
	<link rel="stylesheet" href="{{ asset('css/form-editor-summernote.css') }}">
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
						<h6 class="mb-3">Umum</h6>
						<x-form.input layout="horizontal" name="app_name" label="Nama Aplikasi" :value="$setting->app_name" />
						<x-form.textarea layout="horizontal" name="app_desc" label="Deskripsi Aplikasi" :value="$setting->app_desc" />
						<x-form.input layout="horizontal" type="file" name="app_logo" label="Logo Aplikasi" class="image-preview-filepond app-logo" />
						<x-form.input layout="horizontal" type="file" name="auth_bg" label="Login Background" class="image-preview-filepond auth-bg" />
						<h6 class="mb-3">Laporan</h6>
						<x-form.editor layout="horizontal" name="report_header" label="KOP Laporan" :value="$setting->report_header" />
						<x-form.input layout="horizontal" type="file" name="report_logo" label="Logo Laporan" class="image-preview-filepond report-logo" />
					</x-form.layout.horizontal>
				</div>
			</div>
		</div>
	</section>
@endsection
@push('scripts')
	<script src="{{ asset('js/extensions/jquery.min.js') }}"></script>
	<script src="{{ asset('js/extensions/filepond-plugin-file-validate-size.min.js') }}"></script>
	<script src="{{ asset('js/extensions/filepond-plugin-file-validate-type.min.js') }}"></script>
	<script src="{{ asset('js/extensions/filepond-plugin-image-crop.min.js') }}"></script>
	<script src="{{ asset('js/extensions/filepond-plugin-image-exif-orientation.min.js') }}"></script>
	<script src="{{ asset('js/extensions/filepond-plugin-image-filter.min.js') }}"></script>
	<script src="{{ asset('js/extensions/filepond-plugin-image-preview.min.js') }}"></script>
	<script src="{{ asset('js/extensions/filepond-plugin-image-resize.min.js') }}"></script>
	<script src="{{ asset('js/extensions/filepond.js') }}"></script>
	<script src="{{ asset('js/extensions/summernote-lite.min.js') }}"></script>
	<script>
		const imageDataAuthBg = @json($setting->auth_bg);
		const imageDataReportLogo = @json($setting->report_logo);
		const imageDataAppLogo = @json($setting->app_logo);

		FilePond.registerPlugin(
			FilePondPluginImagePreview,
			FilePondPluginImageCrop,
			FilePondPluginImageExifOrientation,
			FilePondPluginImageFilter,
			FilePondPluginImageResize,
			FilePondPluginFileValidateSize,
			FilePondPluginFileValidateType,
		)

		FilePond.create(document.querySelector(".auth-bg"), {
			files: imageDataAuthBg ? [{
				source: imageDataAuthBg,
				options: {
					type: 'local',
				},
			}, ] : [],
			server: imageDataAuthBg ? {
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
					resolve(type)
				}),
			storeAsFile: true,
		})

		FilePond.create(document.querySelector(".app-logo"), {
			files: imageDataAppLogo ? [{
				source: imageDataAppLogo,
				options: {
					type: 'local',
				},
			}, ] : [],
			server: imageDataAppLogo ? {
				load: (id, load) => {
					fetch('/dashboard/setting/load-file/app-logo').then(res => res.blob()).then(load)
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
					resolve(type)
				}),
			storeAsFile: true,
		})

		FilePond.create(document.querySelector(".report-logo"), {
			files: imageDataReportLogo ? [{
				source: imageDataReportLogo,
				options: {
					type: 'local',
				},
			}, ] : [],
			server: imageDataReportLogo ? {
				load: (id, load) => {
					fetch('/dashboard/setting/load-file/report-logo').then(res => res.blob()).then(load)
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
					resolve(type)
				}),
			storeAsFile: true,
		})
	</script>
@endpush
