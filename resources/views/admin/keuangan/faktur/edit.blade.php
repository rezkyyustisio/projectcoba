@push('js')
    <script>
        function edit(id) {
            $('#form')[0].reset();
            $('#items-container').empty();
            $('#logo-preview').empty();
            $('.modal-title').text('Edit Faktur');
            
            var url = "{{ route('admin.keuangan.faktur.edit', ':id') }}";
            url = url.replace(':id', id);
            
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'JSON',
                success: function (response) {
                    var data = response.data;
                    
                    $('#id').val(data.id);
                    $('#nomor_faktur').val(data.nomor_faktur);
                    $('#judul').val(data.judul);
                    $('#tanggal').val(data.tanggal);
                    $('#tanggal_jatuh_tempo').val(data.tanggal_jatuh_tempo);
                    $('#tipe_pembayaran').val(data.tipe_pembayaran);
                    $('#nama_perusahaan').val(data.nama_perusahaan);
                    $('#alamat_perusahaan').val(data.alamat_perusahaan);
                    $('#penerima_faktur').val(data.penerima_faktur);
                    $('#alamat_penerima').val(data.alamat_penerima);
                    
                    // Show logo preview if exists
                    if(data.logo_perusahaan) {
                        var logoHtml = '<span>Logo saat ini: <a href="{{ asset('storage/') }}/' + data.logo_perusahaan + '" target="_blank">Lihat Logo</a></span>';
                        $('#logo-preview').html(logoHtml);
                    }
                    
                    // Reset item index
                    itemIndex = 0;
                    
                    // Add items
                    if(data.items && data.items.length > 0) {
                        $.each(data.items, function(index, item) {
                            addItem({
                                nama_item: item.nama_item,
                                jumlah: item.jumlah,
                                nominal: item.nominal
                            });
                        });
                    } else {
                        addItem();
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