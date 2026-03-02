<x-app-layout title="Berita" subTitle="Berita">
    <x-card-component col="12" title="Data Berita">
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-dark waves-effect btn-label waves-light mb-2" onclick="create()"><i class="bx bx-plus label-icon"></i> Create</button>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th width="3%">#</th>
                        <th>Time</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Tags</th>
                        <th>Top</th>
                        <th>Highlight</th>
                        <th>Created By</th>
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
                    <x-input-form-component col="6" title="Category" type="drop-down" id="category_id" :options="$categories" />
                    <x-input-form-component col="6" title="Name" id="name"/>
                    <x-input-form-component col="6" title="Top" type="choose" id="top">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </x-input-form-component>
                    <x-input-form-component col="6" title="Highlight" type="choose" id="highlight">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </x-input-form-component>
                    <x-input-form-component col="6" title="Image" type="file" id="image"/>
                    <x-input-form-component col="6" title="Time" type="datetime-local" id="created_at" />
                    <div class="col-md-6">
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">Tag <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="tag-input" class="form-control" />
                            </div>
                            <button class="btn btn-dark col-md-2" type="button" id="add-tag-btn">+</button>
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-10 mb-2 mt-0" id="tag-container"></div>
                    <input type="hidden" id="tags" name="tags">
                    <x-input-form-component col="12" title="Description" type="text-editor" id="description" />

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark" id="btncreate">Save</button>
                    </div>
                </div>
            </form>
        </x-modal-component>
    @endslot
    @include('admin.berita.berita.create')
    @include('admin.berita.berita.edit')

    @push('css')
        <style>
            #tag-container {
                display: flex;
                flex-wrap: wrap;
            }

            #tag-container .tag {
                padding: 5px 10px;
                border-radius: 15px;
                margin: 5px;
                display: flex;
                align-items: center;
            }

            #tag-container .tag .remove-tag {
                margin-left: 5px;
                cursor: pointer;
                font-size: 16px;
                color: red;
            }
        </style>
    @endpush
    @push('js')
        <script>
            $(document).ready(function() {
                $('#add-tag-btn').on('click', function() {
                    var tagValue = $('#tag-input').val().trim();

                    if (tagValue) {
                        $('#tag-container').append('<div class="tag bg-primary bg-soft text-primary">' + tagValue + '<span class="remove-tag"><i class="fas fa-times"></i></span></div>');                        $('#tag-input').val('');
                    }
                });

                $(document).on('click', '.remove-tag', function() {
                    $(this).parent().remove();
                });


                $('#table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('admin.berita.berita.datatable') }}",
                    columns: [
                        { data: 'DT_RowIndex', orderable: false, searchable: false, className: 'text-center' },
                        { data: 'created_at', name: 'created_at' },
                        { data: 'category_name', name: 'category_name' },
                        { data: 'name', name: 'name' },
                        { data: 'description', name: 'description' },
                        { data: 'tags', orderable: false, searchable: false },
                        { data: 'top', name: 'top', className: 'text-center' },
                        { data: 'highlight', name: 'highlight', className: 'text-center' },
                        { data: 'createdBy_name', name: 'createdBy_name' },
                        { data: 'action', orderable: false, searchable: false, className: 'text-center' }
                    ],
                    order: [[1, 'desc']]
                });
            });
        </script>
        
    @endpush
</x-app-layout>
