<?php

namespace App\Http\Controllers;

use App\Models\Berita\Berita;
use App\Models\Berita\BeritaCategory;
use App\Models\Berita\BeritaTag;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function beranda()
    {
        return view('landing.index',[
            'beritas' => Berita::with('category','createdBy')->orderByDesc('created_at')->get(),
            'bertasPaginates' => Berita::with('category','createdBy')->orderByDesc('created_at')->paginate(12),
            'tags' => BeritaTag::orderBy('name')->get()
        ]);
    }

    public function category($slug){
        $data = BeritaCategory::with('beritas.createdBy')->where('slug', $slug)->firstOrFail();
        $beritas = Berita::where('category_id',$data->id)->orderByDesc('created_at')->paginate(12);
        $tags = BeritaTag::orderBy('name')->get();
        return view('landing.category', compact('data','beritas','tags'));
    }

    public function tag(Request $request){
        $beritas = Berita::where('tags', 'like', '%' . $request->tag . '%')->orderByDesc('created_at')->paginate(12);
        $tags = BeritaTag::orderBy('name')->get();
        return view('landing.tag', compact('beritas','tags'));
    }

    public function search(Request $request){
        $beritas = Berita::where('name', 'like', '%' . $request->s . '%')->orderByDesc('created_at')->paginate(12);
        $tags = BeritaTag::orderBy('name')->get();
        return view('landing.search', compact('beritas','tags'));
    }

    public function detail($slug){
        $data = Berita::with('category')->where('slug',$slug)->firstOrFail();
        $beritas = Berita::orderByDesc('created_at')->limit(3)->get();
        $tags = BeritaTag::orderBy('name')->get();
        return view('landing.detail', compact('data','beritas','tags'));
    }

    public function redaksi(){
        $tags = BeritaTag::orderBy('name')->get();
        return view('landing.redaksi',compact('tags'));
    }
    public function kode(){
        $tags = BeritaTag::orderBy('name')->get();
        return view('landing.kode',compact('tags'));
    }
    public function pedoman(){
        $tags = BeritaTag::orderBy('name')->get();
        return view('landing.pedoman',compact('tags'));
    }
    public function disclaimer(){
        $tags = BeritaTag::orderBy('name')->get();
        return view('landing.disclaimer',compact('tags'));
    }
}
