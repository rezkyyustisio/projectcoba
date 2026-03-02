<?php

namespace App\Http\Controllers\Admin\Berita;

use App\Http\Controllers\Controller;
use App\Http\Requests\Berita\BeritaTagRequest;
use App\Models\Berita\BeritaTag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class BeritaTagController extends Controller
{
    public function index()
    {
        return view('admin.berita.tag.index');
    }

    public function datatable(Request $request)
    {
        $query = BeritaTag::query();

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return view('admin.berita.tag.action', compact('row'))->render();
            })
            ->rawColumns(['action']) // penting kalau action berisi HTML
            ->make(true);
    }

    public function store(BeritaTagRequest $request)
    {
        $datas = $request->validated();
        $datas['slug'] = Str::slug($request->name);
        
        BeritaTag::updateOrCreate([
            'id' => $request->id
        ],$datas);

        return response()->json(['status' => true]);
    }

    public function edit(string $id)
    {
        $data = BeritaTag::find($id);
        return response()->json([
            'data' => $data,
        ]);
    }

    public function destroy(string $id)
    {
        BeritaTag::findOrFail($id)->delete();
        return response()->json();
    }
}
