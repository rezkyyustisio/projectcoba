<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Keuangan\FakturRequest;
use App\Models\Faktur;
use App\Models\FakturItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class FakturController extends Controller
{
    public function index()
    {
        return view('admin.keuangan.faktur.index');
    }

    public function datatable(Request $request)
    {
        $query = Faktur::with('items')->orderBy('created_at', 'desc');

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('total', function ($row) {
                return $row->total_format;
            })
            ->addColumn('jumlah_item', function ($row) {
                return $row->items->count() . ' item';
            })
            ->addColumn('tanggal_format', function ($row) {
                return date('d-m-Y', strtotime($row->tanggal));
            })
            ->addColumn('tanggal_jatuh_tempo_format', function ($row) {
                return date('d-m-Y', strtotime($row->tanggal_jatuh_tempo));
            })
            ->addColumn('status', function ($row) {
                $today = date('Y-m-d');
                if ($row->tanggal_jatuh_tempo < $today) {
                    return '<span class="badge bg-danger">Jatuh Tempo</span>';
                }
                return '<span class="badge bg-success">Aktif</span>';
            })
            ->addColumn('action', function ($row) {
                return view('admin.keuangan.faktur.action', compact('row'))->render();
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    public function store(FakturRequest $request)
    {
        try {
            DB::beginTransaction();

            $datas = $request->except(['items', 'logo_perusahaan']);
            
            // Handle upload logo
            if ($request->hasFile('logo_perusahaan')) {
                $datas['logo_perusahaan'] = $request->file('logo_perusahaan')->store('faktur/logo', 'public');
            }

            // Generate nomor faktur otomatis jika tidak diisi
            if (empty($datas['nomor_faktur'])) {
                $datas['nomor_faktur'] = $this->generateNomorFaktur();
            }

            // Create or update faktur
            $faktur = Faktur::updateOrCreate(
                ['id' => $request->id],
                $datas
            );

            // Handle items
            if ($request->has('items')) {
                // Delete old items if update
                if ($request->id) {
                    FakturItem::where('faktur_id', $faktur->id)->delete();
                }

                // Create new items
                foreach ($request->items as $item) {
                    if (!empty($item['nama_item']) && !empty($item['jumlah']) && !empty($item['nominal'])) {
                        FakturItem::create([
                            'faktur_id' => $faktur->id,
                            'nama_item' => $item['nama_item'],
                            'jumlah' => $item['jumlah'],
                            'nominal' => $item['nominal']
                        ]);
                    }
                }
            }

            DB::commit();

            return response()->json([
                'status' => true, 
                'message' => 'Data faktur berhasil disimpan'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false, 
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function edit(string $id)
    {
        try {
            $data = Faktur::with('items')->findOrFail($id);
            
            // Format data untuk response
            $data->tanggal = $data->tanggal->format('Y-m-d');
            $data->tanggal_jatuh_tempo = $data->tanggal_jatuh_tempo->format('Y-m-d');
            
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
            DB::beginTransaction();

            $faktur = Faktur::findOrFail($id);
            
            // Delete logo if exists
            if ($faktur->logo_perusahaan) {
                Storage::disk('public')->delete($faktur->logo_perusahaan);
            }
            
            // Delete items (akan terhapus otomatis karena cascade, tapi better manual)
            FakturItem::where('faktur_id', $faktur->id)->delete();
            
            // Delete faktur
            $faktur->delete();
            
            DB::commit();

            return response()->json([
                'status' => true, 
                'message' => 'Data faktur berhasil dihapus'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false, 
                'message' => $e->getMessage()
            ], 500);
        }
    }

    private function generateNomorFaktur()
    {
        $year = date('Y');
        $month = date('m');
        
        $lastFaktur = Faktur::whereYear('created_at', $year)
                            ->whereMonth('created_at', $month)
                            ->orderBy('id', 'desc')
                            ->first();

        if ($lastFaktur) {
            $lastNumber = intval(substr($lastFaktur->nomor_faktur, -4));
            $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '0001';
        }

        return 'INV/' . $year . $month . '/' . $newNumber;
    }
}