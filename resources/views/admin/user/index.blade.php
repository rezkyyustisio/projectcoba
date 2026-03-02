<x-app-layout title="Data Master" subTitle="User">
    <x-card-component col="12" title="Data User">
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-dark waves-effect btn-label waves-light mb-4" onclick="create()"><i class="bx bx-plus label-icon"></i> Create</button>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th width="3%">#</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Description</th>
                        <th>Facebook</th>
                        <th>X / Twitter</th>
                        <th>Instagram</th>
                        <th>Telegram</th>
                        <th>LinkedIn</th>
                        <th width="10%" class="text-center">Action</th>
                    </tr>
                </thead>
            </table>
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

    @push('js')
        <script>
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.user.datatable') }}",
                columns: [
                    { data: 'DT_RowIndex', orderable: false, searchable: false, className: 'text-center' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'description', name: 'description' },
                    { data: 'facebook', name: 'facebook' },
                    { data: 'x', name: 'x' },
                    { data: 'instagram', name: 'instagram' },
                    { data: 'telegram', name: 'telegram' },
                    { data: 'linked_in', name: 'linked_in' },
                    { data: 'action', orderable: false, searchable: false, className: 'text-center' }
                ],
                order: [[1, 'asc']]
            });
        </script>
    @endpush
</x-app-layout>
