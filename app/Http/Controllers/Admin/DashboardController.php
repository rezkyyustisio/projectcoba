<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita\Berita;
use App\Models\Berita\BeritaCategory;
use App\Models\Berita\BeritaTag;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(){
        
        $bulanID = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

        $beritas_per_bulan = collect(range(1,12))
        ->map(fn($m) => Berita::whereYear('created_at', now()->year)->whereMonth('created_at', $m)->count())
        ->all();

        return view('admin.dashboard.index',[
            'users' => User::all(),
            'beritas' => Berita::all(),
            'tags' => BeritaTag::all(),
            'categories' => BeritaCategory::all(),
            'beritas_per_bulan' => $beritas_per_bulan,
            'bulanID' => $bulanID
        ]);
    }
}
