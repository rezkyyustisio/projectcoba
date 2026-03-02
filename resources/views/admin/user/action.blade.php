<button type="button"
    class="btn btn-dark btn-sm"
    onclick="edit('{{ $row->id }}')">
    Edit
</button>

<button type="button"
    class="btn btn-danger btn-sm delete-item"
    data-tableid="table"
    data-url="{{ route('admin.user.destroy', $row->id) }}">
    Delete
</button>