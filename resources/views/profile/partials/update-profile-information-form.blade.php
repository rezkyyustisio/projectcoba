<form id="form" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="row">
        <input type="hidden" name="id" value="{{ auth()->user()->id }}">
        <x-input-form-component col="6" title="Nama Anda" id="name" value="{{ auth()->user()->name }}" />
        <x-input-form-component col="6" title="Email" id="email" value="{{ auth()->user()->email }}" />
        <x-input-form-component col="6" title="Foto Profil" type="file" id="image" />
        <div class="d-flex col-12">
            <button type="submit" class="btn btn-dark ms-auto" id="btncreate">Save</button>
        </div>
    </div>
</form>
