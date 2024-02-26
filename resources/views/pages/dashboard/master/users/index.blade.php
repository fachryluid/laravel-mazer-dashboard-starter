@extends('layouts.dashboard', [
    'breadcrumbs' => [
        'Dasbor' => route('dashboard.index'),
        'Master Pengguna' => null,
    ],
])
@section('title', 'Master Pengguna')
@push('css')
@endpush
@section('content')
	<section class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body py-4-5 table-responsive px-4">
					{{ $dataTable->table() }}
				</div>
			</div>
		</div>
	</section>
@endsection
@push('scripts')
	{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
