@push('js')
    <script>
        function edit(id) {
            $('#form')[0].reset();
            $('.modal-title').text('Edit Hutang/Piutang');
            
            var url = "{{ route('admin.keuangan.hutang-piutang.edit', ':id') }}";
            url = url.replace(':id', id);
            
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'JSON',
                success: function (data) {
                    $('#id').val(data.data.id);
                    $('#type').val(data.data.type);
                    $('#nama').val(data.data.nama);
                    $('#jumlah').val(data.data.jumlah);
                    
                    // Format tanggal
                    if(data.data.tanggal) {
                        $('#tanggal').val(data.data.tanggal.substring(0, 10));
                    }
                    if(data.data.tanggal_jatuh_tempo) {
                        $('#tanggal_jatuh_tempo').val(data.data.tanggal_jatuh_tempo.substring(0, 10));
                    }
                    
                    $('#deskripsi').val(data.data.deskripsi);
                    $('#status_aktif').val(data.data.status);
                    
                    $('#modal-create').modal('show');
                },
                error: function (data) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Gagal mengambil data',
                        showConfirmButton: true
                    });
                }
            });
        }

        function updateStatus(id, status) {
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Ubah status menjadi ' + status + '?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, ubah!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.keuangan.hutang-piutang.update-status', ':id') }}".replace(':id', id),
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            status: status
                        },
                        success: function(data) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            });
                            $('#table').DataTable().ajax.reload(null, false);
                        },
                        error: function(data) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Gagal mengupdate status',
                                showConfirmButton: true
                            });
                        }
                    });
                }
            });
        }
    </script>
@endpush