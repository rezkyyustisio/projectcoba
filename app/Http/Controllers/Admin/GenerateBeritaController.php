<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenerateBeritaController extends Controller
{
    public function generate()
    {
        $wp_post = DB::table('wp_posts')->where('post_type', 'post')->get();
        $wp_terms = DB::table('wp_terms')->get();
        $wp_term_taxonomy = DB::table('wp_term_taxonomy')->get();
        $wp_term_relationshipsCategory = DB::table('wp_term_relationships')->get();
        $wp_term_relationshipsTag = DB::table('wp_term_relationships')->get();
        $wp_postmeta = DB::table('wp_postmeta')->get();
        foreach ($wp_post as $post) {
            $berita = new Berita();
            $berita->id = $post->ID;
            $berita->name = $post->post_title;
            $berita->slug = \Str::slug($post->post_title);
            $berita->description = $post->post_content;
            $berita->top = 0;
            $berita->highlight = 0;
            


            $thumbnailMeta = $wp_postmeta
                ->where('post_id', $post->ID)
                ->where('meta_key', '_thumbnail_id')
                ->first();

            if ($thumbnailMeta) {
                // Kalau ada thumbnail ID, cari file attachment-nya
                $attachmentMeta = $wp_postmeta
                    ->where('post_id', $thumbnailMeta->meta_value)
                    ->where('meta_key', '_wp_attached_file')
                    ->first();
                $berita->image = $attachmentMeta->meta_value ?? null;
            } else {
                $berita->image = null;
            }


            $berita->created_by = 1;

            // Get categories
            $categories = $wp_term_relationshipsCategory->where('object_id', $post->ID)->pluck('term_taxonomy_id');
            if($categories->count() > 0) {
                $categories = $wp_term_taxonomy->whereIn('term_taxonomy_id', $categories)
                    ->where('taxonomy', 'category')
                    ->pluck('term_id');
                if($categories->count() > 0) {
                    $categories = $wp_terms->whereIn('term_id', $categories)->pluck('term_id');
                } else {
                    $categories = null;
                }
            } else {
                $categories = null;
            }
            
            if($categories <> null){
                foreach ($categories as $categoryId) {
                    $categories = $wp_terms->where('term_id', $categoryId)->first();
                }
            }


            if($categories <> null) {
                $berita->category_id = $categories->term_id;
            } else {
                $berita->category_id = null;
            }

            // Get tags
            $tags = $wp_term_relationshipsTag->where('object_id', $post->ID)->pluck('term_taxonomy_id');
            
            if(count($tags) > 0) {
                $tags = $wp_term_taxonomy->whereIn('term_taxonomy_id', $tags)
                    ->where('taxonomy', 'post_tag')
                    ->pluck('term_id');
                if($tags->count() > 0) {
                    $tags = $wp_terms->whereIn('term_id', $tags)->pluck('term_id');
                } else {
                    $tags = null;
                }
            } else {
                $tags = null;
            }

            if($tags <> null) {
                 foreach ($tags as $tagId) {
                    $tags = $wp_terms->where('term_id', $tagId)->first();
                }
            }
            
            if($tags <> null) {
                $berita->tags = $tags->name;
            } else {
                $berita->tags = null;
            }
            
            $ceking = Berita::where('id', $berita->id)->first();
            if($ceking == null){
                $berita->created_at = $post->post_date;
                $berita->save();
            }
        }

    }
}
