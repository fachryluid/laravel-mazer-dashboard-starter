@extends('layouts.export')
@section('title', 'Laporan Pengguna')
@section('content')
	<table class="table-striped table">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				<th>Tanggal Lahir</th>
				<th>No. HP</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $user)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->gender }}</td>
					<td>{{ $user->birthday }}</td>
					<td>{{ $user->phone }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection
