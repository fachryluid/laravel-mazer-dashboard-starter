@extends('layouts.dashboard', [
    'breadcrumbs' => [
        'Dasbor' => route('dashboard.index'),
        'Master Admin' => route('dashboard.admins.index'),
        $admin->user->name => null,
    ],
])
@section('title', 'Detail Admin')
@section('content')
	<section class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
					<h4 class="card-title pl-1">Detail {{ $admin->user->name }}</h4>
					<div class="d-flex gap-2">
						<a href="{{ route('dashboard.admins.edit', $admin->uuid) }}" class="btn btn-success btn-sm">
							<i class="bi bi-pencil-square"></i>
							Edit
						</a>
						<x-modal.delete :id="'deleteModal-'. $admin->uuid" :route="route('dashboard.admins.destroy', $admin->uuid)" :data="$admin->user->name" text="Hapus" />
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
							<td>{{ $admin->user->name }}</td>
						</tr>
						<tr>
							<th>Jenis Kelamin</th>
							<td>{{ $admin->user->gender ?? '-' }}</td>
						</tr>
						<tr>
							<th>Tanggal Lahir</th>
							<td>{{ $admin->user->formatted_birthday }}</td>
						</tr>
						<tr>
							<th>No. HP</th>
							<td>{{ $admin->user->formatted_phone }}</td>
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
							<td>{{ $admin->user->username }}</td>
						</tr>
						<tr>
							<th>Email</th>
							<td>
								<div style="word-wrap: break-word; word-break: break-all;">
									{{ $admin->user->email ?? '-' }}
								</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</section>
@endsection
