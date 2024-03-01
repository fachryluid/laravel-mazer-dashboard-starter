@extends('layouts.dashboard', [
    'breadcrumbs' => [
        'Dasbor' => route('dashboard.index'),
        'Master Pengguna' => route('dashboard.master.user.index'),
        $user->name => null,
    ],
])
@section('title', 'Detail Pengguna')
@section('content')
	<section class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h4 class="card-title pl-1">Detail {{ $user->name }}</h4>
					<div class="d-flex gap-2">
						<a href="{{ route('dashboard.master.user.edit', $user->uuid) }}" class="btn btn-success btn-sm">
							<i class="bi bi-pencil-square"></i>
							Edit
						</a>
						<x-modal.delete :id="'deleteModal-'. $user->uuid" :route="route('dashboard.master.user.destroy', $user->uuid)" :data="$user->name" text="Hapus" />
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
							<td>{{ $user->name }}</td>
						</tr>
						<tr>
							<th>Jenis Kelamin</th>
							<td>{{ $user->gender ?? '-' }}</td>
						</tr>
						<tr>
							<th>Tanggal Lahir</th>
							<td>{{ $user->birthday ?? '-' }}</td>
						</tr>
						<tr>
							<th>No. HP</th>
							<td>{{ App\Utils\FormatUtils::phoneNumber($user->phone) ?? '-' }}</td>
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
							<td>{{ $user->username }}</td>
						</tr>
						<tr>
							<th>Email</th>
							<td>{{ $user->email ?? '-' }}</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</section>
@endsection
