<button type="button"
    class="btn btn-secondary btn-sm"
    onclick="edit('{{ $row->id }}')">
    Edit
</button>

<button type="button"
    class="btn btn-dark btn-sm delete-item"
    data-tableid="table"
    data-url="{{ route('admin.berita.berita.destroy', $row->id) }}">
    Hapus
</button>