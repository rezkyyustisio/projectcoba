@push('js')
    <script>
        function edit(id) {
            $('#form')[0].reset();
            $('#file-preview').empty();
            $('.modal-title').text('Edit Alur Keuangan');
            
            var url = "{{ route('admin.keuangan.alur-keuangan.edit', ':id') }}";
            url = url.replace(':id', id);
            
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'JSON',
                success: function (data) {
                    $('#id').val(data.data.id);
                    $('#nama_kegiatan').val(data.data.nama_kegiatan);
                    $('#status_masuk_keluar').val(data.data.status);
                    $('#nominal').val(data.data.nominal);
                    $('#tanggal_transaksi').val(data.data.tanggal_transaksi);
                    $('#deskripsi').val(data.data.deskripsi);
                    $('#status_pembayaran').val(data.data.status_pembayaran);
                    
                    // Tampilkan preview file jika ada
                    if(data.data.file) {
                        var fileHtml = '<span>File saat ini: <a href="{{ asset('storage/') }}/' + data.data.file + '" target="_blank">' + data.data.file + '</a></span>';
                        $('#file-preview').html(fileHtml);
                    }
                    
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
    </script>
@endpush