@extends('layouts.dashboard', [
    'breadcrumbs' => [
        'Dasbor' => route('dashboard.index'),
        'Master Pengguna' => route('dashboard.master.users.index'),
        $basicUser->user->name => null,
    ],
])
@section('title', 'Detail Pengguna')
@section('content')
	<section class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h4 class="card-title pl-1">Detail {{ $basicUser->user->name }}</h4>
					<div class="d-flex gap-2">
						<a href="{{ route('dashboard.master.users.edit', $basicUser->uuid) }}" class="btn btn-success btn-sm">
							<i class="bi bi-pencil-square"></i>
							Edit
						</a>
						<x-modal.delete :id="'deleteModal-' . $basicUser->uuid" :route="route('dashboard.master.users.destroy', $basicUser->uuid)" :data="$basicUser->user->name" text="Hapus" />
					</div>
				</div>
				<div class="card-body px-4">
					<table class="table-striped table-detail table">
						<tr>
							<th colspan="2">
								<h6 class="mb-0">Personal</h6>
							</th>
						</tr>
						<tr>
							<th>Nama</th>
							<td>{{ $basicUser->user->name }}</td>
						</tr>
						<tr>
							<th>Jenis Kelamin</th>
							<td>{{ $basicUser->user->gender ?? '-' }}</td>
						</tr>
						<tr>
							<th>Tanggal Lahir</th>
							<td>{{ $basicUser->user->formatted_birthday }}</td>
						</tr>
						<tr>
							<th>No. HP</th>
							<td>{{ $basicUser->user->formatted_phone }}</td>
						</tr>
						<tr>
							<td colspan="2"></td>
						</tr>
						<tr>
							<th colspan="2">
								<h6 class="mb-0">Akun</h6>
							</th>
						</tr>
						<tr>
							<th>Username</th>
							<td>{{ $basicUser->user->username }}</td>
						</tr>
						<tr>
							<th>Email</th>
							<td>{{ $basicUser->user->email ?? '-' }}</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</section>
@endsection
