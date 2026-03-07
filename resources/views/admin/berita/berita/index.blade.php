<x-app-layout title="Berita" subTitle="Berita">
    <x-card-component col="12" title="Data Berita">
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-dark waves-effect btn-label waves-light mb-2" onclick="create()"><i class="bx bx-plus label-icon"></i> Tambah</button>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th width="3%">#</th>
                        <th width="30%">Judul Berita</th>
                        <th width="9%">Kategori</th>
                        <th width="11%">Tanggal Publish</th>
                        {{-- <th>Description</th> --}}
                        {{-- <th>Tags</th> --}}
                        {{-- <th>Top</th>
                        <th>Sorotan</th> --}}
                        <th width="10%">Penulis</th>
                        <th width="15%" class="text-center">Aksi</th>
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
                    <input type="hidden" id="foto_lama" name="foto_lama">
                    <x-input-form-component col="12" autocomplete="off" title="Judul Berita" id="name"/>
                    <x-input-form-component col="6" title="Kategori" type="drop-down" id="category_id" :options="$categories" />
                    {{-- <x-input-form-component col="6" title="Top" type="choose" id="top">
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                    </x-input-form-component>
                    <x-input-form-component col="6" title="Highlight" type="choose" id="highlight">
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                    </x-input-form-component> --}}
                    <x-input-form-component col="6" title="Gambar Depan" type="file" id="image" onchange="preview_foto(this)"/>
                    <x-input-form-component col="6" title="Tanggal Publish" type="datetime-local" id="created_at" />
                    <div class="col-md-6">
                        <label for="">Preview Gambar Depan</label> <br>
                        <img id="fotoPreview" alt="Foto Berita" width="150px">
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 row">
                            <label class="col-md-4 col-form-label">Tag <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="text" autocomplete="off" id="tag-input" class="form-control" />
                            </div>
                            <button class="btn btn-dark col-md-2" type="button" id="add-tag-btn">+</button>
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-10 mb-2 mt-0" id="tag-container"></div>
                    <input type="hidden" id="tags" name="tags">
                    <x-input-form-component col="12" title="Deskripsi" type="text-editor" id="description" />

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-dark" id="btncreate">Simpan</button>
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
                    language: {
                        "lengthMenu": "Tampilkan _MENU_ data per halaman",
                        "zeroRecords": "Data tidak ditemukan",
                        "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                        "infoEmpty": "Data tidak tersedia",
                        "infoFiltered": "(difilter dari _MAX_ total data)",
                        "search": "Cari:",
                        "paginate": {
                            "first": "Pertama",
                            "last": "Terakhir",
                            "next": "Selanjutnya",
                            "previous": "Sebelumnya"
                        },
                        "aria": {
                            "sortAscending": ": aktifkan untuk mengurutkan kolom ascending",
                            "sortDescending": ": aktifkan untuk mengurutkan kolom descending"
                        }
                    },
                    ajax: "{{ route('admin.berita.berita.datatable') }}",
                    columns: [
                        { data: 'DT_RowIndex', orderable: false, searchable: false, className: 'text-center' },
                        { data: 'name', name: 'name' },
                        { data: 'category_name', name: 'category_name' },
                        { data: 'created_at', name: 'created_at' },
                        // { data: 'description', name: 'description' },
                        // { data: 'tags', orderable: false, searchable: false },
                        // { data: 'top', name: 'top', className: 'text-center' },
                        // { data: 'highlight', name: 'highlight', className: 'text-center' },
                        { data: 'createdBy_name', name: 'createdBy_name' },
                        { data: 'action', orderable: false, searchable: false, className: 'text-center' }
                    ],
                    order: [[1, 'desc']]
                });
            });

            $('#modal-create #highlight').select2({
                placeholder: "Pilih Highlight",
                dropdownParent: $('#modal-create')
            });

            $('#modal-create #top').select2({
                placeholder: "Pilih Top",
                dropdownParent: $('#modal-create')
            });
        </script>
        
    @endpush

    @push('css')
        <style>
            .btn-secondary {
                background-color: #34383a !important;
            }

            .btn-secondary:hover {
                background-color: #37393a !important;
            }

            .btn-dark {
                background-color: #111213 !important;
            }

            .btn-dark:hover {
                background-color: #212325 !important;
            }
        </style>
    @endpush
</x-app-layout>
