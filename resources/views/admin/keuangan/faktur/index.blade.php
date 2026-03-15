<x-app-layout title="Keuangan" subTitle="Faktur">
    <x-card-component col="12" title="Data Faktur">
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-dark waves-effect btn-label waves-light mb-2" onclick="create()">
                <i class="bx bx-plus label-icon"></i> Tambah Faktur
            </button>
        </div>
        
        <div class="table-responsive">
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th width="1%">#</th>
                        <th>Nomor Faktur</th>
                        <th>Judul</th>
                        <th>Penerima</th>
                        <th>Tanggal</th>
                        <th>Jatuh Tempo</th>
                        <th>Total</th>
                        <th>Item</th>
                        <th>Status</th>
                        <th width="10%" class="text-center">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </x-card-component>

    @slot('modal')
        <x-modal-component id="modal-create" type="xl">
            <form id="form" enctype="multipart/form-data">
                <div class="row">
                    <input type="hidden" id="id" name="id">
                    
                    <div class="col-md-12">
                        <h5 class="mb-3">Informasi Faktur</h5>
                    </div>
                    
                    <x-input-form-component col="6" title="Nomor Faktur (Kosongkan untuk auto)" id="nomor_faktur" />
                    <x-input-form-component col="6" title="Judul Faktur" id="judul" required="true" />
                    
                    <x-input-form-component col="6" title="Tanggal" id="tanggal" type="date" required="true" />
                    <x-input-form-component col="6" title="Tanggal Jatuh Tempo" id="tanggal_jatuh_tempo" type="date" required="true" />
                    
                    <x-input-form-component col="6" title="Tipe Pembayaran" id="tipe_pembayaran" required="true" />
                    
                    <div class="col-md-12">
                        <h5 class="mb-3 mt-3">Informasi Perusahaan</h5>
                    </div>
                    
                    <x-input-form-component col="6" title="Nama Perusahaan" id="nama_perusahaan" required="true" />
                    
                    <div class="col-md-6 mb-3">
                        <label for="logo_perusahaan" class="form-label">Logo Perusahaan</label>
                        <input type="file" class="form-control" id="logo_perusahaan" name="logo_perusahaan" accept="image/*">
                        <div id="logo-preview" class="mt-2"></div>
                    </div>
                    
                    <div class="col-md-12 mb-3">
                        <label for="alamat_perusahaan" class="form-label">Alamat Perusahaan <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="alamat_perusahaan" name="alamat_perusahaan" rows="3" required></textarea>
                    </div>
                    
                    <div class="col-md-12">
                        <h5 class="mb-3 mt-3">Informasi Penerima</h5>
                    </div>
                    
                    <x-input-form-component col="6" title="Penerima Faktur" id="penerima_faktur" required="true" />
                    
                    <div class="col-md-12 mb-3">
                        <label for="alamat_penerima" class="form-label">Alamat Penerima <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="alamat_penerima" name="alamat_penerima" rows="3" required></textarea>
                    </div>
                    
                    <div class="col-md-12">
                        <h5 class="mb-3 mt-3">Item Faktur</h5>
                    </div>
                    
                    <div class="col-md-12">
                        <div id="items-container">
                            <!-- Items akan ditambahkan via JavaScript -->
                        </div>
                        
                        <button type="button" class="btn btn-success btn-sm mb-3" onclick="addItem()">
                            <i class="bx bx-plus"></i> Tambah Item
                        </button>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="alert alert-info">
                            <strong>Total: </strong> <span id="total-amount">Rp 0</span>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark" id="btncreate">Save</button>
                    </div>
                </div>
            </form>
        </x-modal-component>
    @endslot

    @include('admin.keuangan.faktur.create')
    @include('admin.keuangan.faktur.edit')

    @push('js')
    <script>
        var itemIndex = 0;
        var table;
        
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
                ajax: "{{ route('admin.keuangan.faktur.datatable') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, className: 'text-center' },
                    { data: 'nomor_faktur', name: 'nomor_faktur' },
                    { data: 'judul', name: 'judul' },
                    { data: 'penerima_faktur', name: 'penerima_faktur' },
                    { data: 'tanggal_format', name: 'tanggal' },
                    { data: 'tanggal_jatuh_tempo_format', name: 'tanggal_jatuh_tempo' },
                    { data: 'total', name: 'total' },
                    { data: 'jumlah_item', name: 'jumlah_item' },
                    { data: 'status', name: 'status' },
                    { data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center' }
                ],
                order: [[4, 'desc']]
            });
        });

        function addItem(data = null) {
            var html = `
                <div class="row item-row mb-2" id="item-${itemIndex}">
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="items[${itemIndex}][nama_item]" placeholder="Nama Item" value="${data ? data.nama_item : ''}" required>
                    </div>
                    <div class="col-md-2">
                        <input type="number" class="form-control item-jumlah" name="items[${itemIndex}][jumlah]" placeholder="Jumlah" value="${data ? data.jumlah : ''}" min="1" required onkeyup="calculateSubtotal(${itemIndex})" onchange="calculateSubtotal(${itemIndex})">
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control item-nominal" name="items[${itemIndex}][nominal]" placeholder="Nominal" value="${data ? data.nominal : ''}" min="0" required onkeyup="calculateSubtotal(${itemIndex})" onchange="calculateSubtotal(${itemIndex})">
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control item-subtotal" id="subtotal-${itemIndex}" placeholder="Subtotal" readonly>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger btn-sm" onclick="removeItem(${itemIndex})">
                            <i class="bx bx-minus"></i>
                        </button>
                    </div>
                </div>
            `;
            
            $('#items-container').append(html);
            
            if (data) {
                calculateSubtotal(itemIndex);
            }
            
            itemIndex++;
            calculateTotal();
        }

        function removeItem(index) {
            $('#item-' + index).remove();
            calculateTotal();
        }

        function calculateSubtotal(index) {
            var jumlah = $('#item-' + index + ' .item-jumlah').val() || 0;
            var nominal = $('#item-' + index + ' .item-nominal').val() || 0;
            var subtotal = jumlah * nominal;
            
            $('#subtotal-' + index).val(formatRupiah(subtotal));
            calculateTotal();
        }

        function calculateTotal() {
            var total = 0;
            $('.item-subtotal').each(function() {
                var value = $(this).val().replace(/[^0-9]/g, '');
                total += parseInt(value) || 0;
            });
            $('#total-amount').text(formatRupiah(total));
        }

        function formatRupiah(angka) {
            return 'Rp ' + angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function previewFaktur(id) {
            // Bisa diarahkan ke halaman preview atau modal preview
            window.open("{{ url('admin/keuangan/faktur') }}/" + id + "/preview", "_blank");
        }
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
            .bg-danger {
                background-color: #dc3545 !important;
            }
        </style>
    @endpush
</x-app-layout>