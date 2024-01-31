@extends('layouts.dashboard', [
    'breadcrumbs' => [
        'Dasbor' => route('dashboard.index'),
        'Pengaturan' => '#',
    ],
])
@section('title', 'Pengaturan')
@push('css')
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
						<x-form.input layout="horizontal" name="app_name" label="Nama Aplikasi" />
						<x-form.textarea layout="horizontal" name="app_desc" label="Deskripsi Aplikasi" />
						<x-form.input layout="horizontal" type="file" name="auth_bg" label="Background Autentikasi" />
					</x-form.layout.horizontal>
				</div>
			</div>
		</div>
	</section>
@endsection
@push('scripts')
@endpush
