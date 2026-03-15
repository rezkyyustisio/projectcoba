<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Keuangan\AlurKeuanganRequest;
use App\Models\AlurKeuangan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class AlurKeuanganController extends Controller
{
    public function index()
    {
        return view('admin.keuangan.alur_keuangan.index');
    }

    public function datatable(Request $request)
    {
        $query = AlurKeuangan::query();

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return view('admin.keuangan.alur_keuangan.action', compact('row'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store(AlurKeuanganRequest $request)
    {
        try {
            $datas = $request->validated();
            
            // Handle file upload
            if ($request->hasFile('file')) {
                $datas['file'] = $request->file('file')->store('alur_keuangan', 'public');
            }
            
            AlurKeuangan::updateOrCreate(
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
            $data = AlurKeuangan::findOrFail($id);
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

    public function update(Request $request, string $id)
    {
        try {
            // Karena kita pakai updateOrCreate di store, method ini mungkin tidak dipakai
            // Tapi kalau mau dipisah, bisa pakai ini
            $request->validate([
                'nama_kegiatan' => 'required|string|max:250',
                'status' => 'required|in:pemasukan,pengeluaran',
                'nominal' => 'required|numeric',
                'tanggal_transaksi' => 'required|date',
                'status_pembayaran' => 'required|in:terbayar,belum_dibayar,ditunda',
                'deskripsi' => 'nullable|string',
                'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048'
            ]);

            $alurKeuangan = AlurKeuangan::findOrFail($id);
            $datas = $request->except('_token', '_method');
            
            if ($request->hasFile('file')) {
                // Hapus file lama
                if ($alurKeuangan->file) {
                    Storage::disk('public')->delete($alurKeuangan->file);
                }
                $datas['file'] = $request->file('file')->store('alur_keuangan', 'public');
            }
            
            $alurKeuangan->update($datas);

            return response()->json(['status' => true, 'message' => 'Data berhasil diupdate']);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $alurKeuangan = AlurKeuangan::findOrFail($id);
            
            // Hapus file jika ada
            if ($alurKeuangan->file) {
                Storage::disk('public')->delete($alurKeuangan->file);
            }
            
            $alurKeuangan->delete();
            
            return response()->json(['status' => true, 'message' => 'Data berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => $e->getMessage()], 500);
        }
    }


    public function show(string $id)
    {
        try {
            $data = AlurKeuangan::findOrFail($id);
            return response()->json([
                'data' => $data,
                'status' => true
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 200);
        }
    }
}
