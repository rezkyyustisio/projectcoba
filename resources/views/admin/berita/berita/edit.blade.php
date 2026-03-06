@push('js')
    <script>
        function edit(id) {
            $('#form')[0].reset();
            $('.modal-title').text('Edit Berita');
            var url = "{{ route('admin.berita.berita.edit', ':id') }}";
            url = url.replace(':id', id);

            $.get(url, function(data) {
                $('#id').val(data.data.id);
                $('#category_id').val(data.data.category_id);
                $('#name').val(data.data.name);
                $('#top').val(data.data.top);
                $('#highlight').val(data.data.highlight);
                tinymce.get('description').setContent(data.data.description);
                $('#created_at').val(data.created_at);
                $('#tag-container').empty();
                if (Array.isArray(data.tags) && data.tags.length > 0) {
                    data.tags.forEach(function(tag) {
                        $('#tag-container').append('<div class="tag bg-primary bg-soft text-primary">' + tag + '<span class="remove-tag"><i class="fas fa-times"></i></span></div>');
                    });
                }

                let url_image = "{{ asset('storage/') }}/" + data.data.image;
                $('#modal-create #fotoPreview').attr('src', url_image);
                $('#modal-create').modal('show');
            });
        }
    </script>
@endpush
