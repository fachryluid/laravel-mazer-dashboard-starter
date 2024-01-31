@extends('layouts.error')
@section('title', 'Halaman Tidak Ditemukan')
@section('content')
	<div class="error-page container">
		<div class="col-md-8 col-12 offset-md-2">
			<div class="text-center">
				<img class="img-error" src="{{ asset('images/errors/error-404.svg') }}" alt="Not Found">
				<h1 class="error-title">Tidak Ditemukan</h1>
				<p class='fs-5 text-gray-600'>Halaman yang Anda cari tidak ditemukan.</p>
				<a href="{{ route('dashboard.index') }}" class="btn btn-lg btn-outline-primary mt-3">Dasbor</a>
			</div>
		</div>
	</div>
@endsection
