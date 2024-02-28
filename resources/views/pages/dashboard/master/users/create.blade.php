@extends('layouts.dashboard', [
    'breadcrumbs' => [
        'Dasbor' => route('dashboard.index'),
        'Master Pengguna' => route('dashboard.master.user.index'),
        'Tambah Data' => null,
    ],
])
@section('title', 'Tambah Pengguna')
@section('content')
	<section class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h4 class="card-title pl-1">Form Tambah Pengguna</h4>
				</div>
				<div class="card-body px-4">
					<x-form.layout.horizontal action="{{ route('dashboard.master.user.store') }}" method="POST">
						<x-form.input layout="horizontal" name="name" label="Nama Lengkap" placeholder="Nama Lengkap.." />
						<x-form.input layout="horizontal" name="username" label="Username" placeholder="Username.." />
						<x-form.input layout="horizontal" type="email" name="email" label="Email" placeholder="Email aktif.." />
						<x-form.input layout="horizontal" name="phone" label="No. HP" placeholder="Nomor HP.." />
						<x-form.input layout="horizontal" type="date" name="birthday" label="Tanggal Lahir" placeholder="Tanggal Lahir.." />
						<x-form.select layout="horizontal" name="gender" label="Jenis Kelamin" :options="[
						    (object) [
						        'label' => 'Laki-laki',
						        'value' => 'male',
						    ],
						    (object) [
						        'label' => 'Perempuan',
						        'value' => 'female',
						    ],
						]" />
					</x-form.layout.horizontal>
				</div>
			</div>
		</div>
	</section>
@endsection
