@php
	use App\Constants\UserGender;
	use App\Utils\FormatUtils;
@endphp
@extends('layouts.dashboard', [
    'breadcrumbs' => [
        'Dasbor' => route('dashboard.index'),
        'Master Pengguna' => route('dashboard.master.users.index'),
        $user->name => route('dashboard.master.users.show', $user->uuid),
        'Edit' => null,
    ],
])
@section('title', 'Edit Pengguna')
@section('content')
	<section class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h4 class="card-title pl-1">Form Edit</h4>
				</div>
				<div class="card-body px-4">
					<x-form.layout.horizontal action="{{ route('dashboard.master.users.update', $user->uuid) }}" method="PUT" submit-text="Perbarui">
						<h6 class="mb-4">Personal</h6>
						<x-form.input layout="horizontal" name="name" label="Nama Lengkap" :value="$user->name" />
						<x-form.select layout="horizontal" name="gender" label="Jenis Kelamin" :value="$user->gender" :options="[
						    (object) [
						        'label' => UserGender::MALE,
						        'value' => UserGender::MALE,
						    ],
						    (object) [
						        'label' => UserGender::FEMALE,
						        'value' => UserGender::FEMALE,
						    ],
						]" />
						<x-form.input layout="horizontal" type="date" name="birthday" label="Tanggal Lahir" :value="$user->birthday" placeholder="Tanggal Lahir.." />
						<x-form.input layout="horizontal" format="phone" name="phone" label="No. HP" placeholder="0812-3456-7890" maxlength="14" :value="FormatUtils::phoneNumber($user->phone)" />
						<h6 class="mb-4 mt-4">Akun</h6>
						<x-form.input layout="horizontal" name="username" label="Username" :value="$user->username" />
						<x-form.input layout="horizontal" type="email" name="email" label="Email" :value="$user->email" placeholder="Email aktif.." />
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
					<x-form.layout.horizontal action="{{ route('dashboard.master.users.update.password', $user->uuid) }}" method="PUT" submit-text="Perbarui">
						<x-form.input layout="horizontal" type="password" name="new_password" label="Password Baru" placeholder="Password Baru" />
						<x-form.input layout="horizontal" type="password" name="confirm_password" label="Konfirmasi Password Baru" placeholder="Konfirmasi Password Baru" />
					</x-form.layout.horizontal>
				</div>
			</div>
		</div>
	</section>
@endsection
