<?php

namespace App\Http\Controllers\Admin\Berita;

use App\DataTables\Admin\Berita\BeritaCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Berita\BeritaCategoryRequest;
use App\Models\Berita\BeritaCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaCategoryController extends Controller
{
    public function index(BeritaCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.berita.category.index');
    }

    public function store(BeritaCategoryRequest $request)
    {
        $datas = $request->validated();
        $datas['slug'] = Str::slug($request->name);
        
        BeritaCategory::updateOrCreate([
            'id' => $request->id
        ],$datas);

        return response()->json(['status' => true]);
    }

    public function edit(string $id)
    {
        $data = BeritaCategory::find($id);
        return response()->json([
            'data' => $data,
        ]);
    }

    public function destroy(string $id)
    {
        BeritaCategory::findOrFail($id)->delete();
        return response()->json();
    }
}
