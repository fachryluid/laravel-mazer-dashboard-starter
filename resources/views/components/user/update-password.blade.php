<x-form.layout.horizontal action="{{ route('dashboard.master.users.update.password', $userId) }}" method="PUT" submit-text="Perbarui">
  <x-form.input layout="horizontal" type="password" name="new_password" label="Password Baru" placeholder="Password Baru" />
  <x-form.input layout="horizontal" type="password" name="confirm_password" label="Konfirmasi Password Baru" placeholder="Konfirmasi Password Baru" />
</x-form.layout.horizontal>