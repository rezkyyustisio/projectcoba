<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\UserDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index');
    }

    public function datatable(Request $request)
    {
        $query = User::query();

        return DataTables::of($query)

            ->addIndexColumn()

            ->editColumn('description', function ($row) {
                return Str::limit($row->description, 50);
            })

            ->addColumn('action', function ($row) {
                return view('admin.user.action', compact('row'))->render();
            })

            ->rawColumns(['action'])

            ->make(true);
    }

    public function store(UserRequest $request)
    {
        $datas = Arr::except($request->validated(), ['image','password']);
        if($request->image){
            $datas['image'] = storeImage($request, 'image', 'User');
        }
        if($request->password){
            $datas['password'] = Hash::make($request->password);
        }

        $user = User::updateOrCreate([
            'id' => $request->id
        ], $datas);

        return response()->json(['status' => true]);
    }

    public function edit(string $id)
    {
        $data = User::find($id);
        return response()->json([
            'data' => $data,
        ]);
    }

    public function destroy(string $id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        Storage::disk('public')->delete($data->image);
        return response()->json(['status' => true]);
    }
}