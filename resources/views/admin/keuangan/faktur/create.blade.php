@push('js')
    <script>
        function create(){
            $('#modal-create').modal('show');
            $('.modal-title').text('Tambah Faktur');
            $('#id').val('');
            $('#form')[0].reset();
            $('#items-container').empty();
            $('#logo-preview').empty();
            $('#total-amount').text('Rp 0');
            itemIndex = 0;
            
            // Add first item by default
            addItem();
        }
        
        $("#form").submit(function(event) {
            event.preventDefault();
            $('#btncreate').text('Saving ...').attr('disabled', true);

            $.ajax({
                url: "{{ route('admin.keuangan.faktur.store') }}",
                type: 'POST', 
                dataType: 'JSON', 
                processData: false, 
                contentType: false, 
                cache: false, 
                data: new FormData(this),
                success: function (data) {
                    Swal.fire({ 
                        icon: 'success', 
                        title: 'Successfully',  
                        text: data.message, 
                        showConfirmButton: false, 
                        timer: 2000
                    });
                    $('#modal-create').modal('hide');
                    $('#btncreate').text('Save').attr('disabled', false);
                    $('#table').DataTable().ajax.reload(null, false);
                },
                error: function (data) {
                    var message = 'Terjadi kesalahan';
                    if(data.responseJSON && data.responseJSON.message) {
                        message = data.responseJSON.message;
                    } else if(data.responseJSON && data.responseJSON.errors) {
                        message = Object.values(data.responseJSON.errors).join(', ');
                    }
                    
                    Swal.fire({
                        icon: 'error', 
                        title: 'Error', 
                        text: message, 
                        showConfirmButton: true
                    });
                    $('#btncreate').text('Save').attr('disabled', false);
                },
            });
        });
    </script>
@endpush