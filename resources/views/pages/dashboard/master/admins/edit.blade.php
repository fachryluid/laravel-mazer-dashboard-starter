@php
	use App\Constants\UserGender;
@endphp
@extends('layouts.dashboard', [
    'breadcrumbs' => [
        'Dasbor' => route('dashboard.index'),
        'Master Admin' => route('dashboard.admins.index'),
        $admin->user->name => route('dashboard.admins.show', $admin->uuid),
        'Edit' => null,
    ],
])
@section('title', 'Edit Admin')
@section('content')
	<section class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h4 class="card-title pl-1">Personal</h4>
				</div>
				<div class="card-body px-4">
					<x-form.layout.horizontal action="{{ route('dashboard.admins.update', $admin->uuid) }}" method="PUT" submit-text="Perbarui">
						<h6 class="mb-4">Personal</h6>
						<x-form.input layout="horizontal" name="name" label="Nama Lengkap" :value="$admin->user->name" />
						<x-form.select layout="horizontal" name="gender" label="Jenis Kelamin" :value="$admin->user->gender" :options="[
						    (object) [
						        'label' => UserGender::MALE,
						        'value' => UserGender::MALE,
						    ],
						    (object) [
						        'label' => UserGender::FEMALE,
						        'value' => UserGender::FEMALE,
						    ],
						]" />
						<x-form.input layout="horizontal" type="date" name="birthday" label="Tanggal Lahir" :value="$admin->user->birthday" placeholder="Tanggal Lahir.." />
						<x-form.input layout="horizontal" format="phone" name="phone" label="No. HP" placeholder="0812-3456-7890" maxlength="14" :value="$admin->user->formatted_phone" />
						<h6 class="mb-4 mt-4">Akun</h6>
						<x-form.input layout="horizontal" name="username" label="Username" :value="$admin->user->username" />
						<x-form.input layout="horizontal" type="email" name="email" label="Email" :value="$admin->user->email" placeholder="Email aktif.." />
					</x-form.layout.horizontal>
				</div>
			</div>
		</div>
		<div class="col-12">
			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h4 class="card-title pl-1">Ganti Password</h4>
				</div>
				<div class="card-body px-4">
					<x-user.update-password :user-id="$admin->user_id" />
				</div>
			</div>
		</div>
	</section>
@endsection
@push('scripts')
	<script src="{{ asset('js/custom/format-phone.js') }}"></script>
@endpush