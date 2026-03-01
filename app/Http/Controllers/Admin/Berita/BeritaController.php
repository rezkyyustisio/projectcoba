<?php

namespace App\Http\Controllers\Admin\Berita;

use App\DataTables\Admin\Berita\BeritaDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Berita\BeritaRequest;
use App\Models\Berita\Berita;
use App\Models\Berita\BeritaCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index(BeritaDataTable $dataTable)
    {
        return $dataTable->render('admin.berita.berita.index',[
            'categories' => BeritaCategory::orderBy('name')->get()
        ]);
    }

    public function store(BeritaRequest $request)
    {
        $datas = Arr::except($request->validated(), ['image','created_at']);
        $datas['slug'] = Str::slug($request->name);
        $datas['created_at'] = Carbon::parse($request->created_at);
        if($request->image){
            $datas['image'] = storeImage($request, 'image', 'Berita\Berita');
        }

        Berita::updateOrCreate([
            'id' => $request->id
        ], $datas);

        return response()->json(['status' => true]);
    }

    public function edit(string $id)
    {
        $data = Berita::find($id);

        $tags = is_array($data->tags) ? $data->tags : explode(',', $data->tags);

        return response()->json([
            'data' => $data,
            'tags' => $tags,
            'created_at' => $data->created_at->format('Y-m-d\TH:i:s'),
        ]);
    }

    public function destroy(string $id)
    {
        $data = Berita::findOrFail($id);
        $data->delete();
        Storage::disk('public')->delete($data->image);
        return response()->json(['status' => true]);
    }
}
