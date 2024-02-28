<form action="{{ $action ?? '#' }}" method="{{ $method && $method == 'GET' ? 'GET' : 'POST' }}" enctype="{{ $enctype ?? '' }}" class="form form-horizontal">
  @csrf
  @method($method ?? 'POST')
  <div class="form-body">
    <div class="row">
      {{ $slot }}
      <div class="col-sm-12 d-flex justify-content-end">
        <button type="submit" class="btn btn-primary mb-1 me-1">{{ $submitText ?? 'Submit' }}</button>
      </div>
    </div>
  </div>
</form>