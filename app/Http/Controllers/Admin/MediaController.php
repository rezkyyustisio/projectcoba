<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class MediaController extends Controller
{
    public function index()
    {
        return view('admin.berita.media.index');
    }

    public function datatable()
    {
        $query = \App\Models\Berita\Media::query();

        return \Yajra\DataTables\DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('file', function($row){
                return '<div class="table-image">' .
                    '<img src="' . asset('storage/' . $row->file) . '" style="width: 350px; height: 200px; object-fit: cover; border-radius: 5px;">' .
                    '</div>';
            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at ? $row->created_at->format('Y-m-d H:i:s') : '';
            })
            ->rawColumns(['file', 'action'])
            ->make(true);
    }
}
