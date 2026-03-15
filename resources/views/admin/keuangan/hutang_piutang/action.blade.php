<div style="width: 100%; text-align: right;">
    @if($row->status == 'aktif')
    <button type="button"
        class="btn btn-success waves-effect btn-label waves-light btn-sm"
        onclick="updateStatus('{{ $row->id }}', 'lunas')">
        <i class="bx bx-check label-icon"></i> Lunas
    </button>
    @endif
    
    <button type="button"
        class="btn btn-secondary waves-effect btn-label waves-light btn-sm"
        onclick="edit('{{ $row->id }}')">
        <i class="bx bx-pencil label-icon"></i> Edit
    </button>

    <button type="button"
        class="btn btn-dark waves-effect btn-label waves-light btn-sm delete-item"
        data-tableid="table"
        data-action="Delete"
        data-url="{{ route('admin.keuangan.hutang-piutang.destroy', $row->id) }}">
        <i class="bx bx-trash label-icon"></i> Hapus
    </button>
</div>