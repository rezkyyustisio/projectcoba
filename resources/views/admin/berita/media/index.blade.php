<x-app-layout title="Media" subTitle="Media">
    <x-card-component col="12" title="Data Media">
        <div class="table-responsive">
            <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th width="1%">No</th>
                        <th width="10%">Foto</th>
                        <th width="5%">Berita</th>
                    </tr>
                </thead>
            </table>
        </div>
    </x-card-component>

    @push('js')
        <script>
            $(function () {
                 // Inisialisasi DataTables
                var table = $('#table').DataTable({
                    processing: true,
                    serverSide: true,
                    language: {
                        // language settings Anda
                    },
                    ajax: "{{ route('admin.berita.menu.datatable') }}",
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
                    columns: [
                        {
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false,
                            className: 'text-center index-col'
                        },
                        {
                            data: 'file',
                            name: 'file',
                        },
                        {
                            data: 'deskripsi',
                            name: 'deskripsi'
                        },
                    ],
                    order: [[1, 'asc']],
                     // Callback setelah table digambar
                    drawCallback: function() {
                        $('#table').addClass('gallery-view');
                    }
                });
                
                // Table View
                $('#tableViewBtn').click(function() {
                    $('#table').removeClass('gallery-view');
                    $('#table').addClass('table-view');
                    $(this).removeClass('btn-secondary').addClass('btn-primary');
                    $('#galleryViewBtn').removeClass('btn-primary').addClass('btn-secondary');
                    
                    // Reset ke tampilan table normal
                    $('#table').DataTable().draw();
                });
                
                // Gallery View
                $('#galleryViewBtn').click(function() {
                    $('#table').removeClass('table-view');
                    $('#table').addClass('gallery-view');
                    $(this).removeClass('btn-secondary').addClass('btn-primary');
                    $('#tableViewBtn').removeClass('btn-primary').addClass('btn-secondary');
                    
                    // Redraw dengan tampilan galeri
                    $('#table').DataTable().draw();
                });

                $('<style>')
                    .prop('type', 'text/css')
                    .html(`
                        /* Gallery View Styles */
                        .gallery-view thead {
                            display: none;
                        }
                        
                        .gallery-view tbody {
                            display: grid;
                            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                            gap: 20px;
                            padding: 15px 0;
                        }
                        
                        .gallery-view tbody tr {
                            display: block !important;
                            border: 1px solid #e0e0e0;
                            border-radius: 10px;
                            overflow: hidden;
                            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                            background: white;
                            width: 100% !important;
                        }
                        
                        .gallery-view tbody tr:hover {
                            transform: translateY(-5px);
                            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
                        }
                        
                        /* Style kolom gambar */
                        .gallery-view tbody tr td:nth-child(2) {
                            display: block;
                            padding: 0;
                            width: 100%;
                            height: 200px;
                            overflow: hidden;
                        }
                        
                        .gallery-view tbody tr td:nth-child(2) img {
                            width: 100%;
                            height: 100%;
                            object-fit: cover;
                            transition: transform 0.3s ease;
                        }
                        
                        .gallery-view tbody tr:hover td:nth-child(2) img {
                            transform: scale(1.1);
                        }
                        
                        /* Style kolom deskripsi */
                        .gallery-view tbody tr td:nth-child(3) {
                            display: block;
                            padding: 15px;
                            text-align: center;
                            border: none;
                            background: white;
                        }
                        
                        /* Style kolom index (nomor) - opsional, bisa disembunyikan */
                        .gallery-view tbody tr td:first-child {
                            display: none;
                        }
                        
                        /* Responsive */
                        @media (max-width: 768px) {
                            .gallery-view tbody {
                                grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
                                gap: 15px;
                            }
                            
                            .gallery-view tbody tr td:nth-child(2) {
                                height: 160px;
                            }
                        }
                    `)
                    .appendTo('head');
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
