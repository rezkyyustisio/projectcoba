<div style="width: 100%; text-align: right;">
    {{-- <button type="button"
        class="btn btn-info waves-effect btn-label waves-light btn-sm"
        onclick="previewFaktur('{{ $row->id }}')">
        <i class="bx bx-show label-icon"></i> Preview
    </button> --}}
    
    <button type="button"
        class="btn btn-secondary waves-effect btn-label waves-light btn-sm"
        onclick="edit('{{ $row->id }}')">
        <i class="bx bx-pencil label-icon"></i> Edit
    </button>

    <button type="button"
        class="btn btn-dark waves-effect btn-label waves-light btn-sm delete-item"
        data-tableid="table"
        data-action="Delete"
        data-url="{{ route('admin.keuangan.faktur.destroy', $row->id) }}">
        <i class="bx bx-trash label-icon"></i> Hapus
    </button>
</div>