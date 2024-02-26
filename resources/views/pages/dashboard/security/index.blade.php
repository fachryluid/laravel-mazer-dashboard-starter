@extends('layouts.dashboard', [
    'breadcrumbs' => [
        'Dasbor' => route('dashboard.index'),
        'Keamanan' => '#',
    ],
])
@section('title', 'Keamanan')
@section('content')
	<section class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title pl-1">Ganti Password</h4>
				</div>
				<div class="card-body">
					<x-form.layout.horizontal action="{{ route('dashboard.security.update.password') }}" method="PUT">
						<x-form.input layout="horizontal" type="password" name="old_password" label="Password Lama" placeholder="Password Lama" />
						<x-form.input layout="horizontal" type="password" name="new_password" label="Password Baru" placeholder="Password Baru" />
						<x-form.input layout="horizontal" type="password" name="confirm_password" label="Konfirmasi Password Baru" placeholder="Konfirmasi Password Baru" />
					</x-form.layout.horizontal>
				</div>
			</div>
		</div>
	</section>
@endsection
