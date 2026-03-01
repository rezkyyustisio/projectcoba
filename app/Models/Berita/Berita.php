<?php

namespace App\Models\Berita;

use App\Models\User;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Berita extends Model
{
    use Loggable;
    protected $fillable = ['category_id','name','slug','description','tags','top','highlight','image','created_by','created_at'];
    public $incrementing = false;
    protected $keyType = 'string';

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
                $model->created_by = Auth::id();
            }
        });
    }

    public function category(){
        return $this->belongsTo(BeritaCategory::class,'category_id');
    }

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }
}
