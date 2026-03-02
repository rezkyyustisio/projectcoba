<?php

namespace App\Models\Berita;

use App\Models\User;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use Loggable;
    protected $fillable = ['category_id','name','slug','description','tags','top','highlight','image','created_by','created_at'];

    public function category(){
        return $this->belongsTo(BeritaCategory::class,'category_id');
    }

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }
}
