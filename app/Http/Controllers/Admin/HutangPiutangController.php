<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Keuangan\HutangPiutangRequest;
use App\Models\HutangPiutang;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HutangPiutangController extends Controller
{
    public function index()
    {
        return view('admin.keuangan.hutang_piutang.index');
    }

    public function datatable(Request $request)
    {
        if($request->type == 'hutang' || $request->type == 'piutang') {
            $query = HutangPiutang::where('type', $request->type);
        } else if($request->type == 'all' || $request->type == null) {
            $query = HutangPiutang::query();
        } else {
            $query = HutangPiutang::query();
        }

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('type_badge', function ($row) {
                $badgeClass = $row->type == 'hutang' ? 'danger' : 'success';
                $label = $row->type == 'hutang' ? 'Hutang' : 'Piutang';
                return '<span class="badge bg-' . $badgeClass . '">' . $label . '</span>';
            })
            ->addColumn('status_badge', function ($row) {
                $badgeClass = $row->status == 'lunas' ? 'success' : 'warning';
                return '<span class="badge bg-' . $badgeClass . '">' . ucfirst($row->status) . '</span>';
            })
            ->addColumn('jumlah_format', function ($row) {
                return 'Rp ' . number_format($row->jumlah, 0, ',', '.');
            })
            ->addColumn('tanggal_format', function ($row) {
                return date('d-m-Y', strtotime($row->tanggal));
            })
            ->addColumn('tanggal_jatuh_tempo_format', function ($row) {
                return date('d-m-Y', strtotime($row->tanggal_jatuh_tempo));
            })
            ->addColumn('action', function ($row) {
                return view('admin.keuangan.hutang_piutang.action', compact('row'))->render();
            })
            ->rawColumns(['type_badge', 'status_badge', 'action'])
            ->make(true);
    }

    public function store(HutangPiutangRequest $request)
    {
        try {
            $datas = $request->validated();
            
            HutangPiutang::updateOrCreate(
                ['id' => $request->id],
                $datas
            );

            return response()->json(['status' => true, 'message' => 'Data berhasil disimpan']);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function edit(string $id)
    {
        try {
            $data = HutangPiutang::findOrFail($id);
            return response()->json([
                'data' => $data,
                'status' => true
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }
    }

    public function destroy(string $id)
    {
        try {
            $data = HutangPiutang::findOrFail($id);
            $data->delete();
            
            return response()->json(['status' => true, 'message' => 'Data berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()], 500);
        }
    }

    // Optional: Method untuk update status
    public function updateStatus(Request $request, string $id)
    {
        try {
            $request->validate([
                'status' => 'required|in:aktif,lunas'
            ]);

            $data = HutangPiutang::findOrFail($id);
            $data->update(['status' => $request->status]);

            return response()->json(['status' => true, 'message' => 'Status berhasil diupdate']);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()], 500);
        }
    }
}