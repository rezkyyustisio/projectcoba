<x-app-layout title="Data Master" subTitle="User">
    <x-card-component col="12" title="Data User">
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-dark waves-effect btn-label waves-light mb-4" onclick="create()"><i class="bx bx-plus label-icon"></i> Create</button>
        </div>
    </x-card-component>

    @slot('modal')
        <x-modal-component id="modal-create" type="lg">
            <form id="form">
                <div class="row">
                    <input type="hidden" id="id" name="id">
                    <x-input-form-component col="6" title="Name" id="name" />
                    <x-input-form-component col="6" title="Email" id="email" />
                    <x-input-form-component col="6" title="Password" type="password" id="password" />
                    <x-input-form-component col="6" title="Confirm Password" type="password" id="password_confirmation" />
                    <x-input-form-component col="6" title="Description" id="description" mex="1000"/>
                    <x-input-form-component col="6" title="Facebook" type="url" id="facebook"/>
                    <x-input-form-component col="6" title="X / Twitter" type="url" id="x"/>
                    <x-input-form-component col="6" title="Instagram" type="url" id="instagram"/>
                    <x-input-form-component col="6" title="Telegram" type="url" id="telegram"/>
                    <x-input-form-component col="6" title="Linked In" type="url" id="linked_in"/>
                    <x-input-form-component col="6" title="Foto" type="file" id="image" />
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark" id="btncreate">Save</button>
                    </div>
                </div>
            </form>
        </x-modal-component>
    @endslot
    @include('admin.user.create')
    @include('admin.user.edit')
</x-app-layout>
