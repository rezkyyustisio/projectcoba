@push('js')
    <script>
        function edit(id) {
            $('#form')[0].reset();
            $('.modal-title').text('Edit User');
            var url = "{{ route('admin.user.edit',":id") }}";
            url     = url.replace(':id', id);
            $.get(url, function (data) {
                $('#id').val(data.data.id);
                $('#name').val(data.data.name);
                $('#email').val(data.data.email);
                $('#description').val(data.data.description);
                $('#facebook').val(data.data.facebook);
                $('#x').val(data.data.x);
                $('#instagram').val(data.data.instagram);
                $('#telegram').val(data.data.telegram);
                $('#linked_in').val(data.data.linked_in);
                $('#modal-create').modal('show');
            });
        }
    </script>
@endpush
