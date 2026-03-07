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
use Yajra\DataTables\DataTables;

class BeritaController extends Controller
{
    public function index()
    {
        return view('admin.berita.berita.index',[
            'categories' => BeritaCategory::orderBy('name')->get()
        ]);
    }

    public function datatable(Request $request)
    {
        $query = Berita::query()
        ->join('berita_categories', 'beritas.category_id', '=', 'berita_categories.id')
        ->join('users', 'beritas.created_by', '=', 'users.id')
        ->select([
            'beritas.*',
            'berita_categories.name as category_name',
            'users.name as createdBy_name',
        ]);

        return DataTables::of($query)

            ->filterColumn('category_name', function ($query, $keyword) {
                $query->where('berita_categories.name', 'like', "%{$keyword}%");
            })

            ->filterColumn('createdBy_name', function ($query, $keyword) {
                $query->where('users.name', 'like', "%{$keyword}%");
            })

            ->editColumn('top', function ($row) {
                return $row->top
                    ? '<span class="badge bg-success">Yes</span>'
                    : '<span class="badge bg-danger">No</span>';
            })

            ->editColumn('highlight', function ($row) {
                return $row->highlight
                    ? '<span class="badge bg-success">Yes</span>'
                    : '<span class="badge bg-danger">No</span>';
            })

            ->editColumn('created_at', function ($row) {
                return Carbon::parse($row->created_at)
                    ->locale('id')
                    ->isoFormat('dddd, D MMMM YYYY');
            })

            ->editColumn('tags', function ($row) {
                $datas = explode(',', $row->tags);
                $tags = '';

                foreach ($datas as $data) {
                    $tags .= '<span class="badge bg-primary">'.$data.'</span> ';
                }

                return $tags;
            })

            ->editColumn('description', function ($row) {
                return Str::limit(strip_tags($row->description), 50);
            })

            ->addColumn('action', function ($row) {
                return view('admin.berita.berita.action', compact('row'))->render();
            })

            ->addIndexColumn()

            ->rawColumns(['top', 'highlight', 'tags', 'action'])

            ->make(true);
    }

    public function store(BeritaRequest $request)
    {
        $datas = Arr::except($request->validated(), ['image','created_at']);
        $datas['top'] = 1;
        $datas['slug'] = Str::slug($request->name);
        $datas['created_at'] = Carbon::parse($request->created_at);
        if($request->image){
            $datas['image'] = storeImage($request, 'image', 'Berita\Berita');
        }

        Berita::updateOrCreate([
            'id' => $request->id,
            'created_by' => auth()->id(),
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
