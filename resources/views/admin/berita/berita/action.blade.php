<button type="button" class="btn btn-dark waves-effect waves-light" onclick="showImage('{{ $image }}','Image')"><i class="bx bx-image font-size-16 align-middle"></i></button>
<button type="button" class="btn btn-dark waves-effect btn-label waves-light" onclick="edit('{{ $id }}')"><i class="bx bx-pencil label-icon"></i> Edit</button>
<button type="button" class="btn btn-dark waves-effect btn-label waves-light delete-item" data-tableid="table" data-action="Delete" data-url="{{ route('admin.berita.berita.destroy', $id) }}"><i class="bx bx-trash label-icon"></i> Delete</button>
