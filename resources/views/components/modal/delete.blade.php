<a type="button" data-bs-toggle="modal" data-bs-target="#{{ $id }}" class="btn btn-danger btn-sm">
	<i class="bi bi-trash"></i>
	{{ isset($text) ? $text : null }}
</a>
<div class="modal fade" id="{{ $id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="{{ $id }}Label" aria-hidden="true">
	<form action="{{ $route }}" method="POST" class="modal-dialog">
		@csrf
		@method('DELETE')
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="deleteModalLabel">Hapus Data {{ $data }}</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<span class="text-danger">Data yang telah dihapus, tidak dapat dikembalikan.</span>
				<span class="fw-bold">Apakah Anda yakin ingin menghapus data ini?</span>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-danger">Ya, Hapus</button>
			</div>
		</div>
	</form>
</div>
