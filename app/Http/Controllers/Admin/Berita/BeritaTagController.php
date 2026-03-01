<?php

namespace App\Http\Controllers\Admin\Berita;

use App\DataTables\Admin\Berita\BeritaTagDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Berita\BeritaTagRequest;
use App\Models\Berita\BeritaTag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaTagController extends Controller
{
    public function index(BeritaTagDataTable $dataTable)
    {
        return $dataTable->render('admin.berita.tag.index');
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
