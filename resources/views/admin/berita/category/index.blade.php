<x-app-layout title="Berita" subTitle="Category">
    <x-card-component col="12" title="Data Category">
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-dark waves-effect btn-label waves-light mb-2" onclick="create()"><i class="bx bx-plus label-icon"></i> Create</button>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th>Name</th>
                        <th width="15%" class="text-center">Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </x-card-component>

    @slot('modal')
        <x-modal-component id="modal-create" type="md">
            <form id="form">
                <div class="row">
                    <input type="hidden" id="id" name="id">
                    <x-input-form-component col="12" title="Name" id="name" />
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark" id="btncreate">Save</button>
                    </div>
                </div>
            </form>
        </x-modal-component>
    @endslot
    @include('admin.berita.category.create')
    @include('admin.berita.category.edit')

    @push('js')
    <script>
        $(function () {
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.berita.category.datatable') }}",
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    }
                ],
                order: [[1, 'asc']]
            });
        });
    </script>
    @endpush
</x-app-layout>
