@php
	use App\Constants\UserGender;
@endphp
@extends('layouts.dashboard', [
    'breadcrumbs' => [
        'Dasbor' => route('dashboard.index'),
        'Master Pengguna' => null,
    ],
])
@section('title', 'Master Pengguna')
@push('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.bootstrap5.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.bootstrap5.css">
@endpush
@section('content')
	<section class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title pl-1">Filter</h4>
				</div>
				<div class="card-body table-responsive px-4">
					<div class="row">
						<div class="col-12">
							<label class="form-label">Jenis Kelamin</label>
							<select class="form-select filter-select filter-select-gender">
								<option value="">Semua</option>
								<option value="{{ UserGender::MALE }}">{{ UserGender::MALE }}</option>
								<option value="{{ UserGender::FEMALE }}">{{ UserGender::FEMALE }}</option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12">
			<div class="card">
				<div class="card-header d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
					<h4 class="card-title pl-1">Daftar Pengguna</h4>
					<div class="d-flex gap-2">
						<a href="{{ route('dashboard.master.users.create') }}" class="btn btn-primary btn-sm">
							<i class="bi bi-plus-square"></i>
							Tambah Data
						</a>
					</div>
				</div>
				<div class="card-body table-responsive px-4">
					<table class="table-striped data-table table">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Email</th>
								<th>Jenis Kelamin</th>
								<th style="white-space: nowrap">Aksi</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
@endsection
@push('scripts')
	<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
	<script src="https://cdn.datatables.net/2.1.7/js/dataTables.bootstrap5.js"></script>
	<script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>
	<script src="https://cdn.datatables.net/responsive/3.0.3/js/responsive.bootstrap5.js"></script>
	<script type="text/javascript">
		$(function() {
			const table = $('.data-table').DataTable({
				order: [],
				responsive: true,
				processing: true,
				serverSide: true,
				ajax: {
					url: "{{ route('dashboard.master.users.index') }}",
					data: function(d) {
						d.gender = $('.filter-select-gender').val();
					}
				},
				columns: [{
						data: 'user.name',
						name: 'name'
					},
					{
						data: 'user.email',
						name: 'email'
					},
					{
						data: 'user.gender',
						name: 'gender',
						orderable: false,
					},
					{
						data: 'action',
						name: 'action',
						orderable: false,
						searchable: false
					}
				]
			});

			$('.filter-select').change(function() {
				table.ajax.reload();
			});
		});
	</script>
@endpush
