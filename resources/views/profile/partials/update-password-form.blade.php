<form id="form"action="{{ route('password.update') }}" method="POST">
    @csrf
    @method('put')
    <div class="row">
        <input type="hidden" name="id" value="{{ auth()->user()->id }}">
        <x-input-form-component col="12" title="Current Password" type="password" id="current_password" />
        <x-input-form-component col="12" title="New Password" type="password" id="password" />
        <x-input-form-component col="12" title="Confirm Password" type="password" id="password_confirmation" />
        <div class="d-flex col-12">
            <button type="submit" class="btn btn-dark ms-auto" id="btncreate">Save</button>
        </div>
    </div>
</form>
