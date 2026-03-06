<div style="width: 100%; text-align: right;">
<button type="button"
    class="btn btn-secondary waves-effect btn-label waves-light"
    onclick="edit('{{ $row->id }}')">
    <i class="bx bx-pencil label-icon"></i> Edit
</button>

<button type="button"
    class="btn btn-dark waves-effect btn-label waves-light delete-item"
    data-tableid="table"
    data-action="Delete"
    data-url="{{ route('admin.berita.category.destroy', $row->id) }}">
    <i class="bx bx-trash label-icon"></i> Hapus
</button>
</div>