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

		#profile-label img:hover {
			opacity: .9;
		}
	</style>
@endpush
@section('content')
	<section class="row">
		<div class="col-12 col-lg-4">
			<div class="card">
				<div class="card-body">
					<div class="d-flex justify-content-center align-items-center flex-column">
						<label for="change-profile" class="avatar avatar-2xl" id="profile-label">
							<img src="{{ asset($user->avatar ? 'storage/uploads/avatars/' . $user->avatar : 'images/default/profile-0.jpg') }}" alt="Avatar" style="object-fit: cover">
						</label>
						<form id="form-change-profile" action="{{ route('dashboard.profile.avatar') }}" method="POST" enctype="multipart/form-data" class="d-none">
							@csrf
							@method('PUT')
							<input type="file" name="avatar" id="change-profile">
						</form>
						<h3 class="mt-3">{{ $user->name }}</h3>
						<p class="text-small">{{ $user->role }}</p>
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
						<x-form.input name="phone" label="No. HP" :value="$user->phone" placeholder="Nomor HP.." />
						<x-form.input type="date" name="birthday" label="Tanggal Lahir" :value="$user->birthday" placeholder="Tanggal Lahir.." />
						<x-form.select name="gender" label="Jenis Kelamin" :value="$user->gender" :options="[
						    (object) [
						        'label' => App\Constants\UserGender::MALE,
						        'value' => App\Constants\UserGender::MALE,
						    ],
						    (object) [
						        'label' => App\Constants\UserGender::FEMALE,
						        'value' => App\Constants\UserGender::FEMALE,
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
