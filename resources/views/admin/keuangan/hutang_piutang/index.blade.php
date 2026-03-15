<x-app-layout title="Keuangan" subTitle="Hutang Piutang">
    <x-card-component col="12" title="Data Hutang & Piutang">
        <div class="d-flex justify-content-end gap-2">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bx bx-filter"></i> Filter
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item filter-type" data-type="all" href="#">Semua</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item filter-type" data-type="hutang" href="#">Hutang</a></li>
                    <li><a class="dropdown-item filter-type" data-type="piutang" href="#">Piutang</a></li>
                </ul>
            </div>
            <button type="button" class="btn btn-dark waves-effect btn-label waves-light mb-2" onclick="create()">
                <i class="bx bx-plus label-icon"></i> Tambah
            </button>
        </div>
        
        <div class="table-responsive">
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th width="1%">#</th>
                        <th>Tipe</th>
                        <th>Nama</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Jatuh Tempo</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th width="10%" class="text-center">Aksi</th>
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
                    
                    <div class="col-md-6 mb-3">
                        <label for="type" class="form-label">Tipe <span class="text-danger">*</span></label>
                        <select class="form-select" id="type" name="type" required>
                            <option value="">Pilih Tipe</option>
                            <option value="hutang">Hutang</option>
                            <option value="piutang">Piutang</option>
                        </select>
                    </div>
                    
                    <x-input-form-component col="6" title="Nama" id="nama" required="true" />
                    
                    <x-input-form-component col="6" title="Jumlah" id="jumlah" type="number" required="true" />
                    
                    <x-input-form-component col="6" title="Tanggal" id="tanggal" type="date" required="true" />
                    
                    <x-input-form-component col="6" title="Tanggal Jatuh Tempo" id="tanggal_jatuh_tempo" type="date" required="true" />
                    
                    <div class="col-md-12 mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select" id="status_aktif" name="status" required>
                            <option value="">Pilih Status</option>
                            <option value="aktif">Aktif</option>
                            <option value="lunas">Lunas</option>
                        </select>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark" id="btncreate">Save</button>
                    </div>
                </div>
            </form>
        </x-modal-component>
    @endslot

    @include('admin.keuangan.hutang_piutang.create')
    @include('admin.keuangan.hutang_piutang.edit')

    @push('js')
    <script>
        var table;
        var filter = {
            jenis: null
        }

        $(function () {
            
            table = $('#table').DataTable({
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
                    }
                },
                ajax: {
                    url: "{{ route('admin.keuangan.hutang-piutang.datatable') }}",
                    data: function(d) {
                        d.type = filter.jenis;
                    }
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, className: 'text-center' },
                    { data: 'type_badge', name: 'type', orderable: true, searchable: true },
                    { data: 'nama', name: 'nama' },
                    { data: 'jumlah_format', name: 'jumlah' },
                    { data: 'tanggal_format', name: 'tanggal' },
                    { data: 'tanggal_jatuh_tempo_format', name: 'tanggal_jatuh_tempo' },
                    { data: 'deskripsi', name: 'deskripsi', render: function(data) { return data ? data.substring(0, 50) + '...' : '-'; } },
                    { data: 'status_badge', name: 'status' },
                    { data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center' }
                ],
                order: [[4, 'desc']]
            });
            
            // Filter
            $('.filter-type').click(function(e) {
                e.preventDefault();
                var type = $(this).data('type');
                $('#filter-type').val(type);
                filter.jenis = type;
                table.ajax.reload();
            });
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
            .bg-danger {
                background-color: #dc3545 !important;
            }
            .bg-success {
                background-color: #28a745 !important;
            }
            .bg-warning {
                background-color: #ffc107 !important;
                color: #000 !important;
            }
        </style>
    @endpush
</x-app-layout>