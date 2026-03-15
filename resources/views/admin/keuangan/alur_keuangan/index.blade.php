<x-app-layout title="Keuangan" subTitle="Alur Keuangan">
    <x-card-component col="12" title="Data Alur Keuangan">
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-dark waves-effect btn-label waves-light mb-2" onclick="create()"><i class="bx bx-plus label-icon"></i> Tambah</button>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th width="1%">#</th>
                        <th>Nama Kegiatan</th>
                        <th>Status</th>
                        <th>Nominal</th>
                        <th>Tanggal Transaksi</th>
                        <th>Deskripsi</th>
                        <th>File</th>
                        <th>Status Pembayaran</th>
                        <th width="10%" class="text-center">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </x-card-component>

    @slot('modal')
        <x-modal-component id="modal-create" type="lg">
            <form id="form" enctype="multipart/form-data">
                <div class="row">
                    <input type="hidden" id="id" name="id">
                    
                    <x-input-form-component col="12" title="Nama Kegiatan" id="nama_kegiatan" required="true" />
                    
                    <div class="col-md-6 mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select class="form-select" id="status_masuk_keluar" name="status" required>
                            <option value="">Pilih Status</option>
                            <option value="pemasukan">Pemasukan</option>
                            <option value="pengeluaran">Pengeluaran</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="status_pembayaran" class="form-label">Status Pembayaran <span class="text-danger">*</span></label>
                        <select class="form-select" id="status_pembayaran" name="status_pembayaran" required>
                            <option value="">Pilih Status Pembayaran</option>
                            <option value="terbayar">Terbayar</option>
                            <option value="belum_dibayar">Belum Dibayar</option>
                            <option value="ditunda">Ditunda</option>
                        </select>
                    </div>
                    
                    <x-input-form-component col="6" title="Nominal" id="nominal" type="number" required="true" />
                    
                    <x-input-form-component col="6" title="Tanggal Transaksi" id="tanggal_transaksi" type="date" required="true" />
                    
                    <div class="col-md-12 mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="file" class="form-label">File</label>
                        <input type="file" class="form-control" id="file" name="file">
                        <div id="file-preview" class="mt-2"></div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark" id="btncreate">Save</button>
                    </div>
                </div>
            </form>
        </x-modal-component>
    @endslot

    @include('admin.keuangan.alur_keuangan.create')
    @include('admin.keuangan.alur_keuangan.edit')

    @push('js')
    <script>
        $(function () {
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
                ajax: "{{ route('admin.keuangan.alur-keuangan.datatable') }}",
                columns: [
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                    {
                        data: 'nama_kegiatan',
                        name: 'nama_kegiatan'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'nominal',
                        name: 'nominal',
                        render: function(data) {
                            return 'Rp ' + new Intl.NumberFormat('id-ID').format(data);
                        }
                    },
                    {
                        data: 'tanggal_transaksi',
                        name: 'tanggal_transaksi',
                        render: function(data) {
                            return moment(data).format('DD-MM-YYYY');
                        }
                    },
                    {
                        data: 'deskripsi',
                        name: 'deskripsi',
                        render: function(data) {
                            return data ? data.substring(0, 50) + '...' : '-';
                        }
                    },
                    {
                        data: 'file',
                        name: 'file',
                        render: function(data) {
                            if(data) {
                                return '<a href="{{ asset('storage/') }}/' + data + '" target="_blank" class="btn btn-sm btn-info">Lihat File</a>';
                            }
                            return '-';
                        }
                    },
                    {
                        data: 'status_pembayaran',
                        name: 'status_pembayaran',
                        render: function(data) {
                            var badgeClass = {
                                'terbayar': 'success',
                                'belum_dibayar': 'warning',
                                'ditunda': 'danger'
                            }[data] || 'secondary';
                            
                            return '<span class="badge bg-' + badgeClass + '">' + data + '</span>';
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    }
                ],
                order: [[4, 'desc']] // Sort by tanggal_transaksi descending
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
            
            .bg-success {
                background-color: #28a745 !important;
            }
            
            .bg-warning {
                background-color: #ffc107 !important;
                color: #000 !important;
            }
            
            .bg-danger {
                background-color: #dc3545 !important;
            }
        </style>
    @endpush
</x-app-layout>