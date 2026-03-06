<form id="form"action="{{ route('admin.password.update') }}" method="POST">
    @csrf
    <div class="row">
        <input type="hidden" name="id" value="{{ auth()->user()->id }}">
        <x-input-form-component col="12" title="Password Sekarang" name="current_password" type="password" id="current_password" />
        <x-input-form-component col="12" title="Password Baru" name="new_password" type="password" id="password" />
        <x-input-form-component col="12" title="Konfirmasi Password Baru" name="new_password_confirmation" type="password" id="password_confirmation" />
        <div class="d-flex col-12">
            <button type="submit" class="btn btn-dark ms-auto" id="btncreate">Save</button>
        </div>
    </div>
</form>
