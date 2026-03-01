@push('js')
    <script>
        function create(){
            $('#modal-create').modal('show');
            $('.modal-title').text('Create Berita');
            $('#id').val(null);
            $('.select2').val(null).change();
            $('#form')[0].reset();
            $('#tag-container').empty();
        }

        $("#form").submit(function(event) {
            event.preventDefault();
            tinymce.triggerSave();
            $('#btncreate').text('Saving ...').attr('disabled', true);

            var tags = [];
            $('#tag-container .tag').each(function() {
                tags.push($(this).text().trim());
            });

            $('#tags').val(tags.join(','));

            console.log(tags);
            $.ajax({
                url: "{{ route('admin.berita.berita.store') }}",
                type: 'POST',
                dataType: 'JSON',
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function (data) {
                    Swal.fire({ icon: 'success', title: 'Successfully',  text: "Data Saved Successfully", showConfirmButton: false, timer: 2000});
                    $('#modal-create').modal('hide');
                    $('#btncreate').text('Save').attr('disabled', false);
                    $('#table').DataTable().ajax.reload(null, false);
                },
                error: function (data) {
                    Swal.fire({icon: 'error', title: data.responseJSON.message, showConfirmButton: true});
                    $('#btncreate').text('Save').attr('disabled', false);
                },
            });
        });
    </script>
@endpush
