@php
	use App\Constants\UserGender;
@endphp
@extends('layouts.dashboard', [
    'breadcrumbs' => [
        'Dasbor' => route('dashboard.index'),
        'Profil' => '#',
    ],
])
@section('title', 'Profil')
@push('css')
	<style>
		#profile-label {
			cursor: pointer;
			background-color: #000;
		}

		.avatar:hover img {
			opacity: 0.8;
		}

		.avatar:hover #edit-icon {
			display: block !important;
		}
	</style>
@endpush
@section('content')
	<section class="row">
		<div class="col-12 col-lg-4">
			<div class="card">
				<div class="card-body">
					<div class="d-flex justify-content-center align-items-center flex-column">
						<label for="change-profile" class="avatar avatar-2xl position-relative" id="profile-label">
							<img src="{{ $user->avatar_url }}" alt="Avatar" style="object-fit: cover">
							<span class="position-absolute top-50 start-50 translate-middle text-xl text-white" id="edit-icon" style="display: none;">
								<i class="bi bi-pencil-square"></i>
							</span>
						</label>
						<form id="form-change-profile" action="{{ route('dashboard.profile.avatar') }}" method="POST" enctype="multipart/form-data" class="d-none">
							@csrf
							@method('PUT')
							<input type="file" name="avatar" id="change-profile">
						</form>
						<h3 class="mb-0 mt-3 text-center">{{ $user->name }}</h3>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-lg-8">
			<div class="card">
				<div class="card-body">
					<x-form.layout.vertical action="{{ route('dashboard.profile.update') }}" method="PUT">
						<x-form.input name="name" label="Nama Lengkap" :value="$user->name" />
						<x-form.input name="username" label="Username" :value="$user->username" />
						<x-form.input type="email" name="email" label="Email" :value="$user->email" placeholder="Email aktif.." />
						<x-form.input name="phone" format="phone" label="No. HP" maxlength="14" :value="$user->formatted_phone" />
						<x-form.input type="date" name="birthday" label="Tanggal Lahir" :value="$user->birthday" placeholder="Tanggal Lahir.." />
						<x-form.select name="gender" label="Jenis Kelamin" :value="$user->gender" :options="[
						    (object) [
						        'label' => UserGender::MALE,
						        'value' => UserGender::MALE,
						    ],
						    (object) [
						        'label' => UserGender::FEMALE,
						        'value' => UserGender::FEMALE,
						    ],
						]" />
					</x-form.layout.vertical>
				</div>
			</div>
		</div>
	</section>
@endsection
@push('scripts')
	<script>
		document.querySelector('#change-profile').addEventListener('change', e => {
			document.querySelector('#form-change-profile').submit()
		})
	</script>
@endpush
